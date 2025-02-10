<div class="foodCard">
  <a href="<?php the_permalink(); ?>">
    <span class="foodCard_label">オススメ</span>
    <div class="foodCard_pic">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
      <?php else: ?>
        <img src="<?= get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="">
      <?php endif; ?>
    </div>
    <div class="foodCard_body">
      <h4 class="foodCard_title"><?php the_title(); ?></h4>
      <p class="foodCard_price">¥650</p>
    </div>
  </a>
</div>