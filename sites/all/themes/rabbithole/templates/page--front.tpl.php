<?php

/**
 * @file
 * Rabbithole theme implementation to display each site page.
 *
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 * - $hide_site_name: TRUE if the site name has been toggled off on the theme
 *   settings page. If hidden, the "element-invisible" class is added to make
 *   the site name visually hidden, but still accessible.
 * - $hide_site_slogan: TRUE if the site slogan has been toggled off on the
 *   theme settings page. If hidden, the "element-invisible" class is added to
 *   make the site slogan visually hidden, but still accessible.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
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

<div id="progression-home-slider">
	<div id="progression-home-border">
		<?php echo views_embed_view('home_slider', 'page'); ?>
	</div>
</div>

<div class="clearfix-progression"></div>
<div id="progression-home-player">
	<?php echo views_embed_view('homepage_audio', 'block'); ?>
</div>

<div id="main">
	<div class="width-container-progression">
		<div id="messages">
			<div class="section clearfix">
				<?php print $messages; ?>
			</div>
		</div>

		<?php if ($page['portfolio']) : ?>
		<div id="portfolio-items">
			<?php print render($page['portfolio']); ?>
		</div>
		<?php endif; ?>

		<?php echo views_embed_view('home_slider', 'page_1'); ?>
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