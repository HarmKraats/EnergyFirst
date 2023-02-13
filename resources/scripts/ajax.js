$('#ajaxButton').on('click', function() {
    $.ajax({
        url: 'ajax.php',
        type: 'GET',
        beforeSend: function() {
            $('#chart_script').remove();
        },
        success: function(data) {
            $('#chart_script').html(data);
        }
    });
});
