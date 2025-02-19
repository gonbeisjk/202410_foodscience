<div class="foodCard foodCard-border">
  <a href="<?= $attributes['url']; ?>">
    <div class="foodCard_pic">
      <?php
      $pic = $attributes['pic'];
      if (!empty($pic)):
      ?>
        <img src="<?= $pic['url']; ?>" alt="">
      <?php else: ?>
        <img src="<?= get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="">
      <?php endif; ?>
    </div>
    <div class="foodCard_body">
      <h4 class="foodCard_title"><?= $attributes['name']; ?></h4>
      <p class="foodCard_price"><?= $attributes['price']; ?>円</p>
    </div>
  </a>
</div>