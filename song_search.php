<?php
error_reporting(0);
//エラーメッセージの初期化
$errorMessage = "";
//フラグの初期化
$o = false;

include_once 'pdo.php';


if (isset($_POST["search"])) {
    if (empty($_POST["song"])
    and empty($_POST["artist"])
    and empty($_POST["lyric"])
    and empty($_POST["composed"])
    and empty($_POST["arranged"])
    ) {
        $errorMessage = '最低一つのボックスに入力してください';
    }
    else{
    $o = true;

    //入力した文字を変数に格納
    //文字入力
    $song = $_POST["song"];
    $artist = $_POST["artist"];
    $lyric = $_POST["lyric"];
    $composed = $_POST["composed"];
    $arranged = $_POST["arranged"];
    $fire = $_POST["fire"];

    //複数検索用
    $songs = explode(" ",mb_convert_kana($song,'s'));
    $artists = explode(" ",mb_convert_kana($artist,'s'));
    $lyrics = explode(" ",mb_convert_kana($lyric,'s'));
    $composeds = explode(" ",mb_convert_kana($composed,'s'));
    $arrangeds = explode(" ",mb_convert_kana($arranged,'s'));

    //検索タイプ選択
    $sb_song = $_POST["sb_song"];
    $sb_artist = $_POST["sb_artist"];
    $sb_lyric = $_POST["sb_lyric"];
    $sb_composed = $_POST["sb_composed"];
    $sb_arranged = $_POST["sb_arranged"];

    $in1 = $_POST["in1"];
    $in2 = $_POST["in2"];
    $in3 = $_POST["in3"];
    $in4 = $_POST["in4"];
    $in5 = $_POST["in5"];

    //リリースタイプ
    $albumCategory = implode("' OR albumCategory ='", $_POST["albumCategory"]);
    $albumCategorys = "albumCategory ='$albumCategory'";

    //リリース日
    $since_date =$_POST["since_date"];
    $until_date =$_POST["until_date"];
    $daterange ="releaseDate BETWEEN '$since_date' AND '$until_date'";

    //OG、関連作品
    if($fire == 1){
      $ogcondition = "albums.hp <2 ";
     }else{
       $ogcondition ="albums.hp <1 ";
     }
    

    //sql条件式代入用変数
    $JoinTable = "(song_credits LEFT OUTER JOIN albums ON song_credits.Pnumber = albums.Pnumber)";
    // $selectcolumns ="y";

  try{
    $pdo = new PDO($dsn,$user,$pass);

    //where文作成
    if(!empty($sb_song)){
            if($sb_song =='like'){
              if($in1 == 'in1'){
                  foreach($songs as $song){
                    $value =preg_replace('/(?=[!_%])/', '', $song);
                    $songCondition[] = "(songName LIKE '%$value%')";
                  }
                  $songCondition = implode(' OR ', $songCondition);
              }else{
                  $value =preg_replace('/(?=[!_%])/', '', $song);
                  $songCondition = "(songName LIKE '%$value%')";
                }
              }else{
              if($in1 == 'in1'){
                  foreach($songs as $song){
                    $value =preg_replace('/(?=[!_%])/', '', $song);
                    $songCondition[] ="songName = '$value'";
                  }
                  $songCondition = implode(' OR ', $songCondition);
                }
                else{
                  $songCondition ="songName ='$song'";
                }
              }
            }else{$songCondition =" SongName like %%";}

    if(!empty($sb_artist)){
           if($sb_artist =='like'){
              if($in2 == 'in2'){
                  foreach($artists as $artist){
                    $value =preg_replace('/(?=[!_%])/', '', $artist);
                    $artistCondition[] = "(songArtistName LIKE '%$value%')";
                  }
                  $artistCondition = implode(' OR ', $artistCondition);
              }else{
                  $value =preg_replace('/(?=[!_%])/', '', $artist);
                  $artistCondition = "(songArtistName LIKE '%$value%')";
                }
              }else{
              if($in2 == 'in2'){
                  foreach($artists as $artist){
                    $value =preg_replace('/(?=[!_%])/', '', $artist);
                    $artistCondition[] ="songArtistName = '$value'";
                  }
                  $artistCondition = implode(' OR ', $artistCondition);
                }
                else{
                  $artistCondition ="songArtistName ='$artist'";
                }
              }
            }else{$artistCondition =" songArtistName like %%";}

    if(!empty($sb_lyric)){
        if($sb_lyric =='like'){
          if($in3 == 'in3'){
              foreach($lyrics as $lyric){
                $value =preg_replace('/(?=[!_%])/', '', $lyric);
                $lyricCondition[] = "(lyric LIKE '%$value%')";
              }
              $lyricCondition = implode(' OR ', $lyricCondition);
          }else{
              $value =preg_replace('/(?=[!_%])/', '', $lyric);
              $lyricCondition = "(lyric LIKE '%$value%')";
            }
          }else{
          if($in3 == 'in3'){
              foreach($lyrics as $lyric){
                $value =preg_replace('/(?=[!_%])/', '', $lyric);
                $lyricCondition[] ="lyric = '$value'";
              }
              $lyricCondition = implode(' OR ', $lyricCondition);
            }
            else{
              $lyricCondition ="lyric ='$lyric'";
            }
          }
        }else{$lyricCondition ="lyric like %%";}

    if(!empty($sb_composed)){
        if($sb_composed =='like'){
          if($in4 == 'in4'){
              foreach($composeds as $composed){
                $value =preg_replace('/(?=[!_%])/', '', $composed);
                $composedCondition[] = "(composed LIKE '%$value%')";
              }
              $composedCondition = implode(' OR ', $composedCondition);
          }else{
              $value =preg_replace('/(?=[!_%])/', '', $composed);
              $composedCondition = "(composed LIKE '%$value%')";
            }
          }else{
          if($in4 == 'in4'){
              foreach($composeds as $composed){
                $value =preg_replace('/(?=[!_%])/', '', $composed);
                $composedCondition[] ="composed = '$value'";
              }
              $composedCondition = implode(' OR ', $composedCondition);
            }
            else{
              $composedCondition ="composed ='$composed'";
            }
          }
        }else{$composedCondition ="composed like %%";}

    if(!empty($sb_arranged)){
            if($sb_arranged =='like'){
              if($in5 == 'in5'){
                  foreach($arrangeds as $arranged){
                    $value =preg_replace('/(?=[!_%])/', '', $arranged);
                    $arrangedCondition[] = "(arranged LIKE '%$value%')";
                  }
                  $arrangedCondition = implode(' OR ', $arrangedCondition);
              }else{
                  $value =preg_replace('/(?=[!_%])/', '', $arranged);
                  $arrangedCondition = "(arranged LIKE '%$value%')";
                }
              }else{
              if($in5 == 'in5'){
                  foreach($arrangeds as $arranged){
                    $value =preg_replace('/(?=[!_%])/', '', $arranged);
                    $arrangedCondition[] ="arranged = '$value'";
                  }
                  $arrangedCondition = implode(' OR ', $arrangedCondition);
                }
                else{
                  $arrangedCondition ="arranged ='$arranged'";
                }
              }
            }else{$arrangedCondition =" arranged like %%";}


        $sql = "SELECT * FROM $JoinTable
                                WHERE $songCondition
                                  AND $artistCondition
                                  AND $lyricCondition
                                  AND $composedCondition
                                  AND $arrangedCondition
                                  AND ($daterange)
                                  AND ($albumCategorys)
                                  AND ($ogcondition)
                                  ORDER BY releaseDate ASC";

        $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();


      }
      catch (PDOException $e) {
          $errorMessage = 'データベースエラー';
      }

   }
  }

require_once 'views/song.search.tpl.php';
