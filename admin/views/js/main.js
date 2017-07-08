(function () {
    $('.category').dcAccordion();

})();

(function () {
    var messEdit = $('#mess-edit');
    messEdit.find('.close_btn').on('click', function () {
        messEdit.hide();
        $('.response').empty();
    });
    $('.edit').each(function () {
        $(this).change(function () {
            var val = $(this).val(),
                title = $(this).attr('name'),
                url = $(this).parents('.zebra').data('table');
            updateField(val, title, url);
        });
    });
    $('.edit-price').change(function () {
        var val = $(this).val(),
            id = $(this).data('id'),
            url = $(this).parents('.zebra').data('table');
        updateField(val, id, url);
    });
    function updateField(val, title, url) {
        if (!url) url = '';
        $.ajax({
            url: path + url,
            type: 'POST',
            data: {val: val, title: title},
            beforeSend: function () {
                $('#loader').fadeIn();
            },
            success: function (res) {
                $('.response').text(res);
                messEdit.delay(500).fadeIn(1000);
            },
            error: function () {
                alert('Ошибка');
            },
            complete: function () {
                $('#loader').delay(500).fadeOut();
            }
        })
    }
})();

