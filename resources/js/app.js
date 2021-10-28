require('bootstrap');
require('@fortawesome/fontawesome-free/js/all');
window.$ = window.jQuery = require('jquery');
document.Dropzone = require('dropzone');

Dropzone.autoDiscover = false;
require('./announcementImages')
require('./main');
