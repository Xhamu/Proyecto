<!DOCTYPE HTML>
<html>

<head>
    <title>Añadir noticia - Studium</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="/css/main.css" rel="stylesheet">
</head>

<body class="is-preload">

    <?php if (session('success')) { ?>
    <div class="col-lg-12 col-6 alert alert-success">
        <?php echo session('success'); ?>
    </div>
    <?php } ?>

    <?php if (session('error')) { ?>
    <div class="col-lg-12 col-6 alert alert-damger">
        <?php echo session('error'); ?>
    </div>
    <?php } ?>
    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header -->
        <header id="header">
            <h1><a href="/inicio">Studium</a></h1>
            <nav class="links">
                <ul>
                    <?php if (auth()->user()->id_rol === 1) { ?>
                    <li><a href="/admin">Panel de administración</a></li>
                    <?php } ?>
                    <li><a href="/usuario/<?php echo auth()->user()->id; ?>">Mi perfil</a></li>
                    <li><a href="/usuario/<?php echo auth()->user()->id; ?>/amistades">Mis amistades</a></li>
                    <li><a href="/noticias">Últimas noticias</a></li>
                </ul>
            </nav>
            <nav class="main">
                <ul>
                    <li><a class="fa-door-open" style="color:red;" href="/logout">Cerrar sesión</a></li>
                    <li class="menu">
                        <a class="fa-bars" href="#menu">Menu</a>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- Menu -->
        <section id="menu">

            <!-- Search -->
            <section>
                <form class="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Buscar" />
                </form>
            </section>

            <!-- Links -->
            <section>
                <ul class="links">
                    <?php if (auth()->user()->id_rol === 1) { ?>
                    <li>
                        <a href="/admin">
                            <h3>Panel de administración</h3>
                            <p>Mostrar panel de administración</p>
                        </a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="/usuario/<?php echo auth()->user()->id; ?>">
                            <h3>Mi perfil</h3>
                            <p>Mostrar mi perfil</p>
                        </a>
                    </li>
                    <li>
                        <a href="/usuario/<?php echo auth()->user()->id; ?>/amistades">
                            <h3>Mis amistades</h3>
                            <p>Mostrar mis amistades</p>
                        </a>
                    </li>
                    <li>
                        <a href="/noticias">
                            <h3>Últimas noticias</h3>
                            <p>Mostrar las últimas noticias</p>
                        </a>
                    </li>
                </ul>
            </section>

        </section>

        <!-- Main -->
        <div id="main">
            <section>
                <h3>Añadir nueva noticia</h3>
                <form method="post" action="/admin/noticias/add">
                    @csrf
                    <div class="row gtr-uniform">
                        <div class="col-12 col-12-xsmall">
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"
                                placeholder="Titulo" />
                            <p style="color: red; font-size: 12px;">{{ $errors->first('titulo') }}</p>
                        </div>
                        <div class="col-12 col-12-xsmall">
                            <input type="text" name="subtitulo" id="subtitulo" value="{{ old('subtitulo') }}"
                                placeholder="Subtítulo (opcional)" />
                        </div>
                        <div class="col-12">
                            <textarea name="contenido" id="contenido" placeholder="Contenido de la noticia" rows="20" style="resize: none;">{{ old('contenido') }}</textarea>
                            <p style="color: red; font-size: 12px;">{{ $errors->first('contenido') }}</p>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Añadir" /></li>
                                <li><input type="reset" value="Limpiar" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <!-- Sidebar -->
        <section id="sidebar">

            <section>
                <ul class="posts">
                    <li>
                        <article>
                            <header>
                                <h3><a href="/admin">Inicio</a></h3>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="/admin/usuarios">Gestionar usuarios</a></h3>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="/admin/publicaciones">Gestionar publicaciones</a></h3>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="/admin/comentarios">Gestionar comentarios</a></h3>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="/admin/noticias">Gestionar noticias</a></h3>
                            </header>
                        </article>
                    </li>
                </ul>
            </section>

            <!-- Footer -->
            <section id="footer">
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a>
                    </li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a>
                    </li>
                    <li><a href="#" class="icon solid fa-rss"><span class="label">RSS</span></a></li>
                    <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
                </ul>
                <p class="copyright">&copy;2023 Studium - Estudiantes conectados.</p>
            </section>

        </section>

    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/browser.min.js"></script>
    <script src="/js/breakpoints.min.js"></script>
    <script src="/js/util.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>
