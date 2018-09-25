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
          <?php $tag_name = single_tag_title("",false); ?>
          <p>タグ「<?php echo $tag_name ?>」をもつページ</p>
          <div class="list_report">
<!--            <ul class="container"> -->
            <ul>
            <?php
            $tags = array(6);
            for ($i=0; $i<count($tags); $i++) :
            ?>
            <h3><?php $tag_term = get_term( $tags[$i], 'post_tag' );echo $tag_term->name; ?></h3>
            <ul>
            <?php
            query_posts('showposts=10&amp;tag_id='.$tags[$i]);
            if (have_posts()) : while (have_posts()) : the_post();
            ?>
            <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
            </ul>
            <?php else: ?>
            <li><?php $tag_term = get_term( $tags[$i], 'post_tag' );echo $tag_term->name; ?></li>
            </ul>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            <?php endfor; ?>
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
