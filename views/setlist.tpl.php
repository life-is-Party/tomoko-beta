<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>

<!-- セトリ -->
<?php foreach($stages as $stage)  {?>






  <p><?php $dt =str_replace("-","/",$stage['event_date']); echo $dt; ?>
  <span class="mgl-10">start/<?= $stage["start_time"] ?></span></p>
  <p>@<?= $stage['place'] ?></p>



<?php } ?>

  <div class ="table-responsive"  >
        <table id="fav-table" >
          <thead>
            <th class= "text-nowrap" style="min-width:7px; text-align:right">曲順</th>
            <th class= "text-nowrap" style="min-width:100px">楽曲</th>
            <th class= "text-nowrap" style="nin-width:50px">クレジット</th>
            <th class= "text-nowrap" style="min-width:100px">パフォーマンス</th>
            <th class= "text-nowrap" style="min-width:30px">区分</th>
            <th class= "text-nowrap">備考</th>
          </thead>
          <tbody>
          <?php foreach($results as $setlist)  {?>
                <tr>
                  <td style="max-width:7px; text-align:right"><?= $setlist['MO'] ?></td>
                  <td style="max-width:100px padding:2px">
                    <?php if($setlist['songID']!=9999){ ?>
                      <a href="song_profile.php?id=<?= $setlist['songID'] ?>" target="_blank">
                      <?php } ?>
                      <?= $setlist['song'] ?></a>
                  </td>
                  <td style="max-width:50px"><?= $setlist['artist'] ?></td>
                  <td style="max-width:100px"><?= $setlist['member'] ?></td>
                  <td style="max-width:30px"><?= $setlist['class'] ?></td>
                  <td><?= $setlist['remarks'] ?></td>
                </tr>
          <?php } ?>
          </tbody>
        </table>
  </div>

    </body>
</html>
