let app = Vue.createApp({
  data() {
    return {
      isHidden: true,
    }
  },
  // mounted() {
  //   axios
  //     .get('https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=46f6fcbfc14d4f29848b3359f2150592')
  //     .then(response => (this.data = response))
  //     .catch(error => console.log(error))

  // },
  computed: {
    toggleText() {
      let toggleText = "Read more";
      if (this.isHidden == false) {
        toggleText = "Close";
      }
      return toggleText;
    },
  },
  methods: {
    readMore(event) {


    },

  },
})
app.mount("#app-root");