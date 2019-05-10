//$(document).ready(function() {
//
//    let fon = $('.modal-fon');
//    let open_modal = $('.modal-open');
//    let close = $('.modal-close, .modal-fon');
//    let modal = $('.modal-card');
//
//    open_modal.click( function(event){
//        event.preventDefault();
//        var div = $(this).attr('href');
//
//        //Вытаскиваем $user_id
//        var user_id = $(this).attr('id');
//
//        fon.fadeIn(400,
//            function(){
//                $(div)
//                    .css({display: 'block', overflow: 'overlay'})
//                    .animate({opacity: 1, top: '4%'}, 200);
//            });
//    });
//
//    close.click( function(){
//        modal
//            .animate({opacity: 0, top: '45%'}, 200,
//            function(){
//                $(this).css('display', 'none');
//                fon.fadeOut(300);
//            }
//        );
//    });
//});