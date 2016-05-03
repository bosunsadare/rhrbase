
<?php if ($rows): ?>
  <div id="gallery-index-progression">
    <div id="portfolio-filter" class="portfolio-filter">
      <?php if ($exposed): ?>
        <div class="view-filters">
          <?php print $exposed; ?>
        </div>
      <?php endif; ?>
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

  <?php if ($pager): ?>
  <div class="episodes-pager">
    <?php print $pager; ?>
  </div>
  <?php endif; ?>
<?php endif; ?>