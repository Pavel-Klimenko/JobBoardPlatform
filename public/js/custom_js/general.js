$( document ).ready(function() {
    $( ".send-data-form" ).click(function() {
        showModal('formSent');
    });
});


function showModal(modalId) {
    let modal = document.getElementById(modalId);
    modal.style.display = "block";
    setTimeout(function() {
        modal.style.display = "none";
    }, 1000)
}
