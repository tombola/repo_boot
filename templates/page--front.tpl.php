<?php

/**
 * @file
 * Custom theme implementation to display a single Drupal page.
 */

?>
<?php /*if ($page['hidden']): ?><div class="hide"><?php print render($page['hidden']) ?></div><?php endif*/ ?>

<!-- Navbar -->
<div id="navbar" class="navbar navbar-medium navbar-inverse navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="<?php print $front_page ?>" title="<?php print $site_slogan ?>">
        <?php if ($logo): ?><img src="<?php print $logo ?>" /><?php endif ?>
        <?php print $site_name ?>
      </a>
      <?php if ($navbar_search): ?><?php print $navbar_search ?><?php endif ?>
      <?php if ($navbar_menu): ?>
			<nav class="nav-collapse collapse" role="navigation">
        <?php print $navbar_menu ?>
      </nav>
			<?php endif ?>
		</div>
	</div>
</div>

<?php if ($is_front): ?>
<!-- Featured -->
<div id="featured" class="container-wrapper hidden-phone">
  <div class="container">
    <?php print render($page['featured']) ?>
  </div>
</div>
<?php endif ?>

<?php if ($has_header): ?>
<!-- Header -->
<header id="header" class="container-wrapper">
  <div class="container">
    <?php if ($title): ?>
    <?php print render($title_prefix) ?>
    <h1><?php print $title ?></h1>
      <?php print render($title_suffix) ?>
    <?php endif ?>
    <?php /* if ($catalog_link) { print $catalog_link; } */ ?>
    <?php print $messages ?>
    <?php print render($page['help']) ?>
    <?php if ($tabs): ?><?php print render($tabs) ?><?php endif ?>
    <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links) ?></ul><?php endif ?>
  </div>
</header>
<?php endif ?>

<!-- Main -->
<div id="main">
  <div class="container">
    <div class="row-fluid">
      <?php if ($has_sidebar_first): ?>
      <!-- Sidebar first -->
      <aside id="sidebar_first" class="span4 hidden-phone">
        <?php print render($page['sidebar_first']) ?>
        <?php print render($page['sidebar_first_affix']) ?>
      </aside>
      <?php endif ?>
      <!-- Content -->
      <section id="content" class="span8">
        <?php print render($page['content']) ?>
      </section>
      <?php if ($has_sidebar_second): ?>
      <!-- Sidebar second -->
      <aside id="sidebar_second" class="span4 hidden-phone">
        <?php print render($page['sidebar_second']) ?>
        <?php print render($page['sidebar_second_affix']) ?>
      </aside>
      <?php endif ?>
    </div>
	</div>
</div>

<!-- Footer -->
<footer id="footer" class="container-wrapper">
	<div class="container">
    <div class="footer-links pull-right">
      <?php if ($feed_icons): ?><?php print $feed_icons ?><?php endif ?>
      <?php if ($secondary_menu): ?>
			<?php foreach ($secondary_menu as $item): ?>
			<?php print l($item['title'], $item['href']) ?>
			<?php endforeach ?>
      <a href="#"><?php print t('Back to top') ?> </a>
      <?php endif ?>
    </div>
    <?php print $breadcrumb ?>
    <?php print date('Y') ?> © <?php print $site_name ?>
	</div>
</footer>
