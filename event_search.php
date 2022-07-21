<?php
error_reporting(0);
//エラーメッセージの初期化
$errorMessage = "";
//フラグの初期化
$o = false;

include_once 'pdo.php';


if (isset($_POST["search"])) {
  if (empty($_POST["textbox1"])
  and empty($_POST["textbox2"])
  and empty($_POST["textbox3"])
  ) {
        $errorMessage = '未入力です。';
    }
   else{
    $o = true;

    //入力した文字を変数に格納
    $textbox1 = $_POST["textbox1"];
    $textbox2 = $_POST["textbox2"];
    $textbox3 = $_POST["textbox3"];

    $selectbox1 = $_POST["selectbox1"];
    $selectbox2 = $_POST["selectbox2"];
    $selectbox3 = $_POST["selectbox3"];


    $sb1 =$_POST["sb1"];
    $sb2 =$_POST["sb2"];
    $sb3 =$_POST["sb3"];



    $textbox2s = explode(" ",mb_convert_kana($textbox1,'s'));
    $in1 = $_POST["in1"];
    $like1 = $_POST["radio1"];
   





    $distinct = $_POST["radio2"];
   

    //イベントタイプ選択
    $other= $_POST['other'];
    $eventIDs = $_POST["evetype"];
    foreach($eventIDs as $eventID){
      $evetype[] = "stages.event_id LIKE '$eventID%'";
    }
    $evetype1 = implode(' OR ', $evetype);

    if(isset($other)&&isset($evetype)){
      $OR ="OR";
    }else{
      $OR ="";
    }

    $evetypes = " $other $OR $evetype1";
   



    $since_date =$_POST["since_date"];
    $until_date =$_POST["until_date"];
    $daterange ="event_date BETWEEN '$since_date' AND '$until_date'";

    //テーブル結合

    $JoinTable ="(stages 
      LEFT OUTER JOIN events ON stages.event_id = events.event_id
      LEFT OUTER JOIN places ON stages.place = places.place_name)";

  try {
      $pdo = new PDO($dsn,$user,$pass);


      //sql文作成

              if(isset($textbox1)){
                if($sb1 =='like'){
                  $value =preg_replace('/(?=[!_%])/', '', $textbox1);
                    $Condition1 = "($selectbox1 LIKE '%$value%')";
                }elseif($sb1 =='match'){
                  $Condition1 ="$selectbox1 ='$textbox1'";
                }elseif($sb1 =='notlike'){
                  $value =preg_replace('/(?=[!_%])/', '', $textbox1);
                  $Condition1 = "($selectbox1 NOT LIKE '%$value%')";
                }else{
                  $Condition1 ="$selectbox1 !='$textbox1'";
                }
              }else{ $Condition1="'place'='place'";}

                if(isset($textbox2)){
                if($sb2 =='like'){
                  $value =preg_replace('/(?=[!_%])/', '', $textbox2);
                    $Condition2 = "($selectbox2 LIKE '%$value%')";
                }elseif($sb2 =='match'){
                  $Condition2 ="$selectbox2 ='$textbox2'";
                }elseif($sb2 =='notlike'){
                  $value =preg_replace('/(?=[!_%])/', '', $textbox2);
                  $Condition2 = "($selectbox2 NOT LIKE '%$value%')";
                }else{
                  $Condition2 ="$selectbox2 !='$textbox2'";
                }
              }else{ $Condition2="'place'='place'";}

              if(isset($textbox3)){

                if($sb3 =='like'){
                  $value =preg_replace('/(?=[!_%])/', '', $textbox3);
                    $Condition3 = "($selectbox3 LIKE '%$value%')";
                }elseif($sb3 =='match'){
                  $Condition3 ="$selectbox3 ='$textbox3'";
                }elseif($sb3 =='notlike'){
                  $value =preg_replace('/(?=[!_%])/', '', $textbox3);
                  $Condition3 = "($selectbox3 NOT LIKE '%$value%')";
                }else{
                  $Condition3 ="$selectbox3 !='$textbox3'";
                }
              }else{ $Condition3="'place'='place'";}


if($distinct =='stage'){

        $sql = "SELECT * FROM $JoinTable
                                WHERE $Condition1
                                  AND $Condition2
                                  AND $Condition3
                                  AND ($daterange)
                                  AND ($evetypes)
                                  ORDER BY event_date ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();

        }else{

  //検索結果をイベント単位で表示（イベントidが重複する行を削除)
  $sql = "SELECT * FROM $JoinTable
  WHERE sid IN (SELECT MIN(sid) FROM $JoinTable
                                WHERE $Condition1     
                                  AND $Condition2
                                  AND $Condition3
                                  AND ($daterange)
                                  AND ($evetypes)
                                  GROUP BY stages.event_id)
                                  ORDER BY event_date ASC";

  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $count = $stmt->rowCount();

      }

    }catch (PDOException $e) {
        $errorMessage = 'データベースエラー';
  }
 }
}


require_once 'views/event.search.tpl.php';
