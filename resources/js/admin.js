window.$ = window.jQuery = require('jquery');

const trumbowyg = require('trumbowyg');
const base64 = require('trumbowyg/plugins/base64/trumbowyg.base64.js');
const noembed = require('trumbowyg/plugins/noembed/trumbowyg.noembed.js');
const preformatted = require('trumbowyg/plugins/preformatted/trumbowyg.preformatted.js');
const colors = require('trumbowyg/plugins/colors/trumbowyg.colors.js');
const upload = require('trumbowyg/plugins/upload/trumbowyg.upload.js');
const flatpickr = require('flatpickr');
const feather = require('feather-icons');

require('datatables.net');
require('datatables.net-buttons');
require('datatables-bulma');
require('../../vendor/yajra/laravel-datatables-buttons/src/resources/assets/buttons.server-side.js');

$(function() {
  $(".datepicker").flatpickr();
  $('.notification').not('.is-permanent').delay(3000).fadeOut(350);
  $('#editor').trumbowyg({
    btns: [
      ['formatting'],
      ['link', 'insertImage', 'base64', 'noembed', 'upload'],
      ['preformatted', 'backColor', 'strong', 'em', 'del', 'unorderedList'],
      ['viewHTML']
    ],
    plugins: {
        upload: {
          serverPath : "/admin/upload",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success : function (data, trumbowyg, $modal, values) {
            trumbowyg.closeModal();
            let html = trumbowyg.html();
            html += '<img src="'+data.file+'" alt="'+values.alt+'" />';
            trumbowyg.html(html);
          },
          error: function(e){
            alert("Failed: "+e);
          }
        }
    },
    resetCss: true
  });
  $('.file-input').on('change', function () {
    $(this).parent().find('.file-name').removeClass('is-hidden').text(this.value.replace(/.*[\/\\]/, ''));
  });
  feather.replace();
});
