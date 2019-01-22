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
          <?php $tag_name = single_cat_title("",false); ?>
          <p>カテゴリ「<?php echo $tag_name ?>」をもつページ</p>
          <div class="list_report">
            <ul class="container">
              <?php $original_query = $wp_query;
                $tag_all = get_terms( "post_tag", "fields=all&get=all" );
                foreach($tag_all as $value):
                ?>
                <?php $posts = get_posts('numberposts=-1&order=ASC&tag='.$value->slug); global $post;?>
                <?php foreach($posts as $post): ?>
                <?php $new_title = get_the_title();?>
                <li>
                  <?php echo "<a href='" . get_permalink() . "'>"; ?>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
                <?php endforeach; ?>
                <?php endforeach;
                $wp_query = $original_query;
                wp_reset_postdata(); ?>
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
