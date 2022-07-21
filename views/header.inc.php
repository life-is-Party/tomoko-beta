<?php 
?>

<head>
  <meta charset="UTF-8">
  
  <title>ハロプロセットリスト検索システム「ToMoKo」(β)</title>

    <meta name="keywords" content="ハロプロ,データベース,セットリスト金澤朋子,Juice=Juice" />
    <meta name="description" content="統一された網羅的で高機能なハロプロのセットリストデータベース" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="tomoko.ico">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/tomoko.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">
  

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <script>
<!-- テーブルソート -->
      $(document).ready(function() {
          $('#fav-table').tablesorter();
      });

      $(document).ready(function() {
          $('#fav-table2').tablesorter();
      });
</script>

   

<!-- <div style="padding:1% 3%;" > -->
<h5><a href = 'index.php' style ='text-decoration:none' id="title"><?php echo $title; ?></a></h5>
    <!-- </div> -->
</head>
