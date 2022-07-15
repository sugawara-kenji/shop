<?php require '../header.php'; ?>
<table>
<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php

$sql = $pdo->prepare( 
	"SELECT * from product
	WHERE id = ?"
);

$sql->execute( [$_GET['id']] ) ;
// var_dump( $sql);
foreach ( $sql as $row) {
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