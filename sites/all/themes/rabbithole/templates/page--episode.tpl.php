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
		<div class="soundbyte-podcast-title-progression">
			<div class="soundbyte-divider-progression"></div>
			<div class="clearfix-progression"></div>
			<div class="soundbyte-podcast-progression-meta">
				<div class="alignleft">Season 3</div><div class="alignright"><i class="fa fa-clock-o"></i>27 MINS</div>
				<div class="clearfix-progression"></div>
			</div>
			<?php if ($title): ?>
				<div class="soundbyte-podcast-progression-title"><?php print $title; ?></div>
			<?php endif; ?>
			<?php if (!empty($node->field_show_date) && ($node->field_show_date)) : ?>
				<div class="soundbyte-podcast-date-progression"><?php print $node->field_show_date['und'][0]['value']; ?></div>
			<?php endif; ?>

			<?php if (!empty($node->field_summary) && ($node->field_summary)) : ?>
				<div class="gridcolumn-progression">
					<?php print $node->field_summary['und'][0]['value']; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<a href="<?php print base_path() . 'sites/default/files/' . str_replace('public://', '', $node->field_show_audio['und'][0]['uri']); ?>" download="<?php print 'RHRadio_audio_' . date('d-m-Y') . '_' . time(); ?>">
	<div id="soundbyte-download-podcast">
		<div class="soundbyte-download-text">MP3 <i class="fa fa-cloud-download"></i></div>
	</div>
</a>

<div id="progression-home-player">
	<div class="responsive-wrapper responsive-audio">
		<audio class="progression-single progression-skin progression-minimal-dark progression-audio-player" controls="controls" preload="none">
			<?php
			$get_file = str_replace('public://', '', $node->field_show_audio['und'][0]['uri']);
			$mp3_file = base_path() . 'sites/default/files/' . $get_file;
			?>
			<source src="<?php print $mp3_file; ?>" type="audio/mp3"/>
		</audio>
	</div><!-- close .responsive-wrapper .responsive-audio -->
</div>

<div class="clearfix-progression"></div>

<div id="main" class="content-area">
	<div class="width-container-progression">
    <div id="soundbyte-sidebar-container">
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