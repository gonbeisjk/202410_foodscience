<?php get_header(); ?>

<main>
  <section class="section section-foodList">
    <div class="section_inner">
      <div class="section_header">
        <h2 class="heading heading-primary"><span>フード紹介</span>FOOD</h2>
      </div>

      <section class="section_body">
        <h3 class="heading heading-secondary">お食事<span>MEAL</span></h3>
        <ul class="foodList">

          <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
              <li class="foodList_item">
                <?php get_template_part('template-parts/loop-food'); ?>
              </li>
            <?php endwhile; ?>
          <?php endif; ?>

        </ul>
      </section>

      <section class="section_body">
        <h3 class="heading heading-secondary">ドリンク<span>DRINK</span></h3>
        <ul class="foodList">
          <li class="foodList_item">
            <div class="foodCard">
              <a href="#">
                <div class="foodCard_pic">
                  <img src="assets/img/food/drink_img01@2x.png" alt="">
                </div>
                <div class="foodCard_body">
                  <h4 class="foodCard_title">ビール</h4>
                  <p class="foodCard_price">¥700</p>
                </div>
              </a>
            </div>
          </li>

          <li class="foodList_item">
            <div class="foodCard">
              <a href="#">
                <div class="foodCard_pic">
                  <img src="assets/img/food/drink_img02@2x.png" alt="">
                </div>
                <div class="foodCard_body">
                  <h4 class="foodCard_title">アイスコーヒー</h4>
                  <p class="foodCard_price">¥600</p>
                </div>
              </a>
            </div>
          </li>

          <li class="foodList_item">
            <div class="foodCard">
              <a href="#">
                <div class="foodCard_pic">
                  <img src="assets/img/food/drink_img03@2x.png" alt="">
                </div>
                <div class="foodCard_body">
                  <h4 class="foodCard_title">コーヒー</h4>
                  <p class="foodCard_price">¥500</p>
                </div>
              </a>
            </div>
          </li>
        </ul>
      </section>
    </div>
  </section>
</main>

<?php get_footer(); ?>