<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>
    <style>
      .team{
    width:100%;
    max-width:500px
}

      </style>

    <body>
      <?php foreach($events as $event) {?>
     <h3><?= $event['event_Name'] ?></h3>
  <div>
    <br>
    <p>ID：<?= $event['event_id'] ?></p>
    <p>公演数：<?= $event['stagesN'] ?></p>
    <p>出演：<?= $event['performer'] ?></p>
    <?= $event['description'] ?>
 </div>
      
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
  <div class="table-responsive" >
    <table id="stage_tl" class ="table-bordered caption-top" >
      <caption>スケジュール</caption>
      <thead>
        <th class= "text-nowrap">日程</th>
        <th class= "text-nowrap">開演</th>
        <th class= "text-nowrap">会場</th>
        <th class= "text-nowrap">地域</th>
        <th class= "text-nowrap">キャパ</th>
        <th class= "text-nowrap">パターン</th>
        <th class= "text-nowrap">中止/延期</th>
        <th>欠席</th>
      </thead>
      <tbody>
    <?php foreach($stages as $stage)  {?>
            <tr>
              <td><?php $dt =str_replace("-","/",$stage['event_date']); echo $dt; ?></td>
              <td><?= $stage["start_time"] ?></td>
              <td style="text-align:left"><?= $stage['place'] ?></td>
              <td style="min-width:50px"><?= $stage['region'] ?></td>
              <td style="text-align:left">
              <?php if(isset($stage['siting_c'] ))
              {echo $stage['siting_c'];}
              else{echo $stage['standing_c'];}
               ?></td>
              <td style="min-width:50px"><?= $stage['stage_pattern'] ?></td>
              <td><?= $stage['cancelld'] ?></td>
              <td class= "text-nowrap"><?= $stage['absence'] ?></td>
            </tr>
            <?php } ?>
          </tbody>
    </table>

  </div>


<!-- セトリ -->

  <div class="table-responsive" >
        <table id="fav-table" class ="caption-top " >
          <caption>セットリスト概要</caption>
          <thead>
            <th class= "text-nowrap" style="min-width:7px; text-align:right">曲順</th>
            <th class= "text-nowrap" style="min-width:100px">楽曲</th>
            <th class= "text-nowrap" style="nin-width:50px">クレジット</th>
            <th class= "text-nowrap" style="min-width:100px">パフォーマンス</th>
            <th class= "text-nowrap" style="min-width:30px">回替わり</th>
            <th class= "text-nowrap" style="min-width:30px">区分</th>
            <th class= "text-nowrap">備考</th>
          </thead>
          <tbody>
          <?php foreach($results as $setlist)  {?>
                <tr>
                  <td style="max-width:7px; text-align:right"><?= $setlist['MO'] ?></td>
                  <td style="max-width:100px">
                    <?php if($setlist['songID']!=9999){ ?>
                      <a href="song_profile.php?id=<?= $setlist['songID'] ?>" target="_blank">
                      <?php } ?>
                      <?= $setlist['song'] ?></a>
                  </td>
                  <td style="max-width:50px"><?= $setlist['artist'] ?></td>
                  <td style="max-width:100px"><?= $setlist['member'] ?></td>
                  <td style="max-width:30px"><?= $setlist["variation"] ?></td>
                  <td style="max-width:30px"><?= $setlist['class'] ?></td>
                  <td><?= $setlist['remarks'] ?></td>
                </tr>
          <?php } ?>
          </tbody>
        </table>
  </div>

  <!-- <P><a href = 'event_search.php'>イベント検索へ</a></P> -->

 <?php include('footer.inc.php'); ?>

    </body>
</html>
