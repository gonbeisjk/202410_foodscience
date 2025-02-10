<?php
wp_enqueue_style(
  'fotorama',
  'https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css'
);
wp_enqueue_script(
  'fotorama',
  'https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js',
  ['jquery'] //このプラグインがjQuery依存しているので。
);
?>

<?php get_header(); ?>

<?php if (have_posts()): ?>
  <?php while (have_posts()): the_post(); ?>
    <main>
      <section class="section is-black">
        <div class="section_inner">
          <div class="section_header">
            <h2 class="heading heading-primary"><span>ギャラリー</span>GALLERY</h2>
          </div>
          <div class="fotorama">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/1.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/2.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/3.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/4.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/5.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/6.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/7.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/8.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/9.jpg">
            <img src="<?= get_template_directory_uri(); ?>/assets/img/gallery/10.jpg">
          </div>
        </div>
      </section>
    </main>
  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>