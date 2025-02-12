<?php get_header(); ?>

<main>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

      <section class="section">
        <div class="section_inner">

          <div class="food">
            <div class="food_body">
              <div class="food_text">
                <h2 class="heading heading-primary"><?php the_title(); ?></h2>
                <div class="food_content">
                  <?php the_content(); ?>
                </div>
              </div>
              <div class="food_pic">
                <?php if (get_field('recommend')): ?>
                  <span class="food_label">オススメ</span>
                <?php endif; ?>

                <?php
                $pic = get_field('pic');
                $pic_url = $pic['sizes']['large'];
                ?>
                <img src="<?= $pic_url; ?>" alt="">
              </div>
            </div>

            <ul class="food_list">
              <li class="food_item">
                <span class="food_itemLabel">価格</span>
                <span class="food_itemData"><?php the_field('price'); ?>円</span>
              </li>
              <li class="food_item">
                <span class="food_itemLabel">カロリー</span>
                <span class="food_itemData"><?= number_format(get_field('calorie')); ?> kcal</span>
              </li>
              <li class="food_item">
                <span class="food_itemLabel">アレルギー</span>
                <span class="food_itemData">
                  <?php
                  $allergies = get_field('allergies'); //配列を取得
                  foreach ($allergies as $key => $allergy) {
                    echo $allergy;

                    // 現在処理中のデータが最後のデータかどうか調べる。途中の場合は「、」を入れる
                    // end関数は配列の最後のデータにアクセスする
                    if ($allergy !== end($allergies)) {
                      echo '、';
                    }
                  }

                  // 講師バージョン
                  // implode関数は第2引数にある配列から1つずつデータを取り出して、第１引数の区切り文字で連結する。返り値は文字列。
                  // echo implode('、', $allergies);
                  ?>
                </span>
              </li>
            </ul>
          </div>

        </div>
      </section>

      <section class="section">
        <div class="section_inner">

          <h3 class="heading heading-secondary">Tacos<span>タコス</span></h3>

          <ul class="foodList">
            <li class="foodList_item">
              <div class="foodCard">
                <a href="#">
                  <span class="foodCard_label">オススメ</span>
                  <div class="foodCard_pic">
                    <img src="assets/img/food/food_img01@2x.png" alt="">
                  </div>
                  <div class="foodCard_body">
                    <h4 class="foodCard_title">タコス</h4>
                    <p class="foodCard_price">¥650</p>
                  </div>
                </a>
              </div>
            </li>

            <li class="foodList_item">
              <div class="foodCard">
                <a href="#">
                  <span class="foodCard_label">オススメ</span>
                  <div class="foodCard_pic">
                    <img src="assets/img/food/food_img02@2x.png" alt="">
                  </div>
                  <div class="foodCard_body">
                    <h4 class="foodCard_title">タコス</h4>
                    <p class="foodCard_price">¥650</p>
                  </div>
                </a>
              </div>
            </li>

            <li class="foodList_item">
              <div class="foodCard">
                <a href="#">
                  <div class="foodCard_pic">
                    <img src="assets/img/food/food_img03@2x.png" alt="">
                  </div>
                  <div class="foodCard_body">
                    <h4 class="foodCard_title">タコス</h4>
                    <p class="foodCard_price">¥650</p>
                  </div>
                </a>
              </div>
            </li>

            <li class="foodList_item">
              <div class="foodCard">
                <a href="#">
                  <div class="foodCard_pic">
                    <img src="assets/img/food/food_img04@2x.png" alt="">
                  </div>
                  <div class="foodCard_body">
                    <h4 class="foodCard_title">タコス</h4>
                    <p class="foodCard_price">¥650</p>
                  </div>
                </a>
              </div>
            </li>

            <li class="foodList_item">
              <div class="foodCard">
                <a href="#">
                  <div class="foodCard_pic">
                    <img src="assets/img/food/food_img05@2x.png" alt="">
                  </div>
                  <div class="foodCard_body">
                    <h4 class="foodCard_title">タコス</h4>
                    <p class="foodCard_price">¥650</p>
                  </div>
                </a>
              </div>
            </li>

            <li class="foodList_item">
              <div class="foodCard">
                <a href="#">
                  <div class="foodCard_pic">
                    <img src="assets/img/food/food_img06@2x.png" alt="">
                  </div>
                  <div class="foodCard_body">
                    <h4 class="foodCard_title">タコス</h4>
                    <p class="foodCard_price">¥650</p>
                  </div>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </section>

    <?php endwhile; ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>