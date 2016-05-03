
<?php if ($rows): ?>
<div id="gallery-index-progression">
  <div id="portfolio-filter" class="portfolio-filter">
    <h2 class="filter-heading-progression">Browse Episodes</h2>
    <div id="filters" class="button-group">
      <span class="filter-wrapper">
        <button class="btn is-checked" data-filter="*">All</button>
        <button class="btn" data-filter=".season-3">Season 3</button>
        <button class="btn" data-filter=".season-2">Season 2</button>
        <button class="btn" data-filter=".season-1">Season 1</button>
      </span>
    </div>
    <div class="clearfix-progression"></div>
  </div>

  <div class="isotope">
    <?php print $rows; ?>
    <div class="clearfix-progression"></div>
  </div>

  <div class="clearfix-progression"></div>
</div><!-- close #gallery-index-progression -->
<div class="clearfix-progression"></div>
<div id="load-more-manual">
  <div id="infinite-nav-pro">
    <div class="nav-previous">
      <a href="<?php echo base_path(); ?>episodes?page=2">More Episodes</a>
    </div>
  </div>
</div>
<?php endif; ?>