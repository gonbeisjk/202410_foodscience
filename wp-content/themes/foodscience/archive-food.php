<?php get_header(); ?>

<main>
  <section class="section section-foodList">
    <div class="section_inner">
      <div class="section_header">
        <h2 class="heading heading-primary"><span>フード紹介</span>FOOD</h2>
      </div>

      <?php
      $menu_terms = get_terms(['taxonomy' => 'menu']);
      ?>
      <?php if (!empty($menu_terms)): ?>
        <?php foreach ($menu_terms as $menu): ?>
          <section class="section_body">
            <h3 class="heading heading-secondary">
              <a href="<?= get_term_link($menu); ?>">
                <?= $menu->name ?>
              </a>
              <span><?= strtoupper($menu->slug); ?></span>
            </h3>
            <ul class="foodList">

              <?php
              // カスタムのクエリを作成
              $args = [
                'post_type' => 'food', //投稿タイプ「フード」を指定
                'posts_per_page' => -1, //全件取得する
                // 👇タクソノミー関連の指定
                'tax_query' => [
                  'relation' => 'AND', //(必須) 以下に指定する条件のすべてに合致したもの
                  // 1つ目の条件
                  [
                    'taxonomy' => 'menu', // タクソノミーのスラッグを指定
                    'field' => 'slug', // 検索するフィールド(スラッグ)を指定。他にはterm_id(ID), name(名前), slug(スラッグ)などが指定可能。
                    'terms' => $menu->slug,
                  ],
                ],
              ];
              $the_query = new WP_Query($args);
              ?>

              <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                  <li class="foodList_item">
                    <?php get_template_part('template-parts/loop-food'); ?>
                  </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); // $postの内容をメインクエリのものに戻す 
                ?>
              <?php endif; ?>

            </ul>
          </section>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>