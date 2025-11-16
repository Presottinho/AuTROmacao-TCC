</div>
<footer class="site-footer">
    <nav class="footer-nav">
        <?php wp_nav_menu(array('theme_location' => 'footer-menu',
                                'container' => false,
                                'menu_class' => 'footer-menu'));?>
    </nav>

    <div class="footer-copy">
        <p>&copy; <?php echo date('Y'); ?> Desenvolvido por Gabriel Presotto e Vinícius Donini</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
