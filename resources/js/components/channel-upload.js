Vue.component('channel-uploads', {
  data () {
    return {
      selected: false
    }
  },
  methods: {
    upload: function () {
      this.selected = true

      var videos = this.$refs.videos.files
      console.log(videos);
    }
  },
})


