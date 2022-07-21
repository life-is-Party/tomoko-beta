<?php
   error_reporting(0);
   $stage_id =htmlspecialchars($_REQUEST['id']);

   include_once 'pdo.php';

   $pdo = new PDO($dsn,$user,$pass);

   //セットリスト概要
   $sql = "SELECT * FROM setlists
   WHERE stage_id ='$stage_id'";
   $statement = $pdo->prepare($sql);
   $statement->execute();

   $results = [];
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
       $results[] = $row;
   }

   $statement = null;

     //公演データ
     $sql = "SELECT * FROM stages
     WHERE stage_id ='$stage_id'";
     $statement = $pdo->prepare($sql);
     $statement->execute();
  
     $stages = [];
     while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $stages[] = $row;
     }
  
     $statement = null;

   $pdo = null;

  require_once 'views/setlist.tpl.php';