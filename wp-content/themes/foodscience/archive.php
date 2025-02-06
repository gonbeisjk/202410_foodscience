<?php get_header(); ?>

<main>
  <section class="section">
    <div class="section_inner">
      <div class="section_header">
        <!-- wp_title():ページのタイトルを取得して
           表示()内に''を入れると、自動的に出力される
           区切り文字≫を消すことができる
           -->
        <h1 class="heading heading-primary"><span>最新情報</span>News - <?php wp_title(''); ?>
          <!-- もし年別アーカイブなら、タイトルの末尾に「年」と表示 -->
          <?php if (is_year()) : ?>年<?php endif ?>
        </h1>
      </div>

      <div class="archive">
        <div class="archive_category">
          <h2 class="archive_title">カテゴリー</h2>
          <ul class="archive_list">
            <?php
            //wp_list_categories()で出てきてしまう見出しを消す
            //変数$args内の、title_liという要素を空に  
            $args = ['title_li' => '',];
            //カテゴリー毎の一覧ページへのリンクを取得してliタグとして表示   
            wp_list_categories($args);
            ?>
          </ul>
        </div>

        <div class="archive_yearly">
          <h2 class="archive_title">年別</h2>
          <ul class="archive_list">
            <?php
            // 初期値では月別のため、年別にする
            $args = ['type' => 'yearly',];
            wp_get_archives($args);
            ?>
          </ul>
        </div>
      </div>

      <div class="section_body">

        <div class="cardList">

          <!-- 記事がある限り、記事のデータを元に以下の処理を繰り返す -->
          <?php while (have_posts()) : the_post(); ?>

            <!-- template-parts内のloop-news.phpの内容を取得して表示 -->
            <?php get_template_part('template-parts/loop-news'); ?>

          <?php endwhile; ?><!-- 繰り返し一セット分の内容記述終わり -->

        </div>

        <?php if (function_exists('wp_pagenavi')): ?>
          <div class="pagination">
            <?php wp_pagenavi(); ?>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </section>
</main>


<?php get_footer(); ?>