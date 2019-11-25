<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ITC System Login</title>

    <!-- Bootstrap -->
    <link href="https://colorlib.com/polygon/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://colorlib.com/polygon/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="https://colorlib.com/polygon/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="https://colorlib.com/polygon/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="<?php echo site_url("login/login/validar"); ?>" id="frmLogin" method="POST">
                        <h1>Login</h1>
                        <div>
                            <input type="text" name="usuario" id="usuarioL" class="form-control" placeholder="Usuario"
                                required />
                        </div>
                        <div>
                            <input type="password" id="passwordL" name='password' class="form-control"
                                placeholder="Contraseña" required />
                        </div>
                        <div>
                            <button type="submit" class="btn">Entrar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Eres nuevo?
                                <a href="#signup" class="to_register"> Crea una cuenta </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <!-- <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                    Terms</p>
                            </div> -->
                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form action="<?php echo site_url("login/login/registrar"); ?>" id="frmRegister" method="POST">
                        <h1>Crear cuenta</h1>
                        <div><input type="text" value="paulo" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required /></div>
                        <div><input type="text" value="paulo" name="ap_patern" id="ap_patern" class="form-control" placeholder="Apellido Paterno" required /></div>
                        <div><input type="text" value="paulo" name="ap_matern" id="ap_matern" class="form-control" placeholder="Apellido Materno" required /></div>
                        <div><input type="number" value="123123123" name="tel1" id="tel1" class="form-control" placeholder="Teléfono Casa" required /></div><br>
                        <div><input type="number" value="123123123" name="tel2" id="tel2" class="form-control" placeholder="Teléfono Móvil" required /></div><br>
                        <div><input type="email" value="paulo@gmail.com" name="email" id="email" class="form-control" placeholder="Correo Electrónico" required /></div>
                        <div><input type="text" value="paulo" name="usuario" id="usuario" class="form-control" placeholder="Usuario" required /></div>
                        <div><input type="password" value="paulo"  name="password" id="password" class="form-control" placeholder="Password" required /></div>
                        <div><input type="password" value="paulo"  name="password-confirm" id="password-confirm" class="form-control" placeholder="Confirmar Password" required /></div>
                        <div>
                        <button type="submit" class="btn" id="btn_send">Enviar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Ya eres empleado?
                                <a href="#signin" class="to_register"> Entra al sitio </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <!-- <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                    Terms
                                </p>
                            </div> -->
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <div id="the-message" style="display: inline;"></div>
    <input type="hidden" id="base_url" value="<?php echo base_url('/index.php/'); ?>" />
    <input type="hidden" id="site_url" value="<?php echo base_url(); ?>" />
    <script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('resources/js/login.js'); ?>"></script>
</body>

</html>