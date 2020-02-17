$(function(){

    $("#champ1").on('change', function(){
        var valof = $(this).val();
        $('output').text(valof);
    });

    $('#submit').on('click', function () {
        var brightness =  $.trim($('.brightness').text());
        var shutter =  Number($('#shutter').is(':checked'));
        var summer =  Number($('.js-summer').is(':checked'));
        var winter =  Number($('.js-winter').is(':checked'));
        var limit_min = $('.limit_min').val();
        var limit_max = $('.limit_max').val();

        $.ajax({
            type: 'POST',
            url: Routing.generate('submit'),
            data: {
                'brightness': brightness,
                'shutter': shutter,
                'summer': summer,
                'winter': winter,
                'limit_min': limit_min,
                'limit_max': limit_max
            },
            success: function (data) {
                var liminosite = brightness/100;
                if (!liminosite) {
                    $('.js-light').addClass('min_opacity');
                } else {
                    $('.js-light').css("opacity", liminosite);
                }

            },
            error: function(data) {
                console.log('Sauvegarde a échoué');
            }
        });
    });

    $('.custom-control-input').on('change', function () {
        $('.limit').removeClass('d-none');
    });
});
