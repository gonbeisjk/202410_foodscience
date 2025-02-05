<footer class="footer">
  <div class="footer_inner">
    <div class="footer_info">
      <div class="footer_logo">
        <h3 class="logo logo-white"><a href="">FOOD SCIENCE<span>メキシカン・レストラン</span></a></h3>
      </div>
      <div class="footer_text">
        <p>〒162-0846 東京都新宿区市谷左内町21-13</p>
      </div>
    </div>
    <section class="footer_sns">
      <h3>SHARE ON</h3>
      <?php
      $args = [
        'menu' => 'footer-sns',
        'menu_class' => '',
        'container' => '',
      ];
      wp_nav_menu($args);
      ?>
    </section>
    <div class="footer_copyright">
      <small>&copy; FOOD SCIENCE All rights reserved.</small>
    </div>
  </div>
</footer>

<div class="pageTop js-toTop">
  <a href="#"><i class="fas fa-arrow-up"></i><span>TOP PAGE</span></a>
</div>

<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script type="text/JavaScript" src="<?php //echo get_template_directory_uri(); 
                                      ?>/assets/js/home.js"></script> -->
<!-- ↓下記に置き換え -->
<?php
if (is_home()) {
  wp_enqueue_style('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
  wp_enqueue_script('slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js');
  wp_enqueue_script('food-science-home', get_template_directory_uri() . '/assets/js/home.js');
}
?>

<!-- wp_header同様、Wordpressを使うサイトでは、
        bodyの閉じタグの直上にこの一言を必ず書きます
        ↓
  -->
<?php wp_footer(); ?>
</body>

</html>