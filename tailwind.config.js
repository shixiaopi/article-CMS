module.exports = {
  purge: [
      './resources/views/web/*.blade.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        width: {
            'cart-width': '96%'
        }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
