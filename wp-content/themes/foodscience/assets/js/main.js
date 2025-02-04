jQuery(function($) {
  /**
  * ハンバーガーメニュー
  */
  var $icon = $('.js-menu-icon');
  var $menu = $('.js-menu');
  var $nav = $('.nav');
  var isShow = false;
  $icon.on('click', function() {
    if (isShow === false) {
      $nav.height($(document).height());
      $icon.addClass('is-active');
      $menu.addClass('is-active');
      isShow = true;
    } else {
      $icon.removeClass('is-active');
      $menu.removeClass('is-active');
      isShow = false;
    }
  });

  //ページトップへ戻る
  var $pageTop = $(".js-toTop");
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $pageTop.fadeIn();
    } else {
      $pageTop.fadeOut();
    }
  });

  //スクロールに応じてヘッダーの背景色が変化
  $(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
      $(".header").addClass("is-active");
    } else {
      $(".header").removeClass("is-active");
    }
  });

  //IE11対応 sitcky
  if ($(".breadcrumb").length) {
    var elements = $(".breadcrumb");
    Stickyfill.add(elements);
  }
});
