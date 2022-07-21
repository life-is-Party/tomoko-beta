<!doctype html>
<html lang ="ja">

<?php include('header.search.php'); ?>

<body>

      <form id="searchForm" name="searchForm" action="" method="POST">
    <!-- 検索ボックス -->
            <div ><select name="selectbox1">
                    <option value="event_Name"<?php if($_POST["selectbox1"]=="event_Name"){echo "selected";} ?>>イベント</option>
                    <option value="place"<?php if($_POST["selectbox1"]=="place"){echo "selected";} ?>>会場名</option>
                    <option value="region"<?php if($_POST["selectbox1"]=="region"){echo "selected";} ?>>都道府県</option>
                   </select>
                   <input type="text" class="textaline" name="textbox1" placeholder="条件1" value="<?php if (!empty($_POST["textbox1"])) {echo htmlspecialchars($_POST["textbox1"], ENT_QUOTES);} ?>">
                    <select name="sb1">
                    <option value="like" <?php if($_POST["sb1"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb1"]=="match"){echo "selected";} ?>>である</option>
                    <option value="notlike" <?php if($_POST["sb1"]=="notlike"){echo "selected";} ?>>含まない</option>
                    <option value="not" <?php if($_POST["sb1"]=="not"){echo "selected";} ?>>でない</option>
                  </select>
            </div>

            <div ><select name="selectbox2">
                    <option value="event_Name"<?php if($_POST["selectbox2"]=="event_Name"){echo "selected";} ?>>イベント</option>
                    <option value="place"<?php if($_POST["selectbox2"]=="place" ||empty($_POST["selectbox2"])){echo "selected";} ?>>会場名</option>
                    <option value="region"<?php if($_POST["selectbox2"]=="region"){echo "selected";} ?>>都道府県</option>
                   </select>
                    <input type="text" class="textaline" name="textbox2" placeholder="条件2" value="<?php if (!empty($_POST["textbox2"])) {echo htmlspecialchars($_POST["textbox2"], ENT_QUOTES);} ?>">
                    <select name="sb2">
                    <option value="like" <?php if($_POST["sb2"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb2"]=="match"){echo "selected";} ?>>である</option>
                    <option value="notlike" <?php if($_POST["sb2"]=="notlike"){echo "selected";} ?>>含まない</option>
                    <option value="not" <?php if($_POST["sb2"]=="not"){echo "selected";} ?>>でない</option>
                  </select>
            </div>
            <div style="padding-bottom: 5px;"><select name="selectbox3">
                    <option value="event_Name"<?php if($_POST["selectbox3"]=="event_Name"){echo "selected";} ?>>イベント</option>
                    <option value="place"<?php if($_POST["selectbox3"]=="place"){echo "selected";} ?>>会場名</option>
                    <option value="region"<?php if($_POST["selectbox3"]=="region"||empty($_POST["selectbox2"])){echo "selected";} ?>>都道府県</option>
                   </select>
                    <input type="text" class="textaline" name="textbox3" placeholder="条件3" value="<?php if (!empty($_POST["textbox3"])) {echo htmlspecialchars($_POST["textbox3"], ENT_QUOTES);} ?>">
                    <select name="sb3">
                    <option value="like" <?php if($_POST["sb3"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb3"]=="match"){echo "selected";} ?>>である</option>
                    <option value="notlike" <?php if($_POST["sb3"]=="notlike"){echo "selected";} ?>>含まない</option>
                    <option value="not" <?php if($_POST["sb3"]=="not"){echo "selected";} ?>>でない</option>
                  </select>
            </div>

            <font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font>


            <!-- <option value="stages.event_id"<?php if($_POST["selectbox1"]=="stages.event_id"){echo "selected";} ?>>ID</option> -->

    <!-- 日付 -->
            <div style="padding-bottom: 5px;">
              <input type="date" name="since_date" value ="<?php if(empty($_POST["since_date"])){echo "1998-01-01";}else{echo $_POST["since_date"];} ?>">〜
              <input type="date" name="until_date" value="<?php if(empty($_POST["until_date"])){echo date('Y')."-12-31";}else{echo $_POST["until_date"];} ?>">
            </div>

            <div id="dotframe">イベント分類：
                  <label><input id="checkAll" type="checkbox" value="">すべて</label>
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
                  <br>
                  <label><input name="evetype[]" type="checkbox" value="TA" <?php if(in_array('TA', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>研修生発表会</label>
                  <label><input name="evetype[]" type="checkbox" value="AC" <?php if(in_array('AC', (array)$_POST["evetype"])||empty($_POST["evetype"])){echo "checked";} ?>>実力診断テスト</label>
                  <br>
                  <label><input name="evetype[]" type="checkbox" value="BL" <?php if(in_array('BL', (array)$_POST["evetype"])){echo "checked";} ?>>バラッド</label>
                  <label><input name="evetype[]" type="checkbox" value="RE" <?php if(in_array('RE', (array)$_POST["evetype"])){echo "checked";} ?>>リリイべ</label>
                  <label><input name="evetype[]" type="checkbox" value="SE" <?php if(in_array('SE', (array)$_POST["evetype"])){echo "checked";} ?>>シリイベ</label>
                  <label><input name="evetype[]" type="checkbox" value="MS" <?php if(in_array('MS', (array)$_POST["evetype"])){echo "checked";} ?>>MSMW</label>
                  <label><input name="evetype[]" type="checkbox" value="SF" <?php if(in_array('SF', (array)$_POST["evetype"])){echo "checked";} ?>>ソロフェス</label>
                  <label><input name="other" type="checkbox" value="stages.event_id LIKE 'OT%' OR stages.event_id LIKE 'SF%' OR stages.event_id LIKE 'OD%' OR stages.event_id LIKE 'FS%' OR stages.event_id LIKE 'DS%'" <?php if(isset($_POST['other'])){echo "checked";} ?>>その他</label>
          
            </div>
    <!-- 表示タイプ切り替え -->
            <div>
              <label><input type="radio" name="radio2" value="event"<?php if($_POST["radio2"]=="event"||empty($_POST["event"])){echo "checked";}?>>イベントごとに表示</label>
              <label><input type="radio" name="radio2" value="stage" <?php if($_POST["radio2"]=="stage"){echo "checked";} ?>>全公演表示</label>
            </div>

            <p><?php if (isset ($count)) {echo $count ."件見つかりました。↓";} ?></p>

            <div style="padding-top:5px">
         <input type="submit" id="search" name="search" value="検索" style="font-weight:bold"><span class="magnifying_glass"></span>
        </div>
        </form>
<!-- <?= $sql1 ?> -->

  <!-- 検索結果 -->
      
      <div class="table-responsive">
          <table id="fav-table" class ="table">
            <?php if($stmt){ $ct = 0; ?>
                <thead style="text-align">
                    <th class="text-nowrap">日程</th>
                    <!-- <th class="text-nowrap">ID</th> -->
                    <th class="text-nowrap">イベント名</th>
                    <th class="text-nowrap">会場</th>
                    <th class="text-nowrap">地域</th>

                </thead>
                <tbody>
                  <?php
                foreach($stmt as $row){ ?>
                  <tr>
                    <td><?php $dt =str_replace("-","/",$row['event_date']); echo $dt; ?></td>
                    <!-- <td><?= $row['event_id'] ?></td> -->
                    <td><a href ="event_profile.php?id=<?= $row['event_id']  ?>" target="_blank"><?= $row['event_Name'] ?></a></td>
                    <td><?= $row['place'] ?></td>
                    <td><?= $row['region'] ?></td>
                  </tr>
                  <?php $ct++;}  ?>
                </tbody>
          </table>
            <?php if($ct ==0){  echo '<div>イベントが見つかりませんでした</div>';}
          }else{  } ?>
      </div>
    </div>
</body>


</html>
