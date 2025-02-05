<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <!-- get_template_directory_uri:
      テーマのディレクトリまでのURLを自動で書いてくれる
      これさえ記述しておけば、パスが迷子にならない
  -->


  <!-- 下のphpのwp_enqueue_styleで処理してるので、
  htmlでの以下のlinkタグ3つは不要になる
-->
  <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri(); 
                                    ?>/assets/css/app.css" type="text/css" /> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> -->

  <?php
  //('名前','リンクまたはパス')
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css');
  wp_enqueue_style('google-web-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
  wp_enqueue_style('food-science-app', get_template_directory_uri() . '/assets/css/app.css');
  ?>


  <!-- 下のphpのwp_enqueue_scriptで処理してるので、
        htmlでの以下のscriptタグ二つは不要になる
  -->
  <!-- <script type="text/JavaScript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script> -->
  <!-- <script type="text/JavaScript" src="<?php //echo get_template_directory_uri(); 
                                            ?>/assets/js/main.js"></script> -->

  <!-- テンプレートタグ -->
  <!-- Wordpressちゃんが用意してくれている関数（命令）
      テンプレートファイル(Wordpressでサイトを運用する
      ための、基本のページ達)を作る時に使う 
  -->
  <!-- この子はWordpressでサイトタイトルに指定した言葉
      を呼び出すための関数↓
   -->
  <!-- <title><?php //bloginfo('name'); 
              ?></title> -->
  <!-- ↑今回はfunction.phpに自動生成するコードがあるので、書かなくてもOK！ -->


  <!-- wp_enqueue_script('jquery'):読み込むjQueryは
    Wordpressが用意したものを一回読み込むだけでいいよ、
    の意と思っていい -->
  <?php
  wp_enqueue_script('jquery');
  //('名前','リンクまたはパス')
  wp_enqueue_script('food-science-main', get_template_directory_uri() . '/assets/js/main.js');
  ?>
  <!-- wp_head:Wordpressを使うサイトではheadの閉じタグ
   の直上に、この一言を必ず書きましょう↓　-->
  <?php wp_head(); ?>
</head>

<!-- body_class:bodyタグに、閲覧している人の状況に
    あわせたクラスを自動的に作ってくれる
 -->

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <!-- ↑bodyタグの下の部分に何かを挿入するプログラム
        のための目印のようなもの。記述は任意 
    -->
  <header class="header">
    <div class="header_logo">
      <!-- home_url:トップページへのURLを自動的に
          生成する。いちいち「このページから見て階層
          が上だから../を何個使って……」とか考える必要
          なし！パスの書き直しの必要もなく便利～～↓ 
      -->
      <h1 class="logo"><a href="<?php echo home_url(); ?>">FOOD SCIENCE<span><?php bloginfo('description'); ?></span></a></h1>
      <!-- description:詳細説明や描写を意味する英単語
       このテンプレートタグでは、Wordpress側で、
       「キャッチフレーズ」 に登録した言葉を呼び出せる
      -->
    </div>

    <div class="header_nav">
      <div class="header_menu js-menu-icon"><span></span></div>
      <div class="gnav js-menu">
        <?php
        $args = [
          'container' => '', //falseでもOK
          'menu_class' => '', //ナビゲーション自体のクラス名
          'menu' => 'global-navigation', //呼び出すメニューの名前（管理画面で設定したメニュー名）
        ];
        wp_nav_menu($args);
        ?>

        <div class="header_info">
          <form class="header_search">
            <input type="text" aria-label="Search">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>

          <div class="header_contact">
            <div class="header_time">
              <dl>
                <dt>OPEN</dt>
                <dd>09:00〜21:00</dd>
              </dl>
              <dl>
                <dt>CLOSED</dt>
                <dd>Tuesday</dd>
              </dl>
            </div>
            <p>
              <a href="#"><i class="fa-solid fa-envelope"></i><span>ご予約・お問い合わせ</span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </header>