$(document).ready(function () {

    $('.delete-button').click(function () {
        if (!confirm('Chcete vymazať túto položku?')) {
            return false;
        }
    });

})
