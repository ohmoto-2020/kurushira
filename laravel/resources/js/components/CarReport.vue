<template>
  <div>
    <button
      type="button"
      class="btn report shadow-none"
    >
    <p :class="{'report-on':this.isReportedBy}" @click="clickReport">通報</p>
    </button>
    <!-- {{ countReports }} -->
  </div>
</template>

<script>
export default {
  props: {
    initialIsReportedBy: {
      type: Boolean,
      default: false,
    },
    initialCountReports: {
      type: Number,
      default: 0,
    },
    authorized: {
      type: Boolean,
      default: false,
    },
    endpoint: {
      type: String,
    },
  },
  mounted:function() {
  //Swiper用のクラス指定
    var mySwiper = new Swiper('.swiper-container', {
      // カスタマイズ用、追加オプション
      //direction: 'vertical',//←スライド方向のオプション

      // ページネーション用のクラス指定
      pagination: {
        el: '.swiper-pagination',
      },

      //ナビゲーション用のクラス指定
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });
  },
  data() {
    return {
      isReportedBy: this.initialIsReportedBy,
      countReports: this.initialCountReports,
    }
  },
  methods: {
    clickReport() {
      if (!this.authorized) {
        alert('いいね機能はログイン中のみ使用できます')
        return
      }

      this.isReportedBy
        ? this.unreport()
        : this.report()
    },
    async report() {
      const response = await axios.put(this.endpoint)

      this.isReportedBy = true
      this.countReports = response.data.countReports
    },
    async unreport() {
      const response = await axios.delete(this.endpoint)

      this.isReportedBy = false
      this.countReports = response.data.countReports
    },
  },
}
</script>
