<?php
//エラーメッセージの初期化
$errorMessage = "";
//フラグの初期化
$o = false;

include_once 'pdo.php';

if(isset($_POST['search'])){
    $o = true;

    //イベントタイプ選択
    $eventIDs = $_POST["evetype"];
    foreach($eventIDs as $eventID){
      $evetype[] = "stages.event_id LIKE '$eventID%'";
    }
    $evetypes = implode(' OR ', $evetype);


    $since_date =$_POST["since_date"];
    $until_date =$_POST["until_date"];
    $daterange ="event_date BETWEEN '$since_date' AND '$until_date'";

    //テーブル結合

    $JoinTable ="(stages LEFT OUTER JOIN events ON stages.event_id = events.event_id)";

  try {
      $pdo = new PDO($dsn,$user,$pass);


      //sql文作成

        $sql = "SELECT place,count(place) AS placeNum FROM $JoinTable
                                WHERE ($daterange)
                                  AND ($evetypes)
                                  GROUP BY place
                                  ORDER BY placeNum DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();




    }catch (PDOException $e) {
        $errorMessage = 'データベースエラー';
  }
}


require_once 'views/place_ranking.tpl.php';
