<?php print $fields['field_show_banner']->content; ?>
<div class="caption-progression">
  <div class="width-container-progression">
    <div class="grid2column-progression">
      <div class="soundbyte-headline">
        <?php print $fields['field_summary']->content; ?><br />
        <br />
        <div class="subtitle-progression"><i class="fa fa-microphone"></i>Live Broadcast Wednesday @ 9pm GMT</div>
      </div>

      <div class="progression-button-icons">
        <a class="ls-sc-button" href="<?php print base_path() . 'node/' . $fields['nid']->content . '#soundbyte-sidebar'; ?>">SUBSCRIBE</a>
        <a href="http://www.google.com/bookmarks/mark?op=edit&bkmk=<?php print base_path() . 'node/' . $fields['nid']->content; ?>" target="_blank"><i class="fa fa-google"></i></a>
        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php print base_path() . 'node/' . $fields['nid']->content; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="http://twitter.com/share?text=<?php print urlencode($fields['title']->content); ?>&url=<?php print base_path() . 'node/' . $fields['nid']->content; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
      </div>
    </div>

    <div class="grid2column-progression lastcolumn-progression">
      <div>
        <div class="soundbyte-divider-progression"></div>
        <div class="clearfix-progression"></div>
        <div class="slider-progression-soundbyte-podcast-title">
          <div class="alignleft"><?php print $fields['field_season']->content; ?></php></div><div class="alignright"><i class="fa fa-clock-o"></i><?php print $fields['expression']->content; ?></div>
          <div class="clearfix-progression"></div>
        </div>
        <div class="clearfix-progression"></div>
        <div class="slider-progression-title"><?php print $fields['title']->content; ?></div>
        <?php print $fields['field_show_date']->content; ?><br />
        <a href="<?php print base_path() . 'node/' . $fields['nid']->content; ?>" class="slider-play-progression"><i class="fa fa-play"></i>PLAY EPISODE</a>
        <div class="clearfix-progression"></div>
        <p class="progression-slider-desc"><?php print $fields['body']->content; ?>
        </p>
      </div>
    </div>
    <div class="clearfix-progression"></div>
  </div>
</div>