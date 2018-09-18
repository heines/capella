<!-- header -->
<html lang="ja">
<head>
  <?php get_header(); ?>
</head>
  <body>
    <canvas id="canvas">
      <script type="text/javascript" src="/wp/wp-content/themes/techblog/bgwave.js"></script>
    </canvas>
    <div id="mainbody">
      <div class="mainbox">
        <?php get_sidebar(); ?>
        <div class="contentsbox">
          <?php $cat_name = single_cat_title("",false); ?>
          <p>カテゴリ「<?php echo $cat_name ?>」をもつページ</p>
          <div class="list_report">
            <ul class="container">
              <?php
                $args = array('category_name' => $cat_name);
                $cat_posts = get_posts($args);
                foreach ( $cat_posts as $post ): setup_postdata($post);
              ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_time('Y.m.d') ?>：<?php the_title(); ?></a></li>
              <?php endforeach; ?>
            </ul>
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
