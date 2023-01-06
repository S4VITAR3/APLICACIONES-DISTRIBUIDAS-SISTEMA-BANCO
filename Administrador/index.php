<!doctype html>
<html lang="en">

<head>
    <title>BANCO | EL CONFIANZAS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: #c2c2c2;">
    <section class="mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 text-center">
                    <h2 class="heading-section">BANCO EL CONFIANZAS</h2>
                    <h6>EL BANCO MÁS SEGURO DE TODO EL COSMOS</h6>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Inicia sesión querido Admin</h3>
                                </div>
                            </div>
                            <form action="iniciarSesion.php" class="signin-form" method="GET">
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" id="cuenta" name="cuenta" required>
                                    <label class="form-control-placeholder" for="cuenta">Numero de cuenta</label><br>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="number" class="form-control" id="nip" name="nip" required>
                                    <label class="form-control-placeholder" for="password">NIP</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Ingresar</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Recuerdame
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>