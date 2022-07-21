<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>
    <body>
      <?php foreach($songs as $song) {}?>
     <h3><?= $song['name'] ?></h3>    

    <br>
    <p>ID:<?= $song['id'] ?></p>
    <p>オリジナル：<?= $song['artist'] ?></p>
    


<!-- Youtube埋め込み -->

<!-- <?php var_dump($song['video']); ?> -->

<?php if (!empty($song['video'] )){?>
  <div class="iframe-wrapper" >
    <iframe 
    src="<?= $song['video'] ?>" 
    title="YouTube video player" 
    frameborder="0" 
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
     allowfullscreen>

    </iframe>
 </div>
 <?php } ?>

 <?= $albums['songName'] ?>


<!-- リンク確認用 -->
  <!-- <?= $song['video'] ?> -->

   

  <div class="table-responsive">
          <table id="fav-table" class ="table caption-top" >
          <caption>リリース情報</caption>
                <thead style="text-align">
                    <th class="text-nowrap" style="width:80px">リリース日</th>
                    <th class="text-nowrap">収録</th>
                    <th class="text-nowrap">楽曲名</th>
                    <th class="text-nowrap">アーティスト</th>
                    <th class="text-nowrap">作詞</th>
                    <th class="text-nowrap">作曲</th>
                    <th class="text-nowrap">編曲</th>
                </thead>
                <tbody>
                  
                <?php foreach($albums as $album)  { ?>
                  <tr>
                    <td style="width:80px"><?php $dt =str_replace("-","/",$album['releaseDate']); echo $dt; ?></td>
                    <td style="min-width:80px"><a href="<?= $album['link'] ?>" target="_blank"><?= $album['albumName'] ?></a></td>
                    <td style="min-width:80px"><?= $album['songName'] ?></td>
                    <td><?= $album['songArtistName'] ?></td>
                    <td><?= $album['lyric'] ?></td>
                    <td><?= $album['composed'] ?></td>
                    <td><?= $album['arranged'] ?></td>
                  </tr>
                  <?php }  ?>
                </tbody>
          </table>
  </div>

  <!-- 公演リスト -->

  <?php if (!empty($events)){?>
  <div class="table-responsive">
       <table id="fav-table2" class ="table caption-top" >
          <caption>『<?= $song['name'] ?>』が披露されたイベント</caption>
          <thead>
            <th class= "text-nowrap" style="max-width:30px">日付</th>
            <th class= "text-nowrap" style="max-width:30px">イベントタイトル</th>
            <th class= "text-nowrap" style="min-width:100px">曲名</th>
            <th class= "text-nowrap" style="min-width:100px">グループ/メンバー</th>          
          </thead>
          <tbody>
          <?php foreach($events as $event){?>
                <tr>
                <td style="width:80px"><?php $dt =str_replace("-","/",$event['event_date']); echo $dt; ?></td>
                  <td style="max-width:200px"><a href ="event_profile.php?id=<?= $event['event_id']  ?>" target="_blank"><?= $event['event_Name'] ?></a></td>
                  <td style="max-width:150px"><?= $event['song'] ?></td>
                  <td style="max-width:200px"><?= $event['member'] ?></td>
                </tr>
          <?php } ?>
          </tbody>
        </table>
  </div>
<?php } ?>
 


 <?php include('footer.inc.php'); ?>

    </body>
</html>
