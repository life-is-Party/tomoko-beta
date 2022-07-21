<!doctype html>
<html lang ="ja">

<?php include('header.search.php'); ?>

<body>

  <!-- <?php echo $sql; ?> -->
  <div>
    <form id="searchForm" name="searchForm" action="" method="POST">
       
          <!-- カラム選択  -->
         <div ><select name="selectbox1">
                 <option value="song" <?php if($_POST["selectbox1"]=="song"){echo "selected";} ?>>楽曲名</option>
                 <option value="artist"<?php if($_POST["selectbox1"]=="artist"){echo "selected";} ?>>原曲</option>
                 <option value="member"<?php if($_POST["selectbox1"]=="member"){echo "selected";} ?>>歌唱</option>
                 <option value="event_Name"<?php if($_POST["selectbox1"]=="event_Name"){echo "selected";} ?>>イベント</option>
                 <!-- <option value="place"<?php if($_POST["selectbox1"]=="place"){echo "selected";} ?>>会場</option> -->
               </select>

               <input type="text" class="textaline" name="textbox1" placeholder="条件1" value="<?php if (!empty($_POST["textbox1"])) {echo htmlspecialchars($_POST["textbox1"], ENT_QUOTES);} ?>">
             
          <!-- 論理条件   -->
                <select name="logic1">
                  <option value="like" <?php if($_POST["logic1"]=="like"){echo "selected";} ?>>を含む</option>
                  <option value="match" <?php if($_POST["logic1"]=="match"){echo "selected";} ?>>である</option>
                  <option value="notlike" <?php if($_POST["logic1"]=="notlike"){echo "selected";} ?>>含まない</option>
                  <option value="not" <?php if($_POST["logic1"]=="not"){echo "selected";} ?>>でない</option>
                </select>
         </div>

         <div><select name="selectbox2">
                 <option value="song" <?php if($_POST["selectbox2"]=="song"){echo "selected";} ?>>楽曲名</option>
                 <option value="artist"<?php if($_POST["selectbox2"]=="artist"){echo "selected";} ?>>原曲</option>
                 <option value="member"<?php if($_POST["selectbox2"]=="member"||empty($_POST["selectbox2"])){echo "selected";} ?>>歌唱</option>
                 <option value="event_Name"<?php if($_POST["selectbox2"]=="event_Name"){echo "selected";} ?>>イベント</option>
                 <!-- <option value="place"<?php if($_POST["selectbox2"]=="place"){echo "selected";} ?>>会場</option> -->
               </select>
                 <input type="text" class="textaline" name="textbox2" placeholder="条件2" value="<?php if (!empty($_POST["textbox2"])) {echo htmlspecialchars($_POST["textbox2"], ENT_QUOTES);} ?>">
                 <select name="logic2">
                    <option value="like" <?php if($_POST["logic2"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["logic2"]=="match"){echo "selected";} ?>>である</option>
                    <option value="notlike" <?php if($_POST["logic2"]=="notlike"){echo "selected";} ?>>含まない</option>
                    <option value="not" <?php if($_POST["logic2"]=="not"){echo "selected";} ?>>でない</option>
                  </select>
          </div>


         <div style="padding-bottom: 5px;"><select name="selectbox3">
                 <option value="member"<?php if($_POST["selectbox3"]=="member"){echo "selected";} ?>>歌唱</option>
                 <option value="song" <?php if($_POST["selectbox3"]=="song"){echo "selected";} ?>>楽曲名</option>
                 <option value="artist"<?php if($_POST["selectbox3"]=="artist"||empty($_POST["selectbox2"])){echo "selected";} ?>>原曲</option>
                 <option value="event_Name"<?php if($_POST["selectbox3"]=="event_Name"){echo "selected";} ?>>イベント</option>
                 <!-- <option value="place"<?php if($_POST["selectbox3"]=="place"){echo "selected";} ?>>会場</option> -->
               </select>
                 <input type="text" class="textaline" name="textbox3" placeholder="条件3" value="<?php if (!empty($_POST["textbox3"])) {echo htmlspecialchars($_POST["textbox3"], ENT_QUOTES);} ?>">
                 <select name="logic3">
                    <option value="like" <?php if($_POST["logic3"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["logic3"]=="match"){echo "selected";} ?>>である</option>
                    <option value="notlike" <?php if($_POST["logic3"]=="notlike"){echo "selected";} ?>>含まない</option>
                    <option value="not" <?php if($_POST["logic3"]=="not"){echo "selected";} ?>>でない</option>
                  </select>
         </div>

         <!-- エラー表示 -->
         <div><font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font></div>

  <!-- 日付 -->
        <div style="padding-bottom: 5px;">
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


      <!-- 表示タイプ切り替え -->
        <div>
          <label><input type="radio" name="radio" value="not" <?php if($_POST["radio"]=="not"||empty($_POST["radio"])){echo "checked";} ?>>全件表示</label>
          <label><input type="radio" name="radio" value="distinct"<?php if($_POST["radio"]=="distinct"){echo "checked";}?>>  
          <select name="selectD">
                  <option value="song" <?php if($_POST["selectD"]=="song"){echo "selected";} ?>>楽曲名</option>
                  <option value="artist"<?php if($_POST["selectD"]=="artist"){echo "selected";} ?>>原曲</option>
                  <option value="member"<?php if($_POST["selectD"]=="member"){echo "selected";} ?>>歌唱</option>
                  <option value="event_Name"<?php if($_POST["selectD"]=="event_Name"){echo "selected";} ?>>イベント</option>
                  <!-- <option value="place"<?php if($_POST["selectD"]=="place"){echo "selected";} ?>>会場</option> -->
                </select>
          ごとに表示</label>
        </div>
            <p><?PHP if (isset ($count)) {echo "<br>".$count ."件見つかりました。↓";} ?></p>
            <div style="padding-top:10px">
              <input type="submit" id="search" name="search" value="検索" style="font-weight:bold"><span class="magnifying_glass"></span>
            </div>

    </div>
  </form>


      <!-- 検索結果-->
    <div>
      <?php if($stmt){$ct = 0; ?>

            <div class="table-responsive">
              <table id="fav-table" class ="table">
                <thead>
                    <th class="text-nowrap">日程</th>
                    <th class="text-nowrap" id="mm100">楽曲</th>
                    <th class="text-nowrap" id="mm100">原曲</th>
                    <th class="text-nowrap">歌唱</th>
                    <th class="text-nowrap">イベント名</th>
                    <!-- <th class="text-nowrap">会場</th>
                    <th class="text-nowrap">備考</th> -->
                </thead>
                <tbody>
                  <?php foreach($stmt as $row)  { ?>
                    <tr>
                      <td><?php $dt =str_replace("-","/",$row['event_date']); echo $dt; ?></td>
                      <td>
                            <?php if($row['songID']!=9999){ ?>
                              <a href="song_profile.php?id=<?= $row['songID'] ?>" target="_blank">
                            <?php } ?>
                            <?= $row['song'] ?></a>
                      </td>
                      <td><?= $row['artist'] ?></td>
                      <td style="max-width:200px"><?= $row['member'] ?></td>
                      <td style="max-width:350px"><a href ="event_profile.php?id=<?= $row['event_id']  ?>" target="_blank"><?= $row['event_Name'] ?></a></td>
                      <!-- <td><?= $row['place'] ?></td> -->
                      <!-- <td><?= $row['remarks'] ?></td> -->
                    </tr>
                  <?php $ct++;}  ?>
                </tbody>
              </table>
            </div>
      <?php if($ct ==0){  echo '<div>データが見つかりませんでした</div>';}
      }else{  } ?>
    </div>
</body>


</html>
