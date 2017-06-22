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

