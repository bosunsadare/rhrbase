
<div class="isotope-item <?php print strtolower(str_replace(' ', '-', $fields['field_season']->content)); ?> init">
  <a href="<?php print base_path() . 'node/' . $fields['nid']->content; ?>" class="isotope-img-container">
    <div class="zoom-image-container-progression">
      <?php print $fields['field_show_banner']->content; ?>
    </div>
  </a>
  <div class="isotope-index-text">
    <a href="<?php print base_path() . 'node/' . $fields['nid']->content; ?>">
      <div class="soundbyte-divider-progression"></div>
      <div class="clearfix-progression"></div>
      <div class="soundbyte-podcast-progression-meta">
        <div class="alignleft"><?php print $fields['field_season']->content; ?></div><div class="alignright"><i class="fa fa-clock-o"></i><?php print $fields['expression']->content; ?></div>
        <div class="clearfix-progression"></div>
      </div>
      <div class="soundbyte-podcast-progression-title"><?php print $fields['title']->content; ?></div>
      <div class="soundbyte-podcast-date-progression"><?php print strtoupper($fields['field_show_date']->content); ?></div>
    </a>
    <a href="<?php print base_path() . 'node/' . $fields['nid']->content; ?>" class="soundbyte-podcast-play-progression"><i class="fa fa-play"></i>PLAY EPISODE</a>
  </div>
</div>