$('#ajaxButton').on('click', function() {
    $.ajax({
        url: 'ajax.php',
        type: 'GET',
        beforeSend: function() {

        },
        success: function(data) {
            console.log(data);
            $('#chart_script').html(data);
        }
    });
});
