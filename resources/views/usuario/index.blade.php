<!DOCTYPE HTML>
<html>

<head>
    <title>Home - Studium</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="css/main.css" rel="stylesheet">
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
            <section>
                <form method="post" action="/publicar">
                    @csrf
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <textarea style="resize: none;" name="demo-message" id="demo-message" placeholder="¿Qué tal tus exámenes?"
                                rows="5"></textarea>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><button class="button large" type="submit" value="Publicar">Publicar</button></li>
                                <li><button class="button large" type="reset" value="Limpiar">Limpiar</button></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>

            <!-- Post -->
            <h1>Últimas publicaciones</h1>
            <?php foreach ($publicaciones as $p) { ?>
            <article class="post">
                <p><?php echo $p->contenido; ?></p>
                <div class="col-12">
                    <ul class="actions">
                        <li><a href="/publicacion/<?php echo $p->id; ?>" class="button large">Ver publicación</a>
                        </li>
                    </ul>
                </div>
                <footer>
                    <ul class="stats">
                        <?php
                        $likedByUser = $p->likes->contains('user_id', auth()->user()->id);
                        $estilo = $likedByUser ? 'red' : '';
                        ?>
                        <li class="icon solid fa-heart" style="color: <?php echo $estilo; ?>"> <?php echo $p->likes_count; ?></li>
                        <li class="icon solid fa-comment" type="submit"> <?php echo $p->comentarios_count; ?></li>
                    </ul>
                </footer>
                <div class="meta">
                    <time class="published"><?php echo $p->created_at->format('d/m/Y'); ?></time>
                    <a href="/usuario/<?php echo $p->usuario->id; ?>" class="author"><span
                            class="name"><?php echo $p->usuario->nombre . ' (@' . $p->usuario->username . ')'; ?></span></a>
                </div>
            </article>
            <?php } ?>
        </div>

        <!-- Sidebar -->
        <section id="sidebar">

            <!-- Intro -->
            <section id="intro">
                <header>
                    <h3>Bienvenido/a a Studium;</h3>
                    <h3><?php echo '@' . auth()->user()->username; ?></h3>
                </header>
            </section>

            <section>
                <h1>Últimas noticias</h1>
                <div class="mini-posts">
                    <?php foreach($noticias as $n) { ?>
                    <article class="mini-post">
                        <header>
                            <h3><a href="/noticias/<?php echo $n->id; ?>"><?php echo $n->titulo; ?></a></h3>
                            <time class="published" datetime="2015-10-20"><?php echo $n->created_at->format('d/m/Y'); ?></time>
                        </header>
                        <a href="/noticias/<?php echo $n->id; ?>" class="image"><img src="images/logo.png"
                                alt="Noticia - <?php echo $n->titulo; ?>" /></a>
                    </article>
                    <?php } ?>
                </div>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/browser.min.js"></script>
    <script src="js/breakpoints.min.js"></script>
    <script src="js/util.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
