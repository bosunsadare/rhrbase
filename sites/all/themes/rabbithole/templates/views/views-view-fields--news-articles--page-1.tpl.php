<article class="post">
  <div class="post-container-progression">
    <div class="featured-blog-progression">
      <?php print $fields['field_image']->content; ?>
    </div>
    <div class="clearfix-progression"></div>
    <div class="grid2column-progression">
      <div class="soundbyte-divider-progression"></div>
      <div class="category-meta-progression"><a href="<?php print $fields['path']->content; ?>">Story</a></div>
      <h2 class="blog-title-progression">
        <?php print $fields['title']->content; ?>
      </h2>
      <div class="post-meta-progression">
        <span class="soundbyte-date-progression"><a href="<?php print $fields['path']->content; ?>"><?php print $fields['created']->content; ?></a></span>
        <span class="author-meta-progression">By <?php print $fields['name']->content; ?></span>
        <span class="meta-comments-progression"><a href="#!">No Comments</a></span>
        <div class="clearfix-progression"></div>
      </div>
    </div>
    <div class="grid2column-progression lastcolumn-progression">
      <div class="summary-post-progression">
        <p>
          <?php print $fields['body']->content; ?><br />
          <small><?php print $fields['term_node_tid']->content; ?></small>
          <a href="<?php print $fields['path']->content; ?>" class="more-link">Continue reading</a>
        </p>
      </div>
      <div class="clearfix-progression"></div>
    </div>
    <div class="clearfix-progression"></div>
  </div>
</article>