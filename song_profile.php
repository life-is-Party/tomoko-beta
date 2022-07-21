<?php
error_reporting(0);
   $song_id =htmlspecialchars($_REQUEST['id']);

   include_once 'pdo.php';

   $pdo = new PDO($dsn,$user,$pass);

   $JoinTable ="(setlists
   LEFT JOIN events ON setlists.event_id = events.event_id
   LEFT JOIN stages ON setlists.stage_id = stages.stage_id)";

   //基本データ
   $sql = "SELECT * FROM songs
   WHERE id ='$song_id'";
   $statement = $pdo->prepare($sql);
   $statement->execute();

   $songs = [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $songs[] = $row;
   }

   $statement = null;

  

   //収録情報
   $sql = "SELECT * FROM song_credits LEFT OUTER JOIN albums ON song_credits.Pnumber = albums.Pnumber
   WHERE song_credits.songID ='$song_id'";
   $statement = $pdo->prepare($sql);
   $statement->execute();

   $albums = [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $albums[] = $row;
   }

   $statement = null;

   //パフォ情報

$sql = "SELECT * FROM $JoinTable
                 WHERE songID ='$song_id'
                 AND sid IN
                  (SELECT MIN(sid) FROM $JoinTable
                                    WHERE songID ='$song_id'
                                    GROUP BY stages.event_id)
                ORDER BY event_date ASC";

$statement = $pdo->prepare($sql);
$statement->execute();

$events[]= null;

   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $events[] = $row;
   }

   $statement = null;



  require_once 'views/song.profile.tpl.php';

