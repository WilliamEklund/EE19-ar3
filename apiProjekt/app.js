let app = Vue.createApp({
  data() {
    return {
      id: '123',
      isHidden: true,
    }
  },
  // mounted() {
  //   axios
  //     .get('https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=46f6fcbfc14d4f29848b3359f2150592')
  //     .then(response => (this.data = response))
  //     .catch(error => console.log(error))

  // },
  created() {
    console.log(document.querySelector('.read-more'));
  },
  computed: {
    toggleText() {
      let toggleText = "Visa mer";
      if (this.isHidden == false) {
        toggleText = "Visa mindre";
      }
      return toggleText;
    },
  },
  methods: {
    readMore(id) {
      console.log(id);
      // let index = key++;
      // console.log(index);
    },

  },
})
app.mount("#app-root");