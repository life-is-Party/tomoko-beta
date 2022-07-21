<head>
  <meta charset="UTF-8">
  <title>ハロプロセットリスト検索システム「ToMoKo」(β)</title>

    <meta name="keywords" content="ハロプロ,データベース,セットリスト金澤朋子,Juice=Juice" />
    <meta name="description" content="統一された網羅的で高機能なハロプロのセットリストデータベース" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <meta name="robots" content="noindex"> -->

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnifying_glass.css">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/css/theme.default.min.css">


<!-- mysql 接続データ -->
<?php

error_reporting(0);

$host="localhost";
$dbname='test';
$user='root';
$pass='root';
?>


<!-- テーブルソート -->
    <script>
      $(document).ready(function() {
          $('#fav-table').tablesorter();
      });
    </script>

<!-- 全選択ボタン -->
<script>
    $(function(){

    var checkAll = '#checkAll'; //「すべて」のチェックボックスのidを指定
    var checkBox = 'input[name="evetype[]"]'; //チェックボックスのnameを指定

    $( checkAll ).on('click', function() {
      $( checkBox ).prop('checked', $(this).is(':checked') );
    });

    $( checkBox ).on( 'click', function() {
      var boxCount = $( checkBox ).length; //全チェックボックスの数を取得
      var checked  = $( checkBox + ':checked' ).length; //チェックされているチェックボックスの数を取得
      if( checked === boxCount ) {
        $( checkAll ).prop( 'checked', true );
      } else {
        $( checkAll ).prop( 'checked', false );
      }
    });
  });
</script>


<style type="text/css">
		html{height: 100%;
    }
      body {
			height:100%;
      margin: 0;
      padding:0;
    }


    #container{
              height: 100%;
              padding:0;
            }
            #search_setlists,#search_events,#search_songs,#drop{
                height: 100%;
                padding:0;
  			}
  			iframe {
  				width: 100%;
  				height: 100%;
  				border:0;

  			}
        th {
          min-width:70px;
          }
          #mm100{
            min-width:100px;
            }

.textaline{
    max-width:40%;
  }
  #dotframe {
  max-width:450px;
  padding: 5px; 
  margin-bottom: 5px; 
  border: 1px 
  dashed #333333;
}

#search{
  width:200px;
  background: #dc143c;
  color:#fff;
  margin:5px;
  border:0px;
  border-radius:5px;
}

</style>

<h4><a href = 'index.php' style ='text-decoration:none'><?php echo $title; ?></a></h4>
</head>
