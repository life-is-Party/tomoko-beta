<!doctype html>
<html lang ="ja">

<?php include('header.search.php'); ?>

<body>
      <form id="searchForm" name="searchForm" action="" method="POST">

        
              
                    <font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font>

    <!-- 日付 -->
            <div>
              <input type="date" name="since_date" value ="<?php if(empty($_POST["since_date"])){echo "1998-01-01";}else{echo $_POST["since_date"];} ?>">〜
              <input type="date" name="until_date" value="<?php if(empty($_POST["until_date"])){echo date('Y')."-12-31";}else{echo $_POST["until_date"];} ?>">
            </div>

            <div id="dotframe">
             イベント分類：
             <label><input id="checkAll" type="checkbox" value="">全選択/解除</label>
             <br>
             <label><input name="evetype[]" type="checkbox" value="SP" <?php if(in_array('SP', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>単独</label>
             <label><input name="evetype[]" type="checkbox" value="HC" <?php if(in_array('HC', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>ハロコン</label>
             <label><input name="evetype[]" type="checkbox" value="HF" <?php if(in_array('HF', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>ひなフェス</label>
             <label><input name="evetype[]" type="checkbox" value="CC" <?php if(in_array('CC', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>カウコン</label>
             <label><input name="evetype[]" type="checkbox" value="JO" <?php if(in_array('JO', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>合同コン</label>
             <br>
             <label><input name="evetype[]" type="checkbox" value="FC" <?php if(in_array('FC', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>FCイベント</label>
             <label><input name="evetype[]" type="checkbox" value="BD" <?php if(in_array('BD', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>BDイベント</label>
             <label><input name="evetype[]" type="checkbox" value="TO" <?php if(in_array('TO', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>FCツアー</label>
             <!-- <label><input name="evetype[]" type="checkbox" value="NG" <?php if(in_array('NG', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>名古屋イベント</label> -->
             <br>
             <label><input name="evetype[]" type="checkbox" value="TA" <?php if(in_array('TA', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>研修生発表会</label>
             <label><input name="evetype[]" type="checkbox" value="AC" <?php if(in_array('AC', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>実力診断テスト</label>
             <br>
             <label><input name="evetype[]" type="checkbox" value="BL" <?php if(in_array('BL', (array)$_POST["evetype"])){echo "checked";} ?>>バラッド</label>
             <label><input name="evetype[]" type="checkbox" value="RE" <?php if(in_array('RE', (array)$_POST["evetype"])){echo "checked";} ?>>リリイべ</label>
             <label><input name="evetype[]" type="checkbox" value="SE" <?php if(in_array('SE', (array)$_POST["evetype"])){echo "checked";} ?>>シリイベ</label>
             <label><input name="evetype[]" type="checkbox" value="MS" <?php if(in_array('MS', (array)$_POST["evetype"])){echo "checked";} ?>>MSMW</label>
             <label><input name="evetype[]" type="checkbox" value="TV" <?php if(in_array('TV', (array)$_POST["evetype"])){echo "checked";} ?>>ソロフェス</label>
             <label><input name="other" type="checkbox" value="SE LIKE 'OT%' OR SE LIKE 'SF%' OR SE LIKE 'OD%' OR SE LIKE 'FS%' OR SE LIKE 'DS%'" <?php if(isset($_POST['other'])){echo "checked";} ?>>その他</label>
          </div>

            <input type="submit" id="search" name="search" value="表示">
        </form>


  <!-- 検索結果 -->
    <?php if($stmt){ $ct = 0; ?>
       <div class="table-responsive">
          <table id="fav-table" class ="table" style ="max-width:500px">         
              <thead style="text-align">
                  <th class="text-nowrap">会場</th>
                  <th class="text-nowrap">公演数</th>
              </thead>
              <tbody>
                <?php foreach($stmt as $row) { ?>
                  <tr>
                    <td ><?= $row['place'] ?></td>
                    <td style="max-width:350px"><a href ="place_profile.php?id=<?= $row['place_id']  ?>" target="_blank"><?= $row['place_Name'] ?></a></td>
                    <td style="max-width:50px"><?= $row['placeNum'] ?></td>
                  </tr> 
                <?php $ct++;}  ?>
              </tbody>
          </table>
       </div>
            <?php if($ct ==0){  echo '<div>表示ボタンを押して下さい</div>';}
          }else{  } ?>
      
    
</body>


</html>
