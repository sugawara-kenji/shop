<?php
  $dbname = "shop"; 
  $host = 'localhost';
  $user = 'kenji sugawara';
  $psw =  'suga3515';
  $mydb = 'mysql:dbname='.$dbname.';host='.$host.';charset=utf8';
  
  //想定しないエラーをキャッチできる文
	// try{
    $pdo=new PDO($mydb,$user,$psw ); //DBへ接続
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // PDOのエラーモードを追加してください
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    // 構文チェックと実行を分離したままにする 必須
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // メモリ効率がいい

  // } catch (PDOException $e) {
  //   // try{}内で 例外エラーがあればこっちに来る
  //  die('ConneCt Error: ' .$e->getCode()); //DB接続エラー時の処理
  // }