<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PECHE MANAGER</title>
    <link rel="icon" href="../../../public/img/flavicon.webp"/>
    <link rel="stylesheet" href="/public/css/theme.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
          integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
          crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
            integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
            crossorigin=""></script>
    <script type="module" src="/public/js/main.js"></script>
</head>
<body>
<header>
    <section>
        <a href="<?= url('/') ?>">
            <h1>PECHE MANAGER</h1>
        </a>
        <div class="header-link-container ">
            <div>
                <div class="burger" id="burger"></div>
                <nav>
                    <ul>
                        <li>
                            <a href="<?= url('/') ?>"
                               class="<?php if ($_SERVER['REQUEST_URI'] === '/index.php/' || $_SERVER['REQUEST_URI'] === '/') : ?>active<?php endif ?>">
                                Accueil
                            </a>
                        </li>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <li>
                                <a href="<?= url('/memberSpace') ?>"
                                   class="<?php if ($_SERVER['REQUEST_URI'] === '/index.php/memberSpace') : ?>active<?php endif ?>">Mon
                                    Espace</a>
                            </li>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'admin'): ?>
                            <li>
                                <a href="<?= url('/admin') ?>"
                                   class="<?php if ($_SERVER['REQUEST_URI'] === '/index.php/admin') : ?>active<?php endif ?>">Page
                                    admin</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <div class="flex-gap">
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'member'): ?>
                        <a href="<?= url('/update') ?>?id=<?= htmlentities($_SESSION['user_id']) ?>"
                           class="<?php if ($_SERVER['REQUEST_URI'] === '/index.php/update') : ?>active<?php endif ?>">Modifier
                            mon Profil</a>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="<?= url('/logout') ?>">Se déconnecter</a>
                    <?php else: ?>
                        <a href="<?= url('/login') ?>"
                           class="<?php if ($_SERVER['REQUEST_URI'] === '/index.php/login') : ?>active<?php endif ?>">Se
                            connecter / S'inscrire</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="logo">
            <img src="../../../public/img/Logo.webp" alt="Logo">
        </div>
        <div class="custom-shape-divider-bottom-1655304999">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                 preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z"
                      class="shape-fill"></path>
            </svg>
        </div>
    </section>
</header>

<!--le corp de la page sera injecté en fonction de la page observée-->
<main>
    <?php require $template . '.php' ?>
</main>

<footer>
    <section>
        <svg fill="#ffffff" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
             preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"></path>
        </svg>
        <div>
            <p>Lien vers les réseaux :</p>
            <a href="https://twitter.com/r0kk3nn" target="_blank">
                <svg class="cls-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                     id="Capa_1"
                     x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                     xml:space="preserve"
                     height="25px">
                    <g>
                        <g>
                            <g>
                                <path d="M512,97.248c-19.04,8.352-39.328,13.888-60.48,16.576c21.76-12.992,38.368-33.408,46.176-58.016    c-20.288,12.096-42.688,20.64-66.56,25.408C411.872,60.704,384.416,48,354.464,48c-58.112,0-104.896,47.168-104.896,104.992    c0,8.32,0.704,16.32,2.432,23.936c-87.264-4.256-164.48-46.08-216.352-109.792c-9.056,15.712-14.368,33.696-14.368,53.056    c0,36.352,18.72,68.576,46.624,87.232c-16.864-0.32-33.408-5.216-47.424-12.928c0,0.32,0,0.736,0,1.152    c0,51.008,36.384,93.376,84.096,103.136c-8.544,2.336-17.856,3.456-27.52,3.456c-6.72,0-13.504-0.384-19.872-1.792    c13.6,41.568,52.192,72.128,98.08,73.12c-35.712,27.936-81.056,44.768-130.144,44.768c-8.608,0-16.864-0.384-25.12-1.44    C46.496,446.88,101.6,464,161.024,464c193.152,0,298.752-160,298.752-298.688c0-4.64-0.16-9.12-0.384-13.568    C480.224,136.96,497.728,118.496,512,97.248z"
                                      data-original="#000000" class="active-path" data-old_color="#000000"/>
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
            <a href="https://www.facebook.com/nicolas.gracia.16" target="_blank">
                <svg class="cls-2" xmlns="http://www.w3.org/2000/svg" height="25px"
                     viewBox="88.428 12.828 107.543 207.085">
                    <path d="M158.232 219.912v-94.461h31.707l4.747-36.813h-36.454V65.134c0-10.658 2.96-17.922 18.245-17.922l19.494-.009V14.278c-3.373-.447-14.944-1.449-28.406-1.449-28.106 0-47.348 17.155-47.348 48.661v27.149H88.428v36.813h31.788v94.461l38.016-.001z"/>
                </svg>
            </a>
        </div>
        <div>
            <a href="<?= url('/condition') ?>"
               class="<?php if ($_SERVER['REQUEST_URI'] === '/index.php/condition') : ?>active<?php endif ?>">Condition
                Générales</a>
        </div>
    </section>
</footer>
</body>
</html>
<?php var_dump($_SERVER['REQUEST_URI']);?>
