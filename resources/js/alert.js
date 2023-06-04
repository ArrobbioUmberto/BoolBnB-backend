var popup = document.getElementById("popup_message");
if (popup) {
    // show a message in a toast
    Swal.fire({
        toast: true,
        animation: false,
        icon: popup.dataset.type,
        iconColor: "#3fb3c0",
        title: popup.dataset.message,
        type: popup.dataset.type,
        position: "top-right",
        timer: 3000,
        showConfirmButton: false,
    });
}

const deleteBtns = document.querySelectorAll("form.delete");

deleteBtns.forEach((formDelete) => {
    formDelete.addEventListener("submit", function (event) {
        event.preventDefault();
        var doubleconfirm = event.target.classList.contains("double-confirm");
        Swal.fire({
            title: "Sei sicuro di voler eliminare definitivamente il tuo appartamento?",
            text: "Per favore conferma",
            icon: "warning",
            iconColor: "#084C61",
            showCancelButton: true,
            confirmButtonColor: "#3fb3c0",
            customClass: {
                confirmButton: "btn btn-bool",
                cancelButton: "btn btn-delete swal",
            },
            cancelButtonColor: "#d33",
            cancelButtonText: "Annulla",
            confirmButtonText: "Si, sono sicuro!",
            buttonsStyling: false,
        }).then((result) => {
            if (result.value) this.submit();
        });
    });
});
