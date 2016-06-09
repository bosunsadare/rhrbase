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
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['subscriptions_ui']);
    hide($content['field_show_banner']);
    hide($content['field_summary']);
    hide($content['field_show_date']);
    hide($content['field_season']);
    hide($content['field_keywords']);
    hide($content['field_length_of_audio']);
    hide($content['field_show_audio']);
    hide($content['field_media']);
    hide($content['field_rate']);
    hide($content['field_schedule']);
    hide($content['field_guests_details']);
    print render($content);
    ?>
  </div>

  <cite><?php print render($content['links']); ?></cite>

  <div class="rater"><?php print render($content['field_rate']); ?></div>

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

  <?php if (!empty($content['field_schedule'][0])): ?>
  <div class="show-notes-soundbyte">
    <h5>Show Notes</h5>
    <ul class="soundbyte-notes">
    <?php
      for ($i = 0; isset($content['field_schedule'][$i]); $i++) {
        $fcid = $content['field_schedule']['#items'][$i]['value'];
        $time = $content['field_schedule'][$i]['entity']['field_collection_item'][$fcid]['field_time']['#items'][0]['value'];
        $description = $content['field_schedule'][$i]['entity']['field_collection_item'][$fcid]['field_description']['#items'][0]['value'];
        $link = $content['field_schedule'][$i]['entity']['field_collection_item'][$fcid]['field_link']['#items'][0]['value'];
    ?>
    <li class="soundbyte-timeline">
      <div class="soundbyte-time-pro"><?php print $time; ?></div>
      <a href="<?php print $link; ?>" target="_blank"><?php print $description; ?></a>
    </li>
    <?php } ?>
    </ul>
  </div>
  <?php endif; ?>

  <?php echo views_embed_view('home_slider', 'page_3'); ?>

  <?php print render($content['comments']); ?>

</div>