<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>
    <link href="./css/modaal.css" rel="stylesheet" type="text/css">
    <script src="./js/modaal.js"></script>
    <style>
      .team{
    width:100%;
    max-width:500px
}

      </style>

  <body>
  <!-- <?php var_dump($song); ?> -->
      <?php foreach($events as $event) {?>
     <h3><?= $event['event_Name'] ?></h3>
  <div>
    <br>
    <p>ID：<?= $event['event_id'] ?></p>
    <p>公演数：<?= $event['stagesN'] ?></p>
    <p>出演：<?= $event['performer'] ?></p>
    <?= $event['description'] ?>
 </div>
  <br>
 
    <!-- appearance整備後 -->
      <!-- <?php
                   foreach($appearances as $yana){
                       $funa[]=$yana['memberName'];
                     }
                     $appearance = implode('、',$funa);
                     echo $appearance;
                  ?></p>
        <?php } ?> -->


  <!-- 公演リスト -->

  <div class="example" >
    <table id="stage_tl2" style="border-collapse: separate">
      <tr>
        <th>セトリ</th>
        <th>日程</th>
        <th>開演</th>
        <th>会場</th>
        <th>地域</th>
        <th nowrap>キャパ</th>
        <th>パターン</th>
        <th>中止/延期</th>
        <th>欠席</th>
    </tr>     
    <?php foreach($stages as $stage)  {?>
            <tr>
              <th nowrap><a id="stl" class="btn iframe" href="setlist.php?id=<?= $stage["stage_id"] ?>">表示</a></th>
              <td><?php $dt =str_replace("-","/",$stage['event_date']); echo $dt; ?></td>
              <td><?= $stage["start_time"] ?></td>
              <td style="text-align:left"><?= $stage['place'] ?></td>
              <td style="min-width:50px"><?= $stage['region'] ?></td>
              <td style="text-align:left">
              <?php if(isset($stage['siting_c'] ))
              {echo $stage['siting_c'];}
              else{echo $stage['standing_c'];}
               ?></td>
              <td style="min-width:100px"><?= $stage['stage_pattern'] ?></td>
              <td style="min-width:60px"><?= $stage['cancelld'] ?></td>
              <td class= "text-nowrap"><?= $stage['absence'] ?></td>
            </tr>
            <?php } ?>

    </table>
  </div>

  <div class="table-responsive">
          <table id="fav-table2" class ="caption-top " style="max-width:900px">
          <caption>披露楽曲一覧</caption>
                <thead style="text-align">
                    <th class="text-nowrap">曲名</th>
                    <th class="text-nowrap">クレジット</th>
                    <!-- <th class="text-nowrap">パフォーマンス</th> -->
                    <th class="text-nowrap">回数</th>
                    <th class="text-nowrap">初出</th>
                </thead>
                <tbody>
                  <?php
                foreach($songs as $song){ ?>
                  <tr>
                  <td style="min-width:150px">
                    <?php if($song['songID']!=9999){ ?>
                      <a href="song_profile.php?id=<?= $song['songID'] ?>" target="_blank">
                      <?php } ?>
                      <?= $song['song'] ?></a>
                  </td>
                    <td ><?= $song['artist'] ?></td>
                    <!-- <td ><?= $song['member'] ?></td> -->
                    <td style="min-width:50px"><?= $song['songs'] ?></td>
                    <td ><a id="stl" class="btn iframe" style="padding:0;color:#0a58ca;" href="setlist.php?id=<?= $song["stage_id"] ?>"><?= $song['variation'] ?></a></td>
                  </tr>
                <?php } ?>
                </tbody>
          </table>
      </div>
    </div>
</body>


  

  <script type="text/javascript">
$('.iframe').modaal({
	type: 'iframe',
	width: 800,
	height: 800
});
</script>

 <?php include('footer.inc.php'); ?>

    </body>
</html>