<?php
/**
 * @file
 * Rabbithole theme implementation to display each site page.
 */
?>

<header id="masthead-progression" class="site-header-progression">
	<div id="sticky-header-progression" class="menu-default-progression">
		<div class="width-container-progression">
      <?php if ($logo): ?>
      <h1 id="logo">
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" width="270" />
        </a>
      </h1>
			<?php endif; ?>

				<nav id="site-navigation">
					<?php if ($variables['primary_nav']): ?>
						<div class="menu-main-navigation-container">
							<?php print render($variables['primary_nav']); ?>
						</div><!-- /#main-menu -->
					<?php endif; ?>
				</nav>

				<div class="mobile-menu-icon-progression noselect"><i class="fa fa-bars"></i></div>
				<div class="clearfix-progression"></div>
		</div>
	</div>
	<div id="main-nav-mobile">
		<?php if ($variables['mobile_nav']): ?>
				<?php print render($variables['mobile_nav']); ?>
	    <?php endif; ?>
	</div>
</header>

<div id="soundbyte-page-title">
	<div class="width-container-progression">
		<?php if ($breadcrumb): ?>
			<div class="breadcrumbs-soundbyte" id="breadcrumb"><?php print $breadcrumb; ?></div>
		<?php endif; ?>
		<?php if ($title): ?>
		<div class="grid2column-progression">
			<h1 id="page-title"><?php print $title; ?></h1>
		</div>
		<?php endif; ?>
    <?php if (!empty($node->field_summary) && ($node->field_summary)) { ?>
		<div class="grid2column-progression lastcolumn-progression">
			<p><?php print $node->field_summary['und'][0]['value']; ?></p>
		</div>
		<?php } else { ?>
		<div class="grid2column-progression lastcolumn-progression">
			<p>Ignorance is bliss... but only for a little while. Blindness is only acceptable when you don't know what you can't see.</p>
    </div>
		<?php } ?>
		<div class="clearfix-progression"></div>
	</div>
</div>

<div class="clearfix-progression"></div>

<div id="main" class="content-area">
	<div class="width-container-progression">
    <div <?php if ($page['sidebar']) : ?>id="soundbyte-sidebar-container"<?php endif; ?>>
      <div id="messages">
        <div class="section clearfix">
          <?php print $messages; ?>
        </div>
      </div> <!-- /.section, /#messages -->
      <?php if ($tabs): ?>
      <div class="tabs">
        <?php print render($tabs); ?>
      </div>
      <?php endif; ?>
      <?php if ($action_links): ?>
      <ul class="action-links">
        <?php print render($action_links); ?>
      </ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </div>

    <?php if ($page['sidebar']) : ?>
    <div id="soundbyte-sidebar">
      <?php print render($page['sidebar']); ?>
    </div>
    <?php endif; ?>
    <div class="clearfix-progression"></div>
	</div>
</div>

<div class="clearfix-progression"></div>

<?php if ($page['about']) : ?>
<div id="about-section">
	<div class="width-container-progression">
		<?php print render($page['about']); ?>
		<div class="clearfix-progression"></div>
	</div>
</div>
<?php endif; ?>

<div class="clearfix-progression"></div>

<?php if ($page['donate']) : ?>
<div class="highlight-section-progression">
	<div class="width-container-progression">
		<?php print render($page['donate']); ?>
	</div>
</div>
<?php endif; ?>

<footer id="site-footer">
	<div id="widget-area-progression">
		<div class="footer-4-column width-container-progression">
			<?php if ($page['footer_first']) : ?>
			<div class="widget">
				<div class="soundbyte-divider-progression"></div>
				<?php print render($page['footer_first']); ?>
			</div>
			<?php endif; ?>

			<?php if ($page['footer_second']) : ?>
			<div class="widget">
				<div class="soundbyte-divider-progression"></div>
				<?php print render($page['footer_second']); ?>
			</div>
			<?php endif; ?>

			<?php if ($page['footer_third']) : ?>
			<div class="widget latest-news-progression">
				<div class="soundbyte-divider-progression"></div>
				<?php print render($page['footer_third']); ?>
			</div>
			<?php endif; ?>

			<?php if ($page['footer_fourth']) : ?>
			<div class="widget follow-us-progression">
				<div class="soundbyte-divider-progression"></div>
				<?php print render($page['footer_fourth']); ?>
				<div class="clearfix-progression"></div>
			</div>
			<?php endif; ?>

			<div class="clearfix-progression"></div>
		</div>
	</div>
	<div id="copyright-progression" class="width-container-progression">
		<?php if ($page['footer_bottom']) : ?>
			<?php print render($page['footer_bottom']); ?>
		<?php endif; ?>
		<div class="clearfix-progression"></div>
		<div class="copyright-text">RHR &copy;2016 All Rights Reserved. Powered by <a href="http://prolificat.com/" target="_blank">Prolificat.</a></div>
		<div class="clearfix-progression"></div>
	</div><!-- close #copyright -->
</footer>