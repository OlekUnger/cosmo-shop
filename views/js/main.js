(function() {
    var button = $('#submit');

    button.on('click', function () {
        var title = $('input[name=title]').val();

        $.ajax({
            url: '/rest.php?id=' + 32 + '&title=' + title,
            method: 'PUT',
            // dataType: 'json'
        }).done(function (data) {
            console.log(data);
        });
    });
})();

(function(){
    $('.category').dcAccordion();
})();

(function(){
    $('.breadcrumbs').find('.breadcrumbs_link:last-child').not('.main_link').attr('href','#').css('cursor','default');
})();

// (function(){
//     $('#form-wrap').dialog({
//         autoOpen: false,
//         width: 640,
//         modal: true,
//         title: 'Добавить сообщение',
//         resizable: false,
//         show: {effect: 'fade',duration: 500},
//         hide: {effect: 'fade',duration: 500},
//         buttons: {
//             "Добавить": function(){
//                 var commentAuthor = $('#comment_author').val();
//                     commentText = $('#comment_text').val();
//                     parentId = $('#parent_id').val();
//                     // productId = <?=$product_id?>;
//                 if(commentText == '' || commentAuthor == ''){
//                     alert('Заполните поля формы');
//                     return;
//                 }
//             },
//             "Отмена": function () {
//                 $(this).dialog('close');
//             }
//         }
//     });
// })();

(function(){
    $('.open-form_btn').click(function () {
        $('#form-wrap').dialog('open');
        var parentId = $(this).attr('data');
        if(!parseInt(parent)) parent = 0;
        $('input[name="parent"]').val(parentId);
    });
})();

