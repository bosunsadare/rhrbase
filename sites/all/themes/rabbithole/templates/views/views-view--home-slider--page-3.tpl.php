
<?php if ($rows): ?>
  <div id="previous-episodes-soundbyte">
    <h5>Previous Episodes</h5>
    <?php print $rows; ?>
    <div class="clearfix-progression"></div>
  </div>
  <div class="clearfix-progression"></div>

<?php elseif ($empty): ?>
  <div class="view-empty">
    <?php print $empty; ?>
  </div>
<?php endif; ?>
