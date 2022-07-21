<!doctype html>
<html lang="ja">
 <?php include('header.inc.php'); ?>
<body>

  <!-- <div class="main" > -->
    <ul class="nav nav-pills nav-fill">
    <li class="nav-item">
      <a href="#search_setlists" class="nav-link active" data-toggle="tab">セトリ検索</a><!-- .nav-link -->
    </li><!-- .nav-item -->
    <li class="nav-item">
      <a href="#search_events" class="nav-link" data-toggle="tab">イベント検索</a><!-- .nav-link -->
    </li><!-- .nav-item -->
    <li class="nav-item">
      <a href="#search_songs" class="nav-link" data-toggle="tab">楽曲検索</a><!-- .nav-link -->
    </li><!-- .nav-item -->
    <li class="nav-item">
      <a href="#place_ranking" class="nav-link" data-toggle="tab">会場ランク</a><!-- .nav-link -->
    </li><!-- .nav-item -->

    
  </ul><!-- .nav nav-tabs -->

    <div id="container" class="tab-content" >
      <div id="search_setlists" class="tab-pane active">
        <iframe src="setlist_search.php"></iframe>
      </div><!-- .tab-pane -->
      <div id="search_events" class="tab-pane">
        <iframe src="event_search.php"></iframe>
      </div><!-- .tab-pane -->
      <div id="search_songs" class="tab-pane">
        <iframe src="song_search.php"></iframe>
      </div><!-- .tab-pane -->
      <div id="place_ranking" class="tab-pane">
        <iframe src="place_ranking.php"></iframe>
      </div><!-- .tab-pane -->
    </div><!-- .tab-content -->
  <!-- </div> -->

 <?php include('footer.inc.php'); ?>
</body>
</html>
