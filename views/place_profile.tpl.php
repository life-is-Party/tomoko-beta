<!DOCTYPE html>
<html lang='ja'>
    <?php include('header.inc.php'); ?>
    <body>
      <?php foreach($places as $place) {}?>
     <h3><?= $place['place_name'] ?></h3>    

    <!-- <?=  var_dump($place); ?> -->


    <table class="place-table">
      <tbody>
        <tr>
          <td>ID</td>
          <td><?= $place['placeID'] ?></td>
        </tr>
        <tr>
          <td>分類</td>
          <td><?= $place['place_type'] ?></td>
        </tr>
        <tr>
          <td>都道府県</td>
          <td><?= $place['region'] ?></td>
        </tr>
        <?php if($place['standing_c']>0){ ?>
        <tr>
          <td>スタンディング</td>
          <td><?= $place['standing_c'] ?></td>
        </tr>
        <?php } ?>
        <tr>
          <td>着席</td>
          <td><?= $place['siting_c'] ?></td>
        </tr>
        <tr>
          <td>住所</td>
          <td><a href="https://maps.google.co.jp/maps?q=<?= $place['addres'] ?>"><?= $place['addres'] ?></a></td>
        </tr>
        <tr>
          <td>リンク</td>
          <td><a href="<?= $place['link'] ?>" target="blank"><?= $place['link'] ?></a></td>
        </tr>
      </tbody>
    </table>

    
    

  <!-- 公演リスト -->


<?php if (!empty($events)){ ?>
<div class="table-responsive">
          <table id="fav-table" class ="caption-top" style="max-width:800px;">  
          <caption>「<?= $place['place_name'] ?>」で行われた公演</caption>        
              <thead style="text-align">
                  <th class="text-nowrap">日程</th>
                  <th class="text-nowrap">イベント名</th> 

              </thead>
              <tbody>
              <?php foreach($events as $event){?>
                <tr>
                  <td><?php $dt =str_replace("-","/",$event['event_date']); echo $dt; ?></td>
                  <td><a href ="event_profile.php?id=<?= $event['event_id']  ?>" target="_blank"><?= $event['event_Name'] ?></a></td>
      
                </tr>
                <?php }  ?>
              </tbody>
          </table>     
      </div>
      <?php   } ?>

 


 <?php include('footer.inc.php'); ?>

    </body>
</html>
