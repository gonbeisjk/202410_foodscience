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
