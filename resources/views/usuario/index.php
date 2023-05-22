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
            <h1><a href="/home">Studium</a></h1>
            <nav class="links">
                <ul>
                    <li><a href="/admin">Administración</a></li>
                    <li><a href="/usuario/id">Mi perfil</a></li>
                    <li><a href="/usuario/id/publicaciones">Mis publicaciones</a></li>
                    <li><a href="/usuario/id/amistades">Mis amistades</a></li>
                </ul>
            </nav>
            <nav class="main">
                <ul>
                    <li><a class="fa-door-open" style="color:red;" href="/logout">Cerrar sesión</a></li>
                    <li class="search">
                        <a class="fa-search" href="#search">Búsqueda</a>
                        <form id="search" method="get" action="#">
                            <input type="text" name="query" placeholder="Search" />
                        </form>
                    </li>
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
                    <li>
                        <a href="#">
                            <h3>Administración</h3>
                            <p>Mostrar menú de administración</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Mi perfil</h3>
                            <p>Mostrar mi perfil</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Mis publicaciones</h3>
                            <p>Mostrar mis publicaciones</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <h3>Mis amistades</h3>
                            <p>Mostrar mis amistades</p>
                        </a>
                    </li>
                </ul>
            </section>

        </section>

        <!-- Main -->
        <div id="main">
            <section>
                <form method="post" action="/publicar">
                    <div class="row gtr-uniform">
                        <div class="col-12">
                            <textarea style="resize: none;" name="demo-message" id="demo-message" placeholder="¿Qué tal tus exámenes?" rows="6"></textarea>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input class="button large" type="submit" value="Publicar" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>

            <!-- Post -->
            <article class="post">
                <p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod
                    placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at. Phasellus sed ultricies mi non
                    congue ullam corper. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta
                    lectus vitae, ultricies congue gravida diam non fringilla.</p>
                <div class="col-12">
                    <ul class="actions">
                        <li><input type="submit" value="Me gusta" /></li>
                        <li><input type="submit" value="Comentar" /></li>
                    </ul>
                </div>
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
                        <li><input type="submit" value="Me gusta" /></li>
                        <li><input type="submit" value="Comentar" /></li>
                    </ul>
                </div>
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
                    <h2>Samuel Rodriguez Groba</h2>
                    <p>Miembro/a desde 12/05/2023</p>
                </header>
            </section>

            <section>
                <div class="mini-posts">
                    <!-- Mini Post -->
                    <article class="mini-post">
                        <header>
                            <h3><a href="single.html">Noticia 1</a></h3>
                            <time class="published" datetime="2015-10-20">October 20, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/logo.png" alt="" /></a>
                    </article>

                    <!-- Mini Post -->
                    <article class="mini-post">
                        <header>
                            <h3><a href="single.html">Noticia 2</a></h3>
                            <time class="published" datetime="2015-10-19">October 19, 2015</time>
                        </header>
                        <a href="single.html" class="image"><img src="images/logo.png" alt="" /></a>
                    </article>

                </div>
            </section>

            <!-- Posts List -->
            <section>
                <ul class="posts">
                    <li>
                        <article>
                            <header>
                                <h3><a href="single.html">Samuel Rodriguez</a></h3>
                                <time class="published" datetime="2015-10-20">@xhamu</time>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="single.html">Samuel Rodriguez</a></h3>
                                <time class="published" datetime="2015-10-15">@xhamu</time>
                            </header>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <h3><a href="single.html">Samuel Rodriguez</a></h3>
                                <time class="published" datetime="2015-10-10">@xhamu</time>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/browser.min.js"></script>
    <script src="js/breakpoints.min.js"></script>
    <script src="js/util.js"></script>
    <script src="js/main.js"></script>

</body>

</html>