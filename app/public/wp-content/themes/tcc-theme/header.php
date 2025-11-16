<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body>
  <header class="site-header">
    <a href="<?php echo home_url(); ?>" class="site-title">AuTRÔmação</a>
    <nav class="main-nav">
      <button id="theme-toggle" class="theme-toggle">🌙 Modo Escuro</button>
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">☰ Menu</button>
      <?php wp_nav_menu(array(
          'menu' => 'Header',
          'container' => false,
          'menu_class' => 'menu',
          'menu_id' => 'primary-menu'
      )); ?>
    </nav>
  </header>
  <div class="siteContent">
