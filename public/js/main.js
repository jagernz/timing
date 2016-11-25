//(function ($) {
//  $('#tableItems').on('click', '.destroy', function (event) {
//    var $res = confirm('Вы уверены?');
//    if ($res) {
//      event.preventDefault();
//      var $form = $('#delete-form');
//      $form.attr('action', $(this).data('action'));
//      $form.submit();
//    }
//  });
//
//  $('#tableItems').on('click', '.destroy', function (event) {
//    var $res = confirm('Вы уверены?');
//    if ($res) {
//      event.preventDefault();
//      var $form = $('#delete-form');
//      $form.attr('action', $(this).data('action'));
//      $form.submit();
//    }
//  });
//
//  $('#clickMe').on('click', function () {
//  });
//
//})(jQuery);

$(document).ready( function() {

  //$('#myModal').modal('hide');

              /*
               * Начало работы
               */
              $(document).on('click', '#startWork', function () {

                var $userId = $('#getUserId').val();
                var $day = $('#getResDay').val();

                $.ajax({
                  url: '/startWork',
                  type: 'post',
                  dataType: 'json',
                  data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: $userId,
                    day: $day
                  },
                  success: function (e) {
                    if (e){
                      $('#startWork').remove();
                      console.log(e.message);
                    }
                  }

                });

              });

  /*
   * Завершение рабочего дня
   */
  $(document).on('click', '#endWork', function () {

    var $userId = jQuery('#getUserId').val();
    var $day = jQuery('#getResDay').val();

    jQuery.ajax({
      url: '/endWork',
      type: 'post',
      dataType: 'json',
      data: {
        _token: $('meta[name="_token"]').attr('content'),
        id: $userId,
        day: $day
      },
      success: function (e) {
        if (e){
          $('#endWork').remove();
          console.log(e.message);
        }
      }

    });

  });

              /*
               * Перерыв в рабочем дне
               */
              $(document).on('click', '#rest', function () {

                jQuery('#myModal').modal('show');

                var $userId = jQuery('#getUserId').val();
                var $day = jQuery('#getResDay').val();

                jQuery.ajax({
                  url: '/rest',
                  type: 'post',
                  dataType: 'json',
                  data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    id: $userId,
                    day: $day
                  },
                  success: function (e) {
                    if (e){
                      $('#rest').remove();
                      console.log(e.message);
                    }
                  }

                });

              });

});