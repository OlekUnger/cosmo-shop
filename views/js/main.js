// (function () {
//     var button = $('#submit');
//
//     button.on('click', function () {
//         var title = $('input[name=title]').val();
//
//         $.ajax({
//             url: '/rest.php?id=' + 32 + '&title=' + title,
//             method: 'PUT',
//             // dataType: 'json'
//         }).done(function (data) {
//             console.log(data);
//         });
//     });
// })();

(function () {
    $('.category').dcAccordion();
})();

(function () {
    $('.breadcrumbs').find('.breadcrumbs_link:last-child').not('.main_link').attr('href', '#').css('cursor', 'default');
})();

(function () {
    $('.open-form_btn').click(function () {
        $('#comment-form').dialog('open');
        var parent = $(this).attr('data');
        $this = $(this);
        if (!parseInt(parent)) parent = 0;
        $('input[name="parent"]').val(parent);
    });
})();

$('#errors').dialog({
    autoOpen: false,
    width: 450,
    modal: true,
    title: 'Сообщение об ошибке',
    show: {effect: 'fade', duration: 500},
    hide: {effect: 'fade', duration: 500}
});

(function () {
    // var title;
    $('#auth').dialog({
        autoOpen: false,
        width: 440,
        modal: true,
        // title: title,
        resizable: false,
        show: {effect: 'fade', duration: 500},
        hide: {effect: 'fade', duration: 500}
    });
})();

(function () {
    $('header .enter-form_btn').click(function (e) {
        e.preventDefault();
        $('#auth').dialog( 'open').dialog( {title:'Вход'});
        $('#enter-form').css("display","block");
    });
})();

(function () {
    $('.reset-password_link').click(function (e) {
        e.preventDefault();
        $('#enter-form').css("display","none");
        $('#auth').dialog( {title:'Восстановление пароля'});
        $('#reset-password_form').css("display","block");
    });
})();
(function () {
    $('.enter_link').click(function () {
        $('#enter-form').css("display","block");
        $('#reset-password_form').css("display","none");
    });
})();

