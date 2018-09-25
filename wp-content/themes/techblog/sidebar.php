<?php
/*
Template Name: サイドバー
*/
?>

<div class="menubox">
  <div class="symbol">
    <div class="iconbox"><a class="shobo" href="/"><span class="def_s">´・ω・`</span><span class="hov_s">´＞ω＜`</span></a></div>
    <div class="title"><a href="/">slumber</a></div>
  </div>
  <div class="listbox">
    <ul>
      <li><a href="/index.php/about">about</a></li>
      <li><a href="/index.php/blog">blog</a></li>
      <li><a href="/index.php/portfolio">portfolio</a></li>
      <li><a href="/index.php/contact">contact</a></li>
      <!-- javascript -->
    </ul>
  </div>
  <?php if(is_home()) {
   } else {
  ?>
  <div class="tagcloud">
    <h4><?php _e( 'Categories:' ); ?></h4>
    <!-- TODO:直す -->
    <!-- <form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">-->
    <form class="cat_style" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
      <?php wp_dropdown_categories( 'show_count=1&hierarchical=1' ); ?>
      <input type="submit" name="submit" value="view" />
    </form>
    <h4><?php _e( 'Tag clouds:' ); ?></h4>
    <?php wp_tag_cloud( 'smallest=15&largest=40&number=50&orderby=count' ); }?>
  </div>
</div>
