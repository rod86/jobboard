$(document).ready(function () {
    // confirm delete entry on delete entry
    $('form.delete').submit(function () {
        return confirm('Are you sure to delete this entry?');
    })
});
