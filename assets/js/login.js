const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

$(function () {
    $(document).on('submit', '#formulario-registro', function (e) {
        e.preventDefault();
        $.ajax({
            url: RUTA_PUBLICA + 'usuarios/registrar',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.resp == 1) {
                    Swal.fire({
                        icon: "success",
                        title: "Correcto",
                        html: data.msg,
                    });
                    $('#formulario-registro')[0].reset();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        html: "Error al registrar usuario",
                    });
                }
            }
        })
    })
})