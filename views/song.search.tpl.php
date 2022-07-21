<!doctype html>
<html lang ="ja">

<?php include('header.search.php'); ?>

<body>
<!-- <?=  $sql  ?> -->
      <form id="searchForm" name="searchForm" action="" method="POST">

    <!-- テキストフォーム -->
            <div><p>チェックで複数検索（半角スペース区切り）
              <div class="search">
                <b>曲名 </b>
                <input type="text" class="textaline" name="song" placeholder="Feel! 感じるよ"
                value="<?php if (!empty($_POST["song"])) {echo htmlspecialchars($_POST["song"], ENT_QUOTES);} ?>">
                <select name="sb_song">
                    <option value="like" <?php if($_POST["sb_song"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb_song"]=="match"){echo "selected";} ?>>である</option>
                  </select>
                  <input type="checkbox" name="in1" value="in1" <?php if($_POST["in1"]=="in1"){echo "checked";} ?> >
              </div>
              <div>
                <b>歌手 </b>
                <input type="text" class="textaline" name="artist" placeholder="Juice=Juice" value="<?php if (!empty($_POST["artist"])) {echo htmlspecialchars($_POST["artist"], ENT_QUOTES);} ?>">
                <select name="sb_artist">
                    <option value="like" <?php if($_POST["sb_artist"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb_artist"]=="match"){echo "selected";} ?>>である</option>
                  </select>
                  <input type="checkbox" name="in2" value="in2" <?php if($_POST["in2"]=="in2"){echo "checked";} ?> >
              </div>
              <div>
                <b>作詞 </b>
                <input type="text" class="textaline" name="lyric" placeholder="三浦徳子" value="<?php if (!empty($_POST["lyric"])) {echo htmlspecialchars($_POST["lyric"], ENT_QUOTES);} ?>">
                <select name="sb_lyric">
                    <option value="like" <?php if($_POST["sb_lyric"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb_lyric"]=="match"){echo "selected";} ?>>である</option>
                  </select>
                  <input type="checkbox" name="in3" value="in3" <?php if($_POST["in3"]=="in3"){echo "checked";} ?> >
              </div>
              </div>
              <div>
                <b>作曲 </b>
                <input type="text" class="textaline" name="composed" placeholder="中村瑛彦"
                value="<?php if (!empty($_POST["composed"])) {echo htmlspecialchars($_POST["composed"], ENT_QUOTES);} ?>">
                <select name="sb_composed">
                    <option value="like" <?php if($_POST["sb_composed"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb_composed"]=="match"){echo "selected";} ?>>である</option>
                  </select>
                  <input type="checkbox" name="in4" value="in4" <?php if($_POST["in4"]=="in4"){echo "checked";} ?> >
              </div>
              </div>
              <div>
                <b>編曲 </b>
                <input type="text" class="textaline" name="arranged" placeholder="中村瑛彦"
                value="<?php if (!empty($_POST["arranged"])) {echo htmlspecialchars($_POST["arranged"], ENT_QUOTES);} ?>">
                <select name="sb_arranged">
                    <option value="like" <?php if($_POST["sb_arranged"]=="like"){echo "selected";} ?>>を含む</option>
                    <option value="match" <?php if($_POST["sb_arranged"]=="match"){echo "selected";} ?>>である</option>
                  </select>
                  <input type="checkbox" name="in5" value="in5" <?php if($_POST["in5"]=="in5"){echo "checked";} ?> >
              </div>
              </div>
            </div>
    <!-- 日付 -->
            <div style="padding-bottom: 5px;">
              リリース日
              <br>
              <input type="date" name="since_date" value ="<?php if(empty($_POST["since_date"])){echo "1997-01-01";}else{echo $_POST["since_date"];} ?>">〜
              <input type="date" name="until_date" value="<?php if(empty($_POST["until_date"])){echo date('Y')."-12-31";}else{echo $_POST["until_date"];} ?>">
            </div>
    <!-- 分類 -->
    <div id="dotframe" style="padding: 5px; margin-bottom: 5px; border: 1px dashed #333333;">種類：
          <label><input id="checkAll" type="checkbox" value="">すべて</label>
          <br>
          <label><input name="albumCategory[]" type="checkbox" value="シングル" <?php if(in_array('シングル', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>シングル</label>
          <label><input name="albumCategory[]" type="checkbox" value="インディーズシングル" <?php if(in_array('インディーズシングル', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>インディーズシングル</label>
          <label><input name="albumCategory[]" type="checkbox" value="配信" <?php if(in_array('配信', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>配信</label>
          <label><input name="albumCategory[]" type="checkbox" value="DVDシングル" <?php if(in_array('DVDシングル', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>DVDシングル</label>
          <br>
          <label><input name="albumCategory[]" type="checkbox" value="オリジナルアルバム" <?php if(in_array('オリジナルアルバム', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>オリジナルアルバム</label>
          <label><input name="albumCategory[]" type="checkbox" value="ミニアルバム" <?php if(in_array('ミニアルバム', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>ミニアルバム</label>
          <label><input name="albumCategory[]" type="checkbox" value="ベストアルバム" <?php if(in_array('ベストアルバム', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>ベストアルバム</label>
          <label><input name="albumCategory[]" type="checkbox" value="カバーアルバム" <?php if(in_array('カバーアルバム', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>カバーアルバム</label>
          <label><input name="albumCategory[]" type="checkbox" value="サウンドトラック" <?php if(in_array('サウンドトラック', (array)$_POST["albumCategory"])||empty($_POST["albumCategory"])){echo "checked";} ?>>サウンドトラック</label>
    </div>
    <div>
      <label><input name="fire" type="checkbox" value="1" <?php if(!empty($_POST["fire"])){echo "checked";} ?>>OG/関連作品を含める</label>
    </div>



        <div style="padding-top:10px">
            <input type="submit" id="search" name="search" value="検索" style="font-weight:bold"><span class="magnifying_glass"></span> 
              <font color="#ff0000"><?php echo htmlspecialchars($errorMessage, ENT_QUOTES); ?></font>
        </div>


        </form>


  <!-- 検索結果 -->
  <div>
      <p><?PHP if (isset ($count)) {echo $count ."件見つかりました。";} ?></p>

      <div class="table-responsive">
          <table id="fav-table" class ="table">
            <?php if($stmt){ $ct = 0; ?>
                <thead style="text-align">
                    <th class="text-nowrap">リリース日</th>
                    <th class="text-nowrap">楽曲名</th>
                    <th class="text-nowrap">アーティスト</th>
                    <th class="text-nowrap">作詞</th>
                    <th class="text-nowrap">作曲</th>
                    <th class="text-nowrap">編曲</th>
                    <th class="text-nowrap">収録</th>
                </thead>
                <tbody>
                  <?php foreach($stmt as $row)  { ?>
                  <tr>
                    <td><?php $dt =str_replace("-","/",$row['releaseDate']); echo $dt; ?></td>
                    <td><a href="song_profile.php?id=<?= $row['songID'] ?>" target="_blank"><?= $row['songName'] ?>
                    </a></td>
                    <td><?= $row['songArtistName'] ?></td>
                    <td><?= $row['lyric'] ?></td>
                    <td><?= $row['composed'] ?></td>
                    <td><?= $row['arranged'] ?></td>
                    <td><a href="<?= $row['link'] ?>" target="_blank"><?= $row['albumName'] ?></a></td>
                  </tr>
                  <?php $ct++;}  ?>
                </tbody>
          </table>
            <?php if($ct ==0){  echo '<div>楽曲が見つかりませんでした</div>';}
          }else{  } ?>
      </div>
    </div>
</body>
</html>
