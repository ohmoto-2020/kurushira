//Swiper用のクラス指定
var mySwiper = new Swiper('.swiper-container', {
  // カスタマイズ用、追加オプション
  //direction: 'vertical',//←スライド方向のオプション
  loop: true,//←ループオプション

  // ページネーション用のクラス指定
  pagination: {
    el: '.swiper-pagination',
  },

  //ナビゲーション用のクラス指定
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
})
