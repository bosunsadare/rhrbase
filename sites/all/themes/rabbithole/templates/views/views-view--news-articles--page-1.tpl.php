<?php
$total = $header;
$pages = ceil($total / 4);
?>

<?php if ($rows): ?>
  <?php print $rows; ?>
<?php endif; ?>

<?php $page_num = !empty($_GET['page']) ? $_GET['page'] : 0; ?>

<ul class="page-numbers">

  <?php if ($page_num > 0): ?>
    <li>
      <a class="previous page-numbers" href="/news?page=<?php print $page_num - 1; ?>">&laquo; Previous</a>
    </li>
  <?php endif; ?>

  <?php if ($pages > 1): ?>
    <?php for ($x = 1; $x < $pages; $x++): ?>
      <li><a class="page-numbers<?php if ($page_num == $pages-1): ?> disabled current<?php endif; ?>" href="/news?page=<?php print $x; ?>"><?php print $x + 1; ?></a></li>
    <?php endfor; ?>
  <?php endif; ?>
  <?php if ($page_num < $pages-1): ?>
    <li><a class="next page-numbers" href="/news?page=<?php print $page_num + 1; ?>">Next &raquo;</a></li>
  <?php endif; ?>
</ul>