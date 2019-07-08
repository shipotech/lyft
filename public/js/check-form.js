var isSubmitting = false;

$(document).ready(function () {

    var formID = $(".form-checked");
    var initData = formID.serialize();
    let formChanged = false;

    formID.change(function () {
        formChanged = true; // Algun dato en el Form Cambió
    });

    formID.submit(function() {
        isSubmitting = true;
    });

    window.addEventListener('beforeunload', (event) => {
        var nowData = formID.serialize();
        if (!isSubmitting && formChanged) {
            event.returnValue = 'Tienes datos sin guardar.';
        } else if (!isSubmitting && (initData != nowData)) {
            event.returnValue = 'Tienes datos sin guardar.';
        }
    });

});