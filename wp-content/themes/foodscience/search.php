<?php get_header(); ?>

<main>
  <section class="section">
    <div class="section_inner">
      <div class="section_header">
        <h1 class="heading heading-primary"><span>サイト内検索</span>SEARCH</h1>
      </div>

      <div class="section_body">
        <?php if (have_posts()): ?>
          <div class="section_desc">
            <p><i class="fas fa-search"></i> 検索ワード「<?php the_search_query(); ?>」</p>
          </div>

          <div class="cardList">

            <?php while (have_posts()): the_post(); ?>

              <?php get_template_part('template-parts/loop-news'); ?>

            <?php endwhile; ?>

          </div>
        <?php else: ?>
          <div class="section_desc">
            <p>検索結果はありませんでした</p>
          </div>
        <?php endif; ?>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>