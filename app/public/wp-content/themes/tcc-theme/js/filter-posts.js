document.addEventListener('DOMContentLoaded', function () {
  const filterDropdown = document.querySelector('.filter-dropdown');
  const filterBtn = document.querySelector('.filter-btn');
  const filterOptions = document.querySelectorAll('.filter-option');
  const postsList = document.querySelector('.posts-list');
  const triBtns = document.querySelectorAll('.tri-btn');

  // Estado atual
  let currentOrderby = 'date';
  let currentOrder = 'desc';
  let selectedCategories = [];
  let currentPage = 1;
  let isLoading = false;
  let reachedEnd = false;

  // Toggle painel "Filtrar por"
  if (filterBtn && filterDropdown) {
    filterBtn.addEventListener('click', e => {
      e.preventDefault();
      filterDropdown.classList.toggle('open');
    });

    document.addEventListener('click', e => {
      if (!filterDropdown.contains(e.target)) filterDropdown.classList.remove('open');
    });
  }

  // Função de renderização CORRIGIDA - agora inclui o excerpt
  function renderPosts(posts, append = false) {
    if (!postsList) return;
    if ((!posts || posts.length === 0) && !append) {
      postsList.innerHTML = '<p>Sem publicações.</p>';
      reachedEnd = true;
      return;
    }

    const html = posts.map(p => {
      const title = p.title?.rendered || 'Sem título';
      const thumb = p._embedded?.['wp:featuredmedia']?.[0]?.source_url || '';
      
      // CORREÇÃO: Gerar excerpt do conteúdo
      const content = p.content?.rendered || '';
      const excerpt = generateExcerpt(content, 20);
      
      return `
        <article class="post-item">
          <div class="post-thumbnail">
            ${thumb ? `<img src="${thumb}" alt="${escapeHtml(title)}">` : ''}
          </div>
          <h3><a href="${p.link}">${escapeHtml(title)}</a></h3>
          <p class="post-excerpt">${excerpt}</p>
        </article>`;
    }).join('');

    if (append) postsList.insertAdjacentHTML('beforeend', html);
    else postsList.innerHTML = html;
  }

  // FUNÇÃO NOVA: Gerar excerpt do conteúdo HTML
  function generateExcerpt(htmlContent, wordCount) {
    // Remove tags HTML
    const text = htmlContent.replace(/<[^>]*>/g, '');
    // Remove shortcodes do WordPress
    const cleanText = text.replace(/\[[^\]]*\]/g, '');
    // Limpa espaços extras
    const trimmedText = cleanText.replace(/\s+/g, ' ').trim();
    // Corta para o número de palavras
    const words = trimmedText.split(' ');
    if (words.length <= wordCount) return escapeHtml(trimmedText);
    return escapeHtml(words.slice(0, wordCount).join(' ') + '...');
  }

  function escapeHtml(text) {
    return text.replace(/[&<>"']/g, (m) =>
      ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' })[m]
    );
  }

  // Fetch posts da API
  async function fetchPosts(opts = {}, append = false) {
    if (isLoading) return;
    isLoading = true;

    const per_page = opts.per_page || 6;
    const orderby = opts.orderby || currentOrderby;
    const order = opts.order || currentOrder;
    const categories = opts.categories ?? selectedCategories;
    const page = opts.page || currentPage;

    let url = `/wp-json/wp/v2/posts?per_page=${per_page}&page=${page}&orderby=${orderby}&order=${order}&_embed`;
    if (categories.length > 0) url += `&categories=${categories.join(',')}`;

    try {
      const res = await fetch(url);
      if (res.status === 400 || res.status === 404) {
        reachedEnd = true;
        return;
      }
      const data = await res.json();
      if (data.length < per_page) reachedEnd = true;
      renderPosts(data, append);
    } catch (err) {
      console.error('Erro ao buscar posts:', err);
    } finally {
      isLoading = false;
    }
  }

  // Filtro de ordenação - DESCOMENTADO E CORRIGIDO
  filterOptions.forEach(opt => {
    opt.addEventListener('click', e => {
      e.preventDefault();
      filterOptions.forEach(o => o.classList.remove('active'));
      opt.classList.add('active');
      filterDropdown.classList.remove('open');

      currentOrderby = opt.dataset.orderby || 'date';
      currentOrder = opt.dataset.order || 'asc';
      currentPage = 1;
      reachedEnd = false;

      fetchPosts({ page: 1, per_page: 6 });
    });
  });

  // Filtro acumulativo de trimestre
  triBtns.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      const catId = btn.dataset.cat;

      if (selectedCategories.includes(catId)) {
        selectedCategories = selectedCategories.filter(id => id !== catId);
        btn.classList.remove('active');
      } else {
        selectedCategories.push(catId);
        btn.classList.add('active');
      }

      currentPage = 1;
      reachedEnd = false;
      fetchPosts({ page: 1, per_page: 6 });
    });
  });

  // Scroll infinito
  window.addEventListener('scroll', () => {
    if (reachedEnd || isLoading) return;
    const scrollPosition = window.innerHeight + window.scrollY;
    const threshold = document.body.offsetHeight - 300;
    if (scrollPosition >= threshold) {
      currentPage++;
      fetchPosts({ page: currentPage, per_page: 6 }, true);
    }
  });

  // Inicialização
  fetchPosts({ page: 1, per_page: 6 });
});