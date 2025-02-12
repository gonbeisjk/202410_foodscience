<?php
$menu_slug = get_query_var('menu'); // お食事ページ: meal, ドリンクページ: drink
$menu = get_term_by('slug', $menu_slug, 'menu'); //WP_Term_Objectが取得できる
?>
<?php get_header(); ?>

<main>
  <section class="section section-foodList">
    <div class="section_inner">
      <div class="section_header">
        <h2 class="heading heading-primary"><span>フード紹介</span>FOOD</h2>
      </div>

      <section class="section_body">

        <h3 class="heading heading-secondary"><?php single_term_title(); ?><span><?= strtoupper($menu->slug); ?></span></h3>

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
    </div>
  </section>
</main>

<?php get_footer(); ?>