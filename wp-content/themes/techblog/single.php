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
        <div class="reportbox">
          <div class="neighbors">
           <?php next_post_link('%link','< next'); ?><?php previous_post_link('%link','prew >'); ?>
          </div>
          <section>
            <div class="titleheader">
              <?php if(have_posts()): while(have_posts()):the_post(); ?>

              <h1><?php the_title(); ?></h1>

              <p class="timestump"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></p>
              <p>category：
                <?php
                  the_category(', ');
                  if ( get_the_tag_list() ) {
                      echo get_the_tag_list( ' / tag：', ', ', '' );
                  }
                ?>
              </p>
            </div>
            <div class="report">
              <?php the_content('Read more'); ?>
            </div>
          </section>
        <?php endwhile; endif; ?>
      </div>
    </div>
    <!-- footer -->
    <footer>
      <div class="tests"></div>
    </footer><?php get_footer(); ?>
  </body >
</html>
