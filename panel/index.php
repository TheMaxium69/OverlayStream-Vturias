<?php

include_once "../api/class/users.php";
include "../api/function.php";
include "../global/session.php";

if (!empty($_SESSION['userConnected'])){

    // SET USER
    $userSession = $_SESSION['userConnected'];
    $userID = $userSession->id;
    $user = userById($userID);
    if ($user === false){
        exit();
    }

    if (empty($_SESSION['modeStream'])){
        $_SESSION['modeStream'] = "false";
    }

    // TASK
    if (!empty($_GET['task'])){

        $task = $_GET['task'];


        if ($task == "loggout"){
            loggout();
            header("location: index.php");
        }

        if ($task == "changeMDP"){

        }

        if ($task == "modestream"){

            if ($_SESSION['modeStream'] === "true"){
                $_SESSION['modeStream'] = "false";
            }else if ($_SESSION['modeStream'] === "false"){
                $_SESSION['modeStream'] = "true";
            }

        }
    }

    // GENERE TEMPLATE
    if (!empty($_GET['page'])){



//        $page = $_GET['page'];

        if ($_GET['page'] == "home"){

            $page = $_GET['page'];

        } else if ($_GET['page'] == "agenda"){

            $page = $_GET['page'];

        } else  if ($_GET['page'] == "sponso_choose"){

            $page = $_GET['page'];

        } else if ($_GET['page'] == "sponso_overlay"){

            $page = $_GET['page'];

        } else {

            $page = "404";

        }

    } else {
        $page = "home";
    }

} else {

    header("location: ../index.php");

}


//var_dump($_SESSION['modeStream']);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Vturias</title>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
    <link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="../assets/panel.css">

    <link rel="stylesheet" href="../assets/dashboard.css">

</head>
<body>


<!-- partial:index.partial.html -->
<div class="layout has-sidebar fixed-sidebar fixed-header">
    <aside id="sidebar" class="sidebar break-point-sm has-bg-image">
        <a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
        <div class="image-wrapper">
            <img src="assets/images/sidebar-bg.jpg" alt="sidebar background" />
        </div>
        <div class="sidebar-layout">
            <div class="sidebar-header">
                <div class="pro-sidebar-logo">
                    <div><?= substr($user->displayName, 0, 1) ?></div>
                    <h5><?= $user->displayName ?></h5>
                </div>
            </div>
            <div class="sidebar-content">
                <nav class="menu open-current-submenu">
                    <ul>
                        <li class="menu-header"><span> GENERAL </span></li>
                        <li class="menu-item">
                            <a href="?page=home">
                                <span class="menu-icon">
                                  <i class="ri-home-fill"></i>
                                </span>
                                <span class="menu-title">Accueil</span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="?page=agenda">
                                <span class="menu-icon">
                                  <i class="ri-calendar-fill"></i>
                                </span>
                                <span class="menu-title">Planning</span>
                            </a>
                        </li>
                        <li class="menu-item sub-menu">
                            <a href="#">
                                <span class="menu-icon">
                                  <i class="ri-vip-diamond-fill"></i>
                                </span>
                                            <span class="menu-title">Sponsoring</span>
                                            <span class="menu-suffix">
                                  <span class="badge primary">Soon</span>
                                </span>
                            </a>
                            <div class="sub-menu-list">
                                <ul>
                                    <li class="menu-item">
                                        <a href="#">
                                            <span class="menu-title">Explications</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="?page=sponso_choose">
                                            <span class="menu-title">Sponsor</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="?page=sponso_overlay">
                                            <span class="menu-title">Overlays</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item sub-menu">
                            <a href="#">
                    <span class="menu-icon">
                      <i class="ri-link"></i>
                    </span>
                                <span class="menu-title">Ressource</span>
                            </a>
                            <div class="sub-menu-list">
                                <ul>
                                    <li class="menu-item">
                                        <a href="#">
                                            <span class="menu-title">Réseaux Sociaux</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            <span class="menu-title">Assets</span>
                                        </a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">
                                            <span class="menu-title">Overlays</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item sub-menu">
                            <a href="#">
                    <span class="menu-icon">
                     <i class="ri-account-circle-fill"></i>
                    </span>
                                <span class="menu-title">Mon Compte</span>
                            </a>
                            <div class="sub-menu-list">
                                <ul>
                                    <?php if ($_SESSION['modeStream'] === "false"){?>
                                        <li class="menu-item">
                                            <a href="#">
                                                <span class="menu-title">Edit</span>
                                            </a>
                                        </li>
                                    <?php } ?>
                                    <li class="menu-item">
                                        <a href="?task=loggout">
                                            <span class="menu-title">Deconnexion</span>
                                            <span class="badge danger">Alert</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


<!--    OTHER                    -->
                        <li class="menu-header" style="padding-top: 20px"><span> AUTRE </span></li>
                        <li class="menu-item">
                            <a href="?page=<?= $page ?>&task=modestream">
                    <span class="menu-icon">
                      <i class="ri-twitch-fill"></i>
                    </span>
                                <span class="menu-title">Mode Streamer</span>
                                <span class="menu-suffix">
                                <?php if ($_SESSION['modeStream'] == "true"){ ?>

                                    <span class="badge secondary"><i class="ri-eye-off-line"></i></span>

                                <?php } else { ?>

                                    <span class="badge danger"><i class="ri-eye-line"></i></span>

                                <?php } ?>
                    </span>
                            </a>
                        </li>
                        <?php if ($_SESSION['modeStream'] === "false"){?>
                        <li class="menu-item">
                            <a href="#">
                    <span class="menu-icon">
                      <i class="ri-file-lock-fill"></i>
                    </span>
                                <span class="menu-title">Contrat/Terms</span>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="menu-item">
                            <a target="_blank" href="https://tyrolium.fr">
                    <span class="menu-icon">
                      <i class="ri-share-box-fill"></i>
                    </span>
                                <span class="menu-title">Tyrolium</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="sidebar-footer">
                <div class="footer-box">
                    <div>
                        <img
                            class="react-logo"
                            src="https://tyrolium.fr/Contenu/Image/Vturias Site.png"
                            alt="vturias"
                        />
                    </div>
                    <div style="padding: 0 10px">
                <span style="display: block; margin-bottom: 10px"
                >Vous êtes sur la plus grande agence professionnel française de Vtuber
                </span>
                        <div>
                            <a href="?page=reseau">Voir nos réseaux!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <div id="overlay" class="overlay"></div>
    <div class="layout">
        <main class="content">
            <div>
                <a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm" style="color: black">
                    <i class="ri-menu-line ri-xl"></i>
                </a>
            </div>



            <?php require_once  "template/".$page.".phtml" ?>
            <footer class="footer">
                <small style="margin-bottom: 20px; display: inline-block">
                    Copyright © 2024, All Right Reserved<a style="color: unset" target="_blank" href="https://tyrolium.fr"> Tyrolium </a> 💙
                    <br>WebSite Create By Maxime Tournier

                </small>
                <br />
                <div class="social-links">
                    <a href="https://github.com/Tyrolium" target="_blank">
                        <i class="ri-github-fill ri-xl"></i>
                    </a>
                    <a href="https://twitter.com/@TyroliumE" target="_blank">
                        <i class="ri-twitter-fill ri-xl"></i>
                    </a>
                    <a href="https://www.instagram.com/tyroliumentertainment/" target="_blank">
                        <i class="ri-instagram-fill ri-xl"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/tyrolium" target="_blank">
                        <i class="ri-linkedin-box-fill ri-xl"></i>
                    </a>
                </div>
            </footer>
        </main>
        <div class="overlay"></div>
    </div>
</div>



<script src='https://unpkg.com/@popperjs/core@2'></script>
<script src="../assets/dashboard.js"></script>

</body>
</html>

