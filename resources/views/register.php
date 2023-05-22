<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="logo">
                <img src="../img/logo.png" alt="Logo" width="100%">
            </div>
            <div class="screen__content">
                <form class="login" method="post" action="/register">
                    <div class="login__field">
                        <input type="text" class="login__input" placeholder="Nombre completo">
                    </div>
                    <div class="login__field">
                        <input type="text" class="login__input" placeholder="Nombre de usuario">
                    </div>
                    <div class="login__field">
                        <input type="text" class="login__input" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <input type="password" class="login__input" placeholder="Contraseña">
                    </div>
                    <button class="button register__submit">
                        <span class="button__text">Registrarse</span>
                    </button>
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>

</html>