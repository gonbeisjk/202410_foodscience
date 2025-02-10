<?php
// -----<title>タグを出力する-----
add_theme_support('title-tag');
// -----アイキャッチ画像を使用可能にする-----
add_theme_support('post-thumbnails');

// -----title内のセパレータを「|」に変更する-----

// title内のセパレータをen-dashにしている、
// document_title_separatorというフィルターの関数を
// 自分自身で作る関数、my_document_title_separatorに
// 変える
add_filter('document_title_separator', 'my_document_title_separator');
// 関数my_document_title_separatorの処理を定義
function my_document_title_separator($separator)
{
  // separatorという変数の中身を「|」に定義
  $separator = '|';
  return $separator;
}


// 今井、ひそかにfunctions.phpをfunction.phpという名前
// で間違って記述したために、このファイルの処理が実行さ
// れていませんでした……皆さんもお気をつけ下さい汗


/**
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support('menus');

/**
 * Contact Form 7の時には整形機能をOFFにする
 */
add_filter('wpcf7_autop_or_not', 'my_wpcf7_autop');
function my_wpcf7_autop()
{
  return false;
}


/**
 * ショートコードのサンプル
 */
function my_shortcode_sample($attr)
{
  // デフォルトの値を設定する。上書きも行う。
  // 1: デフォルト値, 2: 上書きする値
  $options = shortcode_atts([
    'abc' => 'abcのデフォルト値',
    'xyz' => 'xyzのデフォルト値',
  ], $attr);

  // var_dump($attr);
  return "<div>{$options['abc']} ショートコードのサンプルです。{$options['xyz']}</div>";
}
add_shortcode('my_shortcode', 'my_shortcode_sample'); //1: ショートコード名, 2: 関数名

/**
 * メインクエリを変更する
 */
// 1: アクションフック名, 2: フックに使う関数名
add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts($query)
{
  // 管理画面、メインクエリ以外はクエリの内容を書き換えない
  if (is_admin() || !$query->is_main_query()) {
    return; //処理をここでストップ
  }

  // トップページの場合、取得する投稿数を3件にする
  if ($query->is_home()) {
    $query->set('posts_per_page', 3);
    return;
  }
}


/**
 * タイトルの「保護中」の文字を削除する
 */
add_filter('protected_title_format', 'my_protected_title');
// $titleには「保護中: %s」という文字が代入されている
function my_protected_title($title)
{
  return '%s';
}


/**
 * パスワード保護フォームをカスタマイズする
 */
add_filter('the_password_form', 'my_password_form');
function my_password_form()
{
  // 自動整形機能をOFFにする(brタグがインライン要素の後に自動追加されるのを防ぐ)
  remove_filter('the_content', 'wpautop');

  // ログインページのURLを取得 http://****/wp-login.php
  $wp_login_url = wp_login_url();

  // パスワード入力フォームを作成
  // 【重要】formのaction属性、入力欄のname属性はオリジナルに合わせる
  // 文字列の書き方にHeredoc（複数行、変数に対応した書き方）を使用。ダブルクォーテーションと同じ働きをする。
  $html = <<<HTML
  <p>パスワードを入力してください。</p>
  <form class="post-password-form" action="{$wp_login_url}?action=postpass" method="post">
    <input type="password" name="post_password">
    <input type="submit" value="送信" name="送信">
  </form>
HTML;

  return $html;
}
