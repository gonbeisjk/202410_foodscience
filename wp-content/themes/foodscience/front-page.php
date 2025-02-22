<?php get_header(); ?>
<!-- ↑コードの頭の、全ページ共通の部分をheader.phpに
    入れておいて、この一言だけで読み込める！
    htmlタグやbodyタグの開始タグがなくなって一瞬ビビり
    ますが、ブラウザで読み込まれるときは、header.phpに
    入れたコードがこの一言によって出てきているので、
    エラーは起きません。
    header.phpの記述を一回変更するだけで、この一言が
    書かれている全てのページの頭部分が書き換わります
    便利～～
-->

<!-- もしページがトップページだったら、 -->
<?php if (is_home()): ?>
  <!-- 以下の HTMLを読み込む -->
  <section class="kv">
    <div class="kv_inner">
      <h1 class="kv_title">FOOD SCIENCE<br>TOKYO</h1>
      <p class="kv_subtitle">FROM JAPAN</p>
    </div>

    <?php
    $args = [
      'post_type' => 'main-visual',
      'posts_per_page' => -1,

      // カスタムフィールドの条件を指定する
      'meta_query' => [
        // 3つの条件のいずれかに合致したものを取得
        // 条件1: 公開終了日が未来のもの
        // 条件2: 公開終了日が空（設定されていない）のもの
        // 条件3: 公開終了日が存在しない
        'relation' => 'OR',

        // 条件1
        [
          'key' => 'end_date', // 公開終了日時
          'type' => 'DATETIME',
          'compare' => '>',
          'value' => date('Y-m-d H:i:s'), // 現在の日時
        ],

        // 条件2
        [
          'key' => 'end_date',
          'value' => '', // 空
          // 'compare' => '=', //デフォルトは「=」(〜と等しい)
          // 'type' => 'CHAR', //デフォルトは「CHAR」(文字列)
        ],

        // 条件3
        [
          'key' => 'end_date',
          'compare' => 'NOT EXISTS', // 存在しない
        ]
      ],
    ];
    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()): ?>
      <div class="kv_slider js-slider">
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <?php
          $pic = get_field('pic');
          ?>
          <div class="kv_sliderItem" style="background-image: url('<?= $pic['url']; ?>');"></div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    <?php endif; ?>

    <div class="kv_overlay"></div>

    <div class="kv_scroll">
      <a href="#concept" class="kv_scrollLink">
        <p>SCROLL DOWN</p>
        <div class="kv_scrollIcon"><i class="fa-solid fa-chevron-down"></i></div>
      </a>
    </div>
  </section>
<?php endif; ?><!-- if文修了 -->


<section class="section section-concept" id="concept">
  <div class="section_inner">
    <div class="section_headerWrapper">
      <header class="section_header">
        <h2 class="heading heading-primary"><span>コンセプト</span>CONCEPT</h2>
      </header>
      <div class="section_pic">
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/concept_img01@2x.png" alt=""></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/concept_img02@2x.png" alt=""></div>
        <div><img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/concept_img03@2x.png" alt=""></div>
      </div>
    </div>
    <div class="section_body">
      <p>
        ご提供するメキシコ料理は、当店の店主が修行したローカルフードを中心にした、ご家族でも楽しめる、美味しいメキシカンです。<br>
        スパイシーでヘルシーな本場の味をお楽しみ下さい。
      </p>
      <div class="section_btn">
        <a href="<?= get_permalink(6); ?>" class="btn btn-more">もっと見る</a>
      </div>
    </div>
  </div>
</section>

<!-- ループ文開始 -->
<!-- もし、記事の投稿があったら…… -->
<?php if (have_posts()) : ?>
  <section class="section">
    <div class="section_inner">
      <header class="section_header">
        <h2 class="heading heading-primary"><span>最新情報</span>NEWS</h2>
        <?php
        // 1. 「お知らせ」カテゴリーのデータ（オブジェクト）を取得する
        $news = get_term_by('slug', 'news', 'category');

        // 2. そのデータ（オブジェクト）を元に、「お知らせ」カテゴリーのリンクを取得する
        $news_link = get_term_link($news, 'category');
        ?>

        <div class="section_headerBtn"><a href="<?= $news_link; ?>" class="btn btn-more">もっと見る</a></div>
      </header>
      <div class="section_body">
        <div class="cardList cardList-1row">

          <!-- 記事がある限り、記事のデータを元に以下の処理を繰り返す -->
          <?php while (have_posts()) : the_post(); ?>
            <!-- the_ID()：その記事のID番号を取得して出力
              id属性を付帯する関数ではないので注意！id=""は自分で書こう
              またid名は数字始まりNG!というわけで、今回は出力される番号
              の前にpost-という文字列を入れて有効な属性値にしています
          -->
            <!-- post_class(); タグに記事に応じたクラス名を付帯してくれる
              自分で用意したクラス名も併記してもらうには()内に記述 
          -->

            <!-- template-parts内のloop-news.phpの内容
          を取得して表示 -->
            <?php get_template_part('template-parts/loop-news'); ?>

          <?php endwhile; ?><!-- 繰り返し一セット分の内容記述終わり -->

        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- ループ文終了 ここまでの処理を行うよ-->


<section class="section section-info">
  <div class="section_inner">
    <div class="section_content">
      <header>
        <h2 class="heading heading-primary"><span>インフォメーション</span>INFORMATION</h2>
      </header>

      <ul class="infoList">
        <li class="infoList_item">
          <span class="infoList_prepend">営業時間</span>
          <span class="infoList_num">09:00〜21:00</span><span class="infoList_time">(LO 20:00)</span>
          <span class="infoList_append">店休日：火曜日</span>
        </li>
        <li class="infoList_item">
          <span class="infoList_prepend">お電話でのお問い合わせ</span>
          <span class="infoList_num">03-0000-0123</span>
        </li>
        <li class="infoList_item">
          <span class="infoList_prepend">メールでのお問い合わせ</span>
          <div class="infoList_btn">
            <a href="<?= home_url('/contact/'); ?>" class="btn btn-primary">お問い合わせ</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="section_pic">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/info_img01@2x.png" alt="">
    </div>
  </div>
</section>


<section class="section section-access">
  <div class="section_inner">
    <div class="section_content">
      <header class="section_header">
        <h2 class="heading heading-secondary">アクセス</h2>
      </header>
      <div class="section_body">
        <p>〒162-0846 東京都新宿区市谷左内町21-13</p>
        <div class="section_btn">
          <a href="<?= get_permalink(13); ?>" class="btn btn-primary">アクセスはこちら</a>
        </div>
      </div>
    </div>
    <div class="section_pic">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/access_img01@2x.png" alt="">
    </div>
  </div>
</section>

<?php get_footer(); ?>
<!-- ↑get_header同様、footer.phpに入れた内容を
    呼び出せる呪文となっています。 ここに閉じタグ
    が含まれているのでエラーは起きません。
    中々ダイナミックな魔法の呪文ですね
-->