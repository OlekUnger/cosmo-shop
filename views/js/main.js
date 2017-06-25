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

(function(){
    $('.open-form_btn').click(function () {
        $('#form-wrap').dialog('open');
        var parent= $(this).attr('data');
        $this = $(this);
        if(!parseInt(parent)) parent= 0;
        $('input[name="parent"]').val(parent);
    });
})();

(function(){
    $('#errors').dialog({
       autoOpen: false,
       width: 450,
       modal: true,
       title: '',
       show: {effect:'fade',duration: 500},
       hide: {effect:'fade',duration: 500}
    });
})();

