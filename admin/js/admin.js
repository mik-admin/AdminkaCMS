let user_id = -1;

$(document).ready(function() {

    let fon = $('.modal-fon');
    let open_modal = $('.modal-open');
    let close = $('.modal-close, .modal-fon');
    let modal = $('.modal-card');

    open_modal.click( function(event){
        event.preventDefault();
        var div = $(this).attr('href');

        //Вытаскиваем $user_id
        user_id = $(this).attr('id');

        //Формируем ссылку для удаления User'а
        $('#deleteLink').attr('href', 'user_remove.php?user_id=' + user_id);

        fon.fadeIn(400,
            function(){
                $(div)
                    .css({display: 'block', overflow: 'overlay'})
                    .animate({opacity: 1, top: '4%'}, 200);
            });
    });

    close.click( function(){
        modal
            .animate({opacity: 0, top: '45%'}, 200,
            function(){
                $(this).css('display', 'none');
                fon.fadeOut(300);
            }
        );
    });
});