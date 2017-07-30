$(function () {
    $('body .container').on('click', '.uplink', function () {
        $.scrollTo('body', 800, {offset: -50});
    });

    $('body .container').on('click', '.commentslink', function () {
        id = $(this).data('id');
        link = $(this).data('link');

        if ($('#' + id).hasClass('on')) {
            $('#' + id).removeClass('on');
            $(this).find('span').html('[+]');
        } else {
            $.ajax({
                url: '/comments/create/' + link,
                success: function (data) {
                    $('#' + id + ' .comments-form').html(data);

                }
            });
            $.ajax({
                url: '/comments/index/' + link,
                success: function (data) {
                    $('#' + id + ' .comments').html(data);
                }
            });

            $('#' + id).addClass('on');
            $(this).find('span').html('[-]');
            $.scrollTo('#' + id + ' .comments-form', 800, {offset: -50});
        }

    });

    $(document).on("submit", ".comments-form form", function () {
        link = $(this).find('input.guid').val();
        id = $(this).closest('.rss-item').attr('id');
        $.ajax({
            url: '/comments/create/',
            method: 'POST',
            data: $(this).serializeArray(),
            success: function (data) {
                $('#' + id + ' .comments-form').html(data);


                $.ajax({
                    url: '/comments/index/' + link,
                    success: function (data) {
                        $('#' + id + ' .comments').html(data);
                    }
                });

            }
        });


        return false;
    });


});