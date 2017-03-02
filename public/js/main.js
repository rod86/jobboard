
$(document).ready(function () {
    // confirm delete entry on delete entry
    $('form.delete').submit(function () {
        return confirm('Are you sure to delete this entry?');
    });

    // apply job
    $('#modal-job-application button[name="apply"]').on('click', function () {

        var form = $('#job-apply-form'),
            formData = new FormData(form[0]);

        formData.append('resume', form.find('input#resume')[0].files[0]);

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function (response) {

                var alert = form.find('div.alert'),
                    message,
                    oldClass,
                    newClass;

                if (response.success) {
                    message = response.message;
                    oldClass = 'alert-danger';
                    newClass = 'alert-success';
                } else {
                    message = '<ul>';
                    for(var key in response.errors) {
                        message += '<li>' + response.errors[key] + '</li>';
                    }
                    message += '</ul>';

                    oldClass = 'alert-success';
                    newClass = 'alert-danger';
                }

                alert.removeClass(oldClass + ' hidden')
                    .addClass(newClass)
                    .html(message);
            },
            error: function (response) {
                form.find('div.alert')
                    .removeClass('alert-success hidden')
                    .addClass('alert-danger')
                    .text('Error processing. try later...')

                var alert = form.find('div.alert');
                alert.removeClass('hidden');
            }
        });
    });

    // clear form data on closing
    $('#modal-job-application').on('hidden.bs.modal', function (e) {
        var form = $('#job-apply-form');
        form.find('div.alert').addClass('hidden');
        form[0].reset();
    });
});