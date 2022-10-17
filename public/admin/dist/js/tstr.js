$(document).ready(function(){
    toastr.options = {
        "progressBar": true,
        "positionClass": "toast-bottom-left"
    };

    $('[data-toggle="tooltip"]').tooltip();
});

window.addEventListener('success', event => {
    toastr.success(event.detail.message);
});
window.addEventListener('warning', event => {
    toastr.warning(event.detail.message);
});
window.addEventListener('error', event => {
    toastr.error(event.detail.message);
});