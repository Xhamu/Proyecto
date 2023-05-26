<!DOCTYPE HTML>
<html>

<head>
    <title>Mi perfil - Studium</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="/css/main.css" rel="stylesheet">
</head>

<body class="is-preload">

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
                    <input type="text" name="query" placeholder="Search" />
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
            <!-- Post -->
            <h1>Publicaciones</h1>
            <article class="post">
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod
                    placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non
                    congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta
                    lectus vitae, ultricies congue gravida diam non fringilla.</p>
                <div class="col-12">
                    <ul class="actions">
                        <li><input class="button large" type="submit" value="Mostrar publicación" /></li>
                    </ul>
                </div>
                <footer>
                    <ul class="stats">
                        <li class="icon solid fa-heart"> 28</li>
                        <li class="icon solid fa-comment"> 128</li>
                    </ul>
                </footer>
                <div class="meta">
                    <time class="published" datetime="2015-11-01">12/05/2023 12:40:30</time>
                    <a href="#" class="author"><span class="name">Samuel Rodriguez</span></a>
                </div>
            </article>

            <!-- Post -->
            <article class="post">
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod
                    placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non
                    congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta
                    lectus vitae, ultricies congue gravida diam non fringilla.</p>
                <div class="col-12">
                    <ul class="actions">
                        <li><input class="button large" type="submit" value="Mostrar publicación" /></li>
                    </ul>
                </div>
                <footer>
                    <ul class="stats">
                        <li class="icon solid fa-heart"> 28</li>
                        <li class="icon solid fa-comment"> 128</li>
                    </ul>
                </footer>
                <div class="meta">
                    <time class="published" datetime="2015-11-01">12/05/2023 12:40:30</time>
                    <a href="#" class="author"><span class="name">Samuel Rodriguez</span></a>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <section id="sidebar">

            <!-- Intro -->
            <section id="intro">
                <header>
                    <h2><?php echo auth()->user()->nombre; ?></h2>
                    <h3><?php echo '@' . auth()->user()->username; ?></h3>
                    <p>Miembro/a desde <?php echo auth()->user()->created_at->format('m/Y'); ?></p>
                </header>
                <div class="col-12">
                    <ul class="actions">
                        <li>
                            <a href="/usuario/<?php echo auth()->user()->id; ?>/editar" class="button large">
                                <p>Editar perfil</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>

            <section>
                <ul class="posts">
                    <h3>Sugerencias de amistad</h3>
                    <li>
                        <article>
                            <header>
                                <h3><a href="single.html">Amigo numero 1</a></h3>
                                <time class="published" datetime="2015-10-20">@Amigonumero1</time>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="single.html">Amigo numero 2</a></h3>
                                <time class="published" datetime="2015-10-15">@Amigonumero2</time>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="single.html">Amigo numero 3</a></h3>
                                <time class="published" datetime="2015-10-10">@Amigonumero3</time>
                            </header>
                        </article>
                    </li>
                </ul>
            </section>

            <!-- Footer -->
            <section id="footer">
                <ul class="icons">
                    <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
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