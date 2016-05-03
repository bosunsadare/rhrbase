<?php $i = 1; ?>
<?php foreach ($rows as $id => $row): ?>
  <li id="slide-<?php echo $i; ?>">
    <?php print $row; ?>
  </li>
  <?php $i++; ?>
<?php endforeach; ?>