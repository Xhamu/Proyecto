<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión - Studium</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="post" action="/login">
                    <div class="login__field">
                        <input type="text" class="login__input" placeholder="Introduce tu email">
                    </div>
                    <div class="login__field">
                        <input type="password" class="login__input" placeholder="Introduce tu contraseña">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Iniciar sesión</span>
                    </button>
                </form>
                <form class="login" method="get" action="/register">
                    <button class="button register__submit">
                        <span class="button__text">Crea una nueva cuenta</span>
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