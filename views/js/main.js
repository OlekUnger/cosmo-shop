//аккордеон
(function () {
    $('.category').dcAccordion({
        // eventType: 'hover',
        // disableLink: false,
        // hoverDelay: 100,
        // speed: 'fast'
    });

})();

//поиск
(function () {

    $('#autocomplete').autocomplete({
        source: path + 'search',
        minLength: 1,
        select: function (event, ui) {
            window.location = path + '/search/?search=' + encodeURIComponent(ui.item.value);
        }
    });

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
(function () {
    $('.btn-front').click(function () {
        $('.flipContainer').toggleClass('flip');
    })
})();
(function () {
    $('.btn-back').click(function () {
        $('.flipContainer').removeClass('flip');
    })
})();

//регистрация
(function () {
    $('.access').change(function () {
        var $this = $(this),
            val = $.trim($this.val()),
            dataField = $this.attr('data-field'),
            checkIcon = $this.prev('label').find('span');
        checkIcon.removeClass('error');
        checkIcon.removeClass('success');
        checkIcon.text('');
        if (val != '') {
            // checkIcon.addClass('error').text('Заполниет поле');
            $.ajax({
                url: 'http://catalog.loc/register.php',
                type: 'POST',
                data: {
                    val: val,
                    dataField: dataField
                },
                success: function (res) {
                    var result = JSON.parse(res);
                    // console.log(result);
                    checkIcon.removeClass('error');
                    checkIcon.text('');
                    if (result.answer == 'no') {
                        checkIcon.addClass('error').text(result.info);

                    } else {
                        checkIcon.text('свободно').addClass('success');
                    }

                }
            });
        }
    });
})();





