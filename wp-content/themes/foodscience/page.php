<?php get_header(); ?>

<?php if (have_posts()): ?>
  <?php while (have_posts()): the_post(); ?>
    <main <?php if (wp_theme_has_theme_json()): ?>class="is-full" <?php endif; ?>>
      <section class="section">
        <div class="section_inner">
          <div class="section_header">
            <h2 class="heading heading-primary"><span><?php the_title(); ?></span><?= $post->post_name; ?></h2>
          </div>

          <div class="section_body">
            <div class="content">

              <?php the_content(); ?>

            </div>
          </div>
        </div>
      </section>
    </main>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>