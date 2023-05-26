<!DOCTYPE HTML>
<!--
	Future Imperfect by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Mostrar publicación - Studium</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/css/main.css" />
</head>

<body class="single is-preload">

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

            <div class="col-12">
                <ul class="actions">
                    <li><a href="/inicio" class="button medium">Volver al inicio</a>
                    </li>
                </ul>
            </div>

            <?php foreach ($publicaciones as $p) { ?>
                <article class="post">
                    <header>
                        <div class="title">
                            <h2><a href="#"><?php echo $p->titulo; ?></a></h2>
                            <p><?php echo $p->subtitulo; ?></p>
                        </div>
                        <div class="meta">
                            <time class="published" datetime="2015-11-01"><?php echo $p->created_at->format('H:i d/m/Y'); ?></time>
                            <a href="#" class="author"><span class="name"><?php echo $p->usuario->nombre . ' (@' . $p->usuario->username . ')'; ?></span><img src="images/avatar.jpg" alt="" /></a>
                        </div>
                    </header>
                    <p><?php echo $p->contenido; ?></p>
                    <footer>
                        <ul class="stats">
                            <?php
                            $likedByUser = $p->likes->contains('user_id', auth()->user()->id);
                            $estilo = $likedByUser ? 'red' : '';
                            if ($likedByUser) { ?>
                                <li class="icon solid fa-heart" style="color: <?php echo $estilo; ?>;"> <?php echo $p->likes_count; ?></li>
                            <?php } else { ?>
                                <li><a href="/like/<?php echo $p->id; ?>" class="icon solid fa-heart"> <?php echo $p->likes_count; ?></a></li>
                            <?php } ?>
                            <li><a href="/comentar/<?php echo $p->id; ?>" class="icon solid fa-comment"> <?php echo $p->comentarios_count; ?></a></li>
                        </ul>
                    </footer>
                </article>
            <?php } ?>

        </div>

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

    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/browser.min.js"></script>
    <script src="/js/breakpoints.min.js"></script>
    <script src="/js/util.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>