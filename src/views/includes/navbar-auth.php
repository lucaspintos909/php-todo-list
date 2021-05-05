<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a href="<?php constant('URL') ?>/" class="navbar-brand font-caveat title-navbar">
            Todo List Auth
            <img src="assets/icons/lock.svg" class="icon-nav">

        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ml-auto d-lg-none">
                <li class="nav-item">
                    <a class="nav-link" href="<?php constant('URL') ?>login">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php constant('URL') ?>signup">Registrarse</a>
                </li>
            </ul>

        </div>
        <div class="d-none <?= $_SERVER['REQUEST_URI'] != '/login' ? 'd-lg-flex justify-content-end ' : '' ?>">

            <form action="<?php constant('URL'); ?>login/authenticate?origin_page=auth" method="POST" class="d-flex">
                <input name="email" id="email" class="form-control me-2" type="email" placeholder="Email"
                       aria-label="Email" required>

                <input name="password" id="password" class="form-control me-2 ml-3" type="password"
                       placeholder="Contraseña" aria-label="Password" required>

                <button class="btn btn-outline-success ml-3" type="submit">Ingresar</button>

            </form>
        </div>
    </div>
</nav>
