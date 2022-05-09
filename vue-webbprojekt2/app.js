let app = Vue.createApp({
  data() {
    return {
      isBouncing: false,
      isHidden: true,
      cartAmount: 0,
      cartCounter: 1,
      hideNav: true,
      products: {
        ["Product 1"]: {
          name: "Product 1",
          label: "KONGSFJORD",
          category: "Kategori: Sängar",
          measure: "Mått: 180x200 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/kongsfjord-kontinentalsaeng-vagstranda-medium-fast-tustna-djuparp-moerkgra__0891293_pe782260_s5.jpg?',
          price: '4699 kr',
          total: "Antal: ",
        },
        ["Product 2"]: {
          name: "Product 2",
          label: "LOMMEDALEN",
          category: "Kategori: Sängar",
          measure: "Mått: 160x200 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/dunvik-kontinentalsaeng-vagstranda-medium-fast-tuddal-moerkgra__0860050_pe574693_s5.jpg?',
          price: '7300 kr',
          total: "Antal: ",
        },
        ["Product 3"]: {
          name: "Product 3",
          label: "DUNVIK",
          category: "Kategori: Sängar",
          measure: "Mått: 160x200 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/dunvik-kontinentalsaeng-valevag-medium-fast-tuddal-gunnared-beige__0945616_pe797752_s5.jpg?',
          price: '5999 kr',
          total: "Antal: ",
        },
        ["Product 4"]: {
          name: "Product 4",
          label: "KALLAX",
          category: "Kategori: Bokhyllor",
          measure: "Mått: 40x28x202 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/billy-bokhylla-vit__0625599_pe692385_s5.jpg?',
          price: '999 kr',
          total: "Antal: ",
        },
        ["Product 5"]: {
          name: "Product 5",
          label: "GERSBY",
          category: "Kategori: Bokhyllor",
          measure: "Mått: 60x180 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/billy-oxberg-bokhylla-med-doerrar-vit__0667847_pe714123_s5.jpg?',
          price: '1300 kr',
          total: "Antal: ",
        },
        ["Product 6"]: {
          name: "Product 6",
          label: "Billy",
          category: "Kategori: Bokhyllor",
          measure: "Mått: 40x28x106 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/billy-bokhylla-vit__0451902_pe600832_s5.jpg?',
          price: '3599 kr',
          total: "Antal: ",
        },
        ["Product 7"]: {
          name: "Product 7",
          label: "SYVDE",
          category: "Kategori: Garderob",
          measure: "Mått: 150x66x236 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/pax-tjoerhom-garderobskombination-vit__1080727_pe858169_s5.jpg?',
          price: '4300 kr',
          total: "Antal: ",
        },
        ["Product 8"]: {
          name: "Product 8",
          label: "PAX / MEHAMN",
          category: "Kategori: Garderob",
          measure: "Mått: 150x66x201 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/pax-garderob-vit-faervik-vitt-glas__0383261_pe557304_s5.jpg?',
          price: '5 900kr',
          total: "Antal: ",
        },
        ["Product 9"]: {
          name: "Product 9",
          label: "PAX / HOKKSUND",
          category: "Kategori: Garderob",
          measure: "Mått: 150x66x236 cm",
          imgURL: 'https://www.ikea.com/se/sv/images/products/pax-hokksund-garderob-vit-hoegglans-ljusgra__1103777_pe867381_s5.jpg?',
          price: '7 900kr',
          total: "Antal: ",
        },
      },
      cart: {},
      LOCAL_STORAGE_KEY_CART: 'app.Cart',
      lcCart: {},
    }
  },
  computed: {
    totalPrice() {
      totalPrice = 0;
      for (product in this.cart) {
        console.log(product);
        totalPrice += this.cart[product].price;
      }
      return totalPrice;
    },
  },
  created() {
    this.lcCart = JSON.parse(localStorage.getItem(this.LOCAL_STORAGE_KEY_CART)) || [],
      this.cartAmount += this.lcCart.length;

    for (product in this.lcCart) {
      console.log(this.lcCart[product], this.cart);
    }

  },
  methods: {

    addToCart(product) {
      this.isHidden = false;
      this.isBouncing = true;
      setTimeout(() => this.isBouncing = false, 200);
      let price = parseInt(this.products[product.name].price.replace('kr', '').replaceAll(' ', ''));
      if (this.cart[product.name]) {
        this.cart[product.name].total += 1;
        this.cart[product.name].price = this.cart[product.name].total * price;
        this.cartAmount = this.cartCounter;
      }
      else {
        this.cart[product.name] = { total: 1 };
        this.cart[product.name].price = price;
        this.cartAmount = this.cartCounter;
      }
      this.lcCart.push(
        this.products[product.name],
        this.totalPrice);
      this.saveItem();
      // this.totalPrice += this.priceNumber;
      //  this.cartAmount
    },

    removeItem(key) {
      this.cart[key].total -= 1;
      this.cartCounter -= 1;
      this.cartAmount -= 1;
      this.totalPrice -= this.cart[key].price;
      if (this.cart[key].total === 0) {
        delete this.cart[key];
      }

      // this.lcCart = this.lcCart.filter((item) => item.key !== this.cart[key]);
      this.lcCart.splice(this.lcCart.indexOf(this.cart[key]), 1);
      this.saveItem();
    },
    saveItem() {
      localStorage.setItem(this.LOCAL_STORAGE_KEY_CART, JSON.stringify(this.lcCart));
      this.cartAmount = this.lcCart.length;
      console.log(this.lcCart);
    },
  },
  // mounted() {
  //   if (localStorage.lcCart) {
  //     this.lcCart = JSON.parse(localStorage.lcCart);
  //   }

  // },
  // watch: {
  //   lcCart(newValues) {
  //     localStorage.lcCart = JSON.stringify(newValues);

  //     console.log(newValues);
  //   }
  // }
})
app.mount("#app-root");