<?php
/*
Template Name: コンテンツページ
*/
?>
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
        <div>
          <?php
          if(have_posts()): while(have_posts()): the_post();?>
          <h2><?php the_title(); ?></h2>
          <?php the_content(); ?>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
    <!-- footer -->
    <footer>
      <div class="tests"></div>
    </footer><?php get_footer(); ?>
  </body>
</html>
