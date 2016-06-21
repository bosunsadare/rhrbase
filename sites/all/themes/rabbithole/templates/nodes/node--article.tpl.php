<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <div class="content"<?php print $content_attributes; ?>>
    <div class="post-container-progression">
      <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['subscriptions_ui']);
      hide($content['field_keywords']);
      hide($content['field_tags']);
      hide($content['field_media']);
      hide($content['field_summary']);
      print render($content);
      ?>

      <div class="soundbyte-divider-progression"></div>
      <div class="ls-sc-grid_2 alpha">
        <a href="/user/<?php print $node->uid; ?>">
          <img src="<?php print base_path() . 'sites/default/files/pictures/' . $node->picture->filename; ?>" alt="<?php print $node->name; ?>" style="width:100px;height:100px;">
        </a>
      </div>
      <div class="ls-sc-grid_10 omega">
        <div class="category-meta-progression"><a>Story</a></div>
        <h2 class="blog-title-progression"><?php print $node->title; ?></h2>
        <div class="post-meta-progression">
          <?php $postdate = date('F j, Y', $node->created); ?>
          <span class="soundbyte-date-progression"><a><?php print $postdate; ?></a></span>
          <span class="author-meta-progression">By <a href="/user/<?php print $node->uid; ?>"><?php print $node->name; ?></a></span>
          <span class="meta-comments-progression"><a href="#comments"><?php print $node->comment_count; ?> Comment(s)</a></span>
          <div class="clearfix-progression"></div>
        </div>
      </div>

      <div class="summary-post-progression">
        <?php print $node->body['und'][0]['value']; ?>
      </div>
      <div class="clearfix-progression"></div>
    </div>
  </div>

  <cite><?php print render($content['links']); ?></cite>

  <?php if (!empty($content['field_media'])): ?>
    <hr class="ls-sc-divider dotted grey">
    <?php print render($content['field_media']); ?>
  <?php endif; ?>

  <?php if (!empty($content['field_keywords'])): ?>
    <div class="taxonomy-keywords">
      <h6>Related Topics</h6>
      <?php for ($x = 0; isset($content['field_keywords'][$x]); $x++) { ?>
        <a href="/<?php print $content['field_keywords'][$x]['#href']; ?>" class="taxonomy-links">
          <?php print $content['field_keywords'][$x]['#title']; ?>
        </a>
      <?php } ?>
      <?php for ($n = 0; isset($content['field_tags'][$n]); $n++) { ?>
        <a href="/<?php print $content['field_tags'][$n]['#href']; ?>" class="taxonomy-links">
          <?php print $content['field_tags'][$n]['#title']; ?>
        </a>
      <?php } ?>
    </div>
  <?php endif; ?>

  <div class="soundbyte-podcast-share">
    <div class="grid3column-progression">
      <a class="soundbyte-share-btn soundbyte-share-fcb" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php global $base_url; print $base_url.$node_url; ?>"><i class="fa fa-facebook"></i> Share</a>
    </div>
    <div class="grid3column-progression">
      <a class="soundbyte-share-btn soundbyte-share-twtr" target="_blank" href="https://twitter.com/share?text=<?php print $title; ?>&url=<?php print $base_url.$node_url; ?>"><i class="fa fa-twitter"></i> Tweet</a>
    </div>
    <div class="grid3column-progression lastcolumn-progression">
      <a class="soundbyte-share-btn soundbyte-share-mail" target="_blank" href="mailto:"><i class="fa fa-envelope"></i> Email</a>
    </div>
    <div class="clearfix-progression"></div>
  </div>

  <?php print render($content['comments']); ?>

</div>