module.exports = {
  proxy: "http://localhost/rectify",
  files: [
    "wp-content/themes/rectify/**/*.{php,css,js,html}",
    "wp-content/themes/rectify/**/*.{png,jpg,jpeg,gif,svg}"
  ],
  notify: false,
  open: false,
  injectChanges: true
};
