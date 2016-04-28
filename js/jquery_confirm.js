/**
 * Created by Bjorn on 2016-04-28.
 */

$(function () {
    $('.revert-changes').on('click', function () {
        $.alert({
            title: 'Hey!',
            content: 'This is a simple alert to the user. <br> with some <strong>HTML</strong> <em>contents</em>',
            confirmButton: 'Okay',
            confirmButtonClass: 'btn-primary',
            icon: 'fa fa-info',
            animation: 'zoom',
            confirm: function () {
                $.alert('Okay action clicked.');
            }
        });
    });

});

