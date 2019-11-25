$(document).ready(function () {
    var base_url = $("#base_url").val();

    $("#nombre").focus();
    // alert(base_url);

    document.getElementById("btn_send").disabled = true;

    $("#frmLogin").on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $("#frmLogin").serialize(),
            success: function (e) {
                if (e === "error") {
                    alert("Los datos son incorrectos");
                } else {
                    window.location.href = base_url;
                }
            }
        });
    });

    $("#frmRegister").on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $("#frmRegister").serialize(),
            beforeSend: function () {
                $('#cargandoLoader').show();
            },
            success: function (d) {
                if (d.success === true) {
                    // alert(d);
                    ////////////////////////////////////////////////////////////////////////////////////
                    //alert('success');
                    $("#the-message").append('<div class="alert alert-success" style="display:inline;">' +
                        '<span class="fa fa-check"></span> ' +
                        ' Guardado correctamente!' +
                        '</div>');
                    $(".form-group").removeClass('has-error')
                        .removeClass('has-success');
                    $(".text-danger").remove();
                    $(".alert-success").delay(500).show(10, function () {
                        $(this).delay(2000).hide(100, function () {
                            $(this).remove();
                        });
                    });

                    window.location.href = base_url + `login/login#signin`;

                } else {

                    $("#the-message").append('<div class="alert alert-warning" style="display:inline;">' +
                        '<span class="fa fa-check"></span> ' +
                        'El usuario ya existe!!!' +
                        '</div>');
                    $("#the-message").delay(1000).show(10, function () {
                        $(this).delay(2000).hide(100, function () {
                            $(this).remove();
                        });
                    });

                }
                // $("#frmRegister")[0].reset();
            },
            complete: function () {
                $('#cargandoLoader').hide();
                //location.reload();
            }
        });
    });

    $("#password-confirm").on("keyup", () => {
        let pc = $("#password-confirm").val();
        let p = $("#password").val();
        // console.log(pc, p);

        if (pc === p) {
            document.getElementById("btn_send").disabled = false;
        } else {
            $("#the-message").append('<div class="alert alert-warning" style="display:inline;">' +
                '<span class="fa fa-check"></span> ' +
                'Los password deben ser idénticos!!!' +
                '</div>');
            $("#the-message").delay(1000).show(10, function () {
                $(this).delay(2000).hide(100, function () {
                    $(this).remove();
                });
            });
        }

    });



});