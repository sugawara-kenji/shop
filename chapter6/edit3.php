<?php require '../header.php'; ?>


<div class="container">
  <aside>
    <?php //require 'sidebar.php'; ?>
  </aside>
  <main>

    <div class="th0">商品番号</div>
    <div class="th1">商品名</div>
    <div class="th1">商品価格</div>

<?php

if (isset($_REQUEST['command'])) {
	//         	↑ これが入ってたら
	//追加,更新,削除,の分岐
	switch ($_REQUEST['command']) {
		case 'insert':  //↑ これがinsertと等しい場合
			if (empty($_REQUEST['name']) || !preg_match('/[0-9]+/', $_REQUEST['price'])){ 
				       //↑ これがtrueになった場合
					echo "商品名がないか,値段が不正です";
					break; //switch文を抜ける
			}

			$sql=$pdo->prepare('INSERT into product values(null,?,?)');
			$sql->execute([
				 $_REQUEST['name'] ,
				 $_REQUEST['price']
			]);
			break;

		case 'update':
			if (empty($_REQUEST['name']) || !preg_match('/[0-9]+/', $_REQUEST['price'])){ 
				echo "商品名がないか,値段が不正です";
				break;
			}
			
			$sql=$pdo->prepare(
				"UPDATE product set name=?, price=? where id=? "
			);
			
			$sql->execute([
					$_REQUEST[''] ,
					$_REQUEST['name'] ,
					$_REQUEST['price']
			 ]);
			break;

		case 'delete':
			$sql=$pdo->prepare("
				DELETE from product where id=?
			");
			
			$sql->execute([ $_REQUEST['id'] ]);
			break;
	}
}
foreach ($pdo->query('select * from product') as $row) {
	echo '<form class="ib" action="edit3.php" method="post">';
	echo '<input type="hidden" name="command" value="update">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<div class="td0">';
	echo $row['id'];
	echo '</div> ';
	echo '<div class="td1">';
	echo '<input type="text" name="name" value="', $row['name'], '">';
	echo '</div> ';
	echo '<div class="td1">';
	echo '<input type="text" name="price" value="', $row['price'], '">';
	echo '</div> ';
	echo '<div class="td2">';
	echo '<input type="submit" value="更新">';
	echo '</div> ';
	echo '</form> ';
	echo '<form class="ib" action="edit3.php" method="post">';
	echo '<input type="hidden" name="command" value="delete">';
	echo '<input type="hidden" name="id" value="', $row['id'], '">';
	echo '<input type="submit" value="削除">';
	echo '</form>';
	echo "\n";
}


?>
    <form action="edit3.php" method="post">
      <input type="hidden" name="command" value="insert">
      <div class="td0"></div>
      <div class="td1"><input type="text" name="name"></div>
      <div class="td1"><input type="text" name="price"></div>
      <div class="td2"><input type="submit" value="追加"></div>
    </form>


  </main>
</div>
<?php require '../footer.php'; ?>