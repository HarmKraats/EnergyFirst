// const button = document.getElementsByClassName('ajaxCall');


// button.addEventListener('click', function (event) {
//     event.preventDefault();
//     let date = button.dataset.maand;

//     $.ajax({
//         url: 'ajax.php',
//         type: 'GET',
//         data: { date: date },
//         beforeSend: function () {
//             // set the link to the data-month attribute
//             console.log(date);
//             window.location.hash = "?date=" + date;
//             $('#chart').remove();
//         },
//         success: function (data) {
//             console.log(data);
//             $('#ajaxOutput').html(data);
//         }
//     });
// });
