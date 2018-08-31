<!-- header -->
<html lang="ja">
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="/wp/wp-content/themes/techblog/style.css"/>
    <?php get_header(); ?>
  </head>
  <body>
    <canvas id="canvas"></canvas>
    <div class="mainbody">
      <div class="mainbox">
        <div class="menubox">
          <div class="symbol">
            <div class="iconbox"><a class="shobo" href="/"><span class="def_s">´・ω・`</span><span class="hov_s">´＞ω＜`</span></a></div>
            <div class="title"><a href="/">slumber</a></div>
          </div>
          <div class="listbox">
            <ul>
              <li><a href="about">about</a></li>
              <li class="now"><a href="blog">blog</a></li>
              <li><a href="p_portfolio.html">portfolio</a></li>
              <li><a href="p_contact.html">contact</a></li>
            </ul>
          </div>
        </div>
        <div class="reportbox">
          <section>
            <div class="titleheader">
          <?php if(have_posts()): while(have_posts()):the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <p class="timestump"><time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y.m.d'); ?></time></p>
            <p><a href="#">タグ</a></p>
            </div>
            <div class="report">
              <?php the_content('Read more'); ?>
            </div>
            </section>
          <?php endwhile; endif; ?>

          <?php previous_post_link('%link','prew'); ?>
          <?php next_post_link('%link','next'); ?>

      </div>
    </div>
    <!-- footer -->
    <footer>
      <div class="tests"></div>
    </footer><?php get_footer(); ?>
  </body>
</html>
