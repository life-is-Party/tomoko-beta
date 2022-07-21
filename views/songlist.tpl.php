<!doctype html>
<html lang ="ja">

<?php include('header.search.php'); ?>

<body>


  <!-- 検索結果 -->

      <div class="table-responsive">
          <table id="fav-table" class ="table" style ="width:30%">
                <thead style="text-align">
                    <th class="text-nowrap">曲名</th>
                    <th class="text-nowrap">回数</th>
                </thead>
                <tbody>
                  <?php
                foreach($stmt as $fire){ ?>
                  <tr>
                    <td ><?= $fire['song'] ?></td>
                    <td style="max-width:50px"><?= $fire['songs'] ?></td>
                  </tr>
                <?php } ?>
                </tbody>
          </table>
      </div>
    </div>
</body>


</html>
