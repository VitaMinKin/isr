require('./bootstrap');

const ujs = require('@rails/ujs');
ujs.start();

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

$(document).ready(function () {
    bsCustomFileInput.init()
  });