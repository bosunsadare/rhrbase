
<?php $collections = array_count_values($rows);

foreach ($collections as $key => $val): ?>
  <li>
    <?php print '<a href="/tags/' . str_ireplace(' ', '-', $key) . '">' . $key . ' (' . $val . ')</a>'; ?>
  </li>
<?php endforeach; ?>