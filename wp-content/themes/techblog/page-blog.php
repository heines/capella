<!-- header -->
<html lang="ja">
<head>
  <?php get_header(); ?>
</head>
  <body>
    <canvas id="canvas"></canvas>
    <div class="mainbody">
      <div class="mainbox">
        <?php get_sidebar(); ?>
        <div class="contentsbox">
          <div class="highlight_report">
            <div class="new_report">
              <div class="tags">last update</div>
              <?php
                $number_recents_posts = 1;  // 必要な件数を指定します
                $recent_posts = wp_get_recent_posts( $number_recents_posts );
                foreach($recent_posts as $gpost){
                  $link_text =  get_permalink($gpost["ID"]);
                  $last_post_date = $gpost["post_date"];
                  $last_post_title = $gpost["post_title"];
                  echo '<div class="title">' . $last_post_date . '<br/>' . $last_post_title . '</div><a href="'. $link_text .'"></a>';
                } ?>
            </div>
            <div class="fixed_report">
              <div class="tags">fixed</div>
              <div class="title">日付<br/>タイトル</div><a href="test_report.html"></a>
            </div>
          </div>
          <div class="list_report">
            <ul class="container">
            <?php
              $number_recents_posts = 5;  // 必要な件数を指定します
              $number_recents_posts++;
              $i = 0;
              $recent_posts = wp_get_recent_posts( $number_recents_posts );
              foreach($recent_posts as $gpost){
                if($i <> 0){
                  $link_text =  '<li class="motion"><a href="' . get_permalink($gpost["ID"]) . '" title="Look '.$gpost["post_title"].'" >' . $gpost["post_date"] .' : ' . $gpost["post_title"].'</a></li> ';
                  echo $link_text;
                }
                $i++;
              } ?>
            </ul>

            <a href="#">more</a>
            <!--.
            <ul>
              <?php
                $args = array(
                'posts_per_page' => 5 // 表示件数の指定
                );
                $posts = get_posts( $args );
                foreach ( $posts as $post ): // ループの開始
                setup_postdata( $post ); // 記事データの取得
              ?>
              <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </li>
              <?php
                endforeach; // ループの終了
                wp_reset_postdata(); // 直前のクエリを復元する
              ?>
            </ul>

            -->
          </div>
        </div>
      </div>
    </div>
    <!-- footer -->
    <footer>
      <div class="tests"></div>
    </footer><?php get_footer(); ?>
  </body>
</html>
