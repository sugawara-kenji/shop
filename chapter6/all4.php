<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php

foreach ($pdo->query('select * from product') as $row) {
	echo '<tr>';
	echo '<td>', h($row['id']), '</td>';
	echo '<td>', h($row['name']), '</td>';
	echo '<td>', h($row['price']), '</td>';
	echo '</tr>';
	echo "\n";
}
?>
</table>
<?php require '../footer.php'; ?>
