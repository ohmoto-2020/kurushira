<template>
  <div>
    <button
      type="button"
      class="btn heart shadow-none"
    >
      <i class="far fa-heart mr-1" :class="{'fas fa-heart mr-1 red-text':this.isLikedBy}"
      @click="clickLike"
      />
    </button>
   {{ countLikes }}
  </div>
</template>

<script>
// bladeに渡す
export default {
  props: {
    // いいねが押されているか
    initialIsLikedBy: {
      type: Boolean,
      default: false,
    },
    // いいねの数
    initialCountLikes: {
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
  // ここから処理が始まるイメージ
  data() {
    return {
      isLikedBy: this.initialIsLikedBy,
      countLikes: this.initialCountLikes,
    }
  },
  methods: {
    clickLike() {
      if (!this.authorized) {
        alert('通報機能はログイン中のみ使用できます')
        return
      }

      this.isLikedBy
        ? this.unlike()
        : this.like()
    },
    // async = awaitを使うためにつける
    async like() {
      // await = 処理が終わったら57行目以降を実行
      const response = await axios.put(this.endpoint)

      this.isLikedBy = true
      this.countLikes = response.data.countLikes
    },
    async unlike() {
      const response = await axios.delete(this.endpoint)

      this.isLikedBy = false
      this.countLikes = response.data.countLikes
    },
  },
}
</script>
