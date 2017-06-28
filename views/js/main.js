
//факкордеон
(function () {
    $('.category').dcAccordion();
})();

(function () {
    $('.breadcrumbs').find('.breadcrumbs_link:last-child').not('.main_link').attr('href', '#').css('cursor', 'default');
})();

// открытие формы комментария
(function () {
    $('.open-form_btn').click(function () {
        $('#comment-form').dialog('open');
        var parent = $(this).attr('data');
        $this = $(this);
        if (!parseInt(parent)) parent = 0;
        $('input[name="parent"]').val(parent);
    });
})();

//нотация об ошибке
$('#errors').dialog({
    autoOpen: false,
    width: 450,
    modal: true,
    title: 'Сообщение об ошибке',
    show: {effect: 'slide', duration: 500},
    hide: {effect: 'slide', duration: 500}
});

// форма входа переворот
(function(){
    $('.btn-front').click(function(){
        $('.flipContainer').toggleClass('flip');
    })
})();
(function(){
    $('.btn-back').click(function(){
        $('.flipContainer').removeClass('flip');
    })
})();

//регистрация
(function(){
    $('.access').change(function(){
        var $this = $(this),
            val = $.trim($this.val()),
            dataField = $this.attr('data-field'),
            checkIcon = $this.prev('label').find('span');

        if(val!=''){

            $.ajax({
                url: 'http://catalog.loc/register.php',
                type: 'POST',
                data: {
                    val: val,
                    dataField: dataField
                },
                success: function (res) {
                    if(res=='no'){
                        checkIcon.text('занято').addClass('error');
                    } else {
                        checkIcon.text('свободно').addClass('success');
                    }
                    console.log(res);
                }
            });
        }
    });
})();

// (function () {
//     // var title;
//     $('#auth').dialog({
//         autoOpen: false,
//         width: 440,
//         modal: true,
//         resizable: false,
//         show: {effect: 'fade', duration: 500},
//         hide: {effect: 'fade', duration: 500}
//     });
// })();
//
// (function () {
//     $('header .enter-form_btn').click(function (e) {
//         e.preventDefault();
//         $('#auth').dialog( 'open').dialog( {title:'Вход'});
//         $('#enter-form').css("display","block");
//     });
// })();
//
// (function () {
//     $('.reset-password_link').click(function (e) {
//         e.preventDefault();
//         $('#enter-form').css("display","none");
//         $('#auth').dialog( {title:'Восстановление пароля'});
//         $('#reset-password_form').css("display","block");
//     });
// })();
// (function () {
//     $('.enter_link').click(function () {
//         $('#enter-form').css("display","block");
//         $('#reset-password_form').css("display","none");
//     });
// })();
//
//
