<?php
//エラーメッセージの初期化
$errorMessage = "";
//フラグの初期化
$o = false;

include_once 'pdo.php';

      $pdo = new PDO($dsn,$user,$pass);


        $sql = "SELECT song, count(song) AS songs
        FROM setlists
        GROUP BY song
        ORDER BY songs DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();


require_once 'views/songlist.tpl.php';
