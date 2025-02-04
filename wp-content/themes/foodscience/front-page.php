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
  <?php if ( is_home() ): ?>
    <!-- 以下の HTMLを読み込む -->
    <section class="kv">
      <div class="kv_inner">
        <h1 class="kv_title">FOOD SCIENCE<br>TOKYO</h1>
        <p class="kv_subtitle">FROM JAPAN</p>
      </div>

      <div class="kv_slider js-slider">
        <div class="kv_sliderItem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/kv-01@2x.jpg');"></div>
        <div class="kv_sliderItem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/kv-02@2x.jpg');"></div>
        <div class="kv_sliderItem" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/home/kv-03@2x.jpg');"></div>
      </div>
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
          <a href="" class="btn btn-more">もっと見る</a>
        </div>
      </div>
    </div>
  </section>

<!-- ループ文開始 -->
<!-- もし、記事の投稿があったら…… -->
<?php if ( have_posts() ) : ?>
  <section class="section">
    <div class="section_inner">
      <header class="section_header">
        <h2 class="heading heading-primary"><span>最新情報</span>NEWS</h2>
        <div class="section_headerBtn"><a href="" class="btn btn-more">もっと見る</a></div>
      </header>
      <div class="section_body">
        <div class="cardList cardList-1row">

        <!-- 記事がある限り、記事のデータを元に以下の処理を繰り返す -->
        <?php while ( have_posts() ) : the_post(); ?>
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
              <a href="" class="btn btn-primary">お問い合わせ</a>
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
            <a href="#" class="btn btn-primary">アクセスはこちら</a>
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