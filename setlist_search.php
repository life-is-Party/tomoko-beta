<?php
error_reporting(0);
//エラーメッセージの初期化
$errorMessage = "";
//フラグの初期化
$o = false;
include_once 'pdo.php';

//検索ボタンが押された時の処理
if (isset($_POST["search"])) {
    //入力チェック
    if (empty($_POST["textbox1"])
    and empty($_POST["textbox2"])
    and empty($_POST["textbox3"])
    ) {
        $errorMessage = '未入力です。';
    }else
    {
        $o = true;
        //入力した文字を変数に格納
        $textbox1 = preg_replace( '/\'/',"\'",$_POST["textbox1"]);
        $textbox2 = preg_replace( '/\'/',"\'",$_POST["textbox2"]);
        $textbox3 = preg_replace( '/\'/',"\'",$_POST["textbox3"]);

        //カラム選択
        $selectbox1 = $_POST["selectbox1"];
        $selectbox2 = $_POST["selectbox2"];
        $selectbox3 = $_POST["selectbox3"];

        //論理条件選択
        $logic1 =$_POST["logic1"];
        $logic2 =$_POST["logic2"];
        $logic3 =$_POST["logic3"];
      

        //イベント分類
        $other= $_POST['other'];
        $eventIDs = $_POST["evetype"];
        foreach($eventIDs as $eventID){
          $evetype[] = "SE LIKE '$eventID%'";
        }

        if(isset($other)&&isset($evetype)){
          $OR ="OR";
        }else{
          $OR ="";
        }

        $evetype1 = implode(' OR ', $evetype);
        $evetypes = " $other $OR $evetype1";

        // 日付
        $since_date =$_POST["since_date"];
        $until_date =$_POST["until_date"];
        $daterange ="event_date BETWEEN '$since_date' AND '$until_date'";

        // 表示タイプ
        $distinct = $_POST["radio"];
        $selectD = $_POST["selectD"];

        // テーブル結合
        $JoinTable="(
        setlists LEFT OUTER JOIN  (
            SELECT event_date,event_Name,place,stages.event_id AS SE,events.event_id AS EE,stages.stage_id 
            FROM stages
            LEFT OUTER JOIN events ON stages.event_id = events.event_id)AS J
            ON setlists.stage_id = J.stage_id)";


    // 例外処理
        try {
          $pdo = new PDO($dsn,$user,$pass);

                  if(isset($textbox1)){
                    if($logic1 =='like'){
                      $value =preg_replace('/(?=[!_%])/', '', $textbox1);
                        $Condition1 = "($selectbox1 LIKE '%$value%')";
                    }elseif($logic1 =='match'){
                      $Condition1 ="$selectbox1 ='$textbox1'";
                    }elseif($logic1 =='notlike'){
                      $value =preg_replace('/(?=[!_%])/', '', $textbox1);
                      $Condition1 = "($selectbox1 NOT LIKE '%$value%')";
                    }else{
                      $Condition1 ="$selectbox1 !='$textbox1'";
                    }
                  }else{ $Condition1="'artist'='artist'";}

                    if(isset($textbox2)){
                    if($logic2 =='like'){
                      $value =preg_replace('/(?=[!_%])/', '', $textbox2);
                        $Condition2 = "($selectbox2 LIKE '%$value%')";
                    }elseif($logic2 =='match'){
                      $Condition2 ="$selectbox2 ='$textbox2'";
                    }elseif($logic2 =='notlike'){
                      $value =preg_replace('/(?=[!_%])/', '', $textbox2);
                      $Condition2 = "($selectbox2 NOT LIKE '%$value%')";
                    }else{
                      $Condition2 ="$selectbox2 !='$textbox2'";
                    }
                  }else{ $Condition2="'artist'='artist'";}

                  if(isset($textbox3)){
                    if($logic3 =='like'){
                      $value =preg_replace('/(?=[!_%])/', '', $textbox3);
                        $Condition3 = "($selectbox3 LIKE '%$value%')";
                    }elseif($logic3 =='match'){
                      $Condition3 ="$selectbox3 ='$textbox3'";
                    }elseif($logic3 =='notlike'){
                      $value =preg_replace('/(?=[!_%])/', '', $textbox3);
                      $Condition3 = "($selectbox3 NOT LIKE '%$value%')";
                    }else{
                      $Condition3 ="$selectbox3 !='$textbox3'";
                    }
                  }else{ $Condition3="'artist'='artist'";}

    if($distinct =='not'){

            $sql = "SELECT song,member,artist,event_date,event_id,event_Name,songID FROM $JoinTable
                                    WHERE $Condition1
                                      AND ($Condition2)
                                      AND ($Condition3)
                                      AND ($daterange)
                                      AND ($evetypes)
                                      ORDER BY event_date ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();

            }else{
              //選択したカラムの重複を削除
              $sql = "SELECT song,member,artist,event_date,event_id,event_Name,songID FROM $JoinTable
              WHERE lid IN (SELECT MIN(lid) FROM $JoinTable
                                            WHERE $Condition1     
                                            AND ($Condition2)
                                            AND ($Condition3)
                                            AND ($daterange)
                                            AND ($evetypes)
                                            GROUP BY $selectD)
                                            ORDER BY event_date ASC";

              $stmt = $pdo->prepare($sql);
              $stmt->execute();
              $count = $stmt->rowCount();
      
          }

        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
        }
    }
}


require_once 'views/setlist.search.tpl.php';
