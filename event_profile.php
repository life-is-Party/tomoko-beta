<?php
   error_reporting(0);
   $event_id =htmlspecialchars($_REQUEST['id']);

   include_once 'pdo.php';

   $pdo = new PDO($dsn,$user,$pass);

   //セットリスト
   $sql = "SELECT * FROM setlists
   WHERE event_id ='$event_id'";
   $statement = $pdo->prepare($sql);
   $statement->execute();

   $results = [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $results[] = $row;
   }

   $statement = null;

   //歌唱回数抽出
   $sql = "SELECT * FROM setlists
   LEFT OUTER JOIN( SELECT song,count(song) AS songs
                    FROM setlists
                    WHERE event_id ='$event_id'   
                    GROUP BY song) AS RANK
                ON setlists.song = RANK.song
   WHERE lid IN(SELECT min(lid)
                FROM setlists
                WHERE event_id='$event_id'
                GROUP BY song)
    ORDER BY songs DESC; ";

    $statement = $pdo->prepare($sql);
    $statement->execute();

    $songs = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $songs[] = $row;
    }

    $statement = null;

   //イベント基礎データ
   $sql = "SELECT * FROM events
   WHERE event_id ='$event_id'";
   $statement = $pdo->prepare($sql);
   $statement->execute();

   $events = [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $events[] = $row;
   }

   $statement = null;

   //公演データ
   $sql = "SELECT * FROM stages
   LEFT OUTER JOIN places ON stages.place = places.place_name
   WHERE event_id ='$event_id'
   ORDER BY stage_id ASC";
   $statement = $pdo->prepare($sql);
   $statement->execute();

   $stages = [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $stages[] = $row;
   }

   $statement = null;

// テンプレ選択
   foreach($events as $tpl){}
                
    if($tpl['tpltype']==1){require_once 'views/event.profileM.tpl.php';
    }elseif($tpl['tpltype']==2){require_once 'views/event.profileR.tpl.php';
    }else{require_once 'views/event.profile.tpl.php';
    }

    $pdo = null;    