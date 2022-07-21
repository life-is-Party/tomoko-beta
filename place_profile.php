<?php
error_reporting(0);
   $place_id =htmlspecialchars($_REQUEST['id']);

   include_once 'pdo.php';

   $pdo = new PDO($dsn,$user,$pass);

   $JoinTable ="stages LEFT OUTER JOIN events ON stages.event_id = events.event_id";


   //基本データ
   $sql = "SELECT * FROM places
   WHERE placeID ='$place_id'";
   $statement = $pdo->prepare($sql);
   $statement->execute();

   $places = [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $places[] = $row;
   }

   $statement = null;

  
   //パフォ情報

   $sql = "SELECT * FROM 
   $JoinTable
   WHERE placeID ='$place_id'
   ORDER BY event_date ASC";
   $statement = $pdo->prepare($sql);
   $statement->execute();


   $events= [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $events[] = $row;
   }

   $statement = null;



  require_once 'views/place_profile.tpl.php';

