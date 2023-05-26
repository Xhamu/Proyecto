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
                <form class="login" method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="login__field">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required
                            class="login__input" placeholder="Introduce tu email">
                        @if ($errors->has('email'))
                            <p style="color:red; font-size: 12px;">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="login__field">
                        <input type="password" name="password" id="password" class="login__input"
                            placeholder="Introduce tu contraseña">
                        @if ($errors->has('password'))
                            <p style="color:red; font-size: 12px;">{{ $errors->first('password') }}</p>
                        @endif
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