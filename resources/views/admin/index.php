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
            <h1><a href="/">Studium</a></h1>
            <nav class="links">
                <ul>
                    <li><a href="/admin">Panel de administración</a></li>
                    <li><a href="/usuario/id">Mi perfil</a></li>
                    <li><a href="/usuario/id/amistades">Mis amistades</a></li>
                    <li><a href="/noticias">Últimas noticias</a></li>
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
                        <a href="/admin">
                            <h3>Panel de administración</h3>
                            <p>Mostrar panel de administración</p>
                        </a>
                    </li>
                    <li>
                        <a href="/usuario/id">
                            <h3>Mi perfil</h3>
                            <p>Mostrar mi perfil</p>
                        </a>
                    </li>
                    <li>
                        <a href="/usuario/id/amistades">
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
                <h3>Últimos usuarios registrados</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Nombre de Usuario</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach -->
                            <tr>
                                <td>Samuel Rodriguez</td>
                                <td>xhamu</td>
                                <td>samuelgeminis5@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section>
                <h3>Últimas publicaciones realizadas</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre Usuario</th>
                                <th>Email Usuario</th>
                                <th>Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach -->
                            <tr>
                                <td>Samuel Rodriguez</td>
                                <td>samuelgeminis5@gmail.com</td>
                                <td>¡Que bonito es estudiar!</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
            <section>
                <h3>Últimos comentarios realizados</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Nombre Usuario</th>
                                <th>ID Publicación</th>
                                <th>Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach -->
                            <tr>
                                <td>Samuel Rodriguez</td>
                                <td>546</td>
                                <td>No me gusta ese tipo de lenguaje</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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