(document).ready(function() {
    $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');

        $('#confirm-delete').modal({ shown: true });

    })
});