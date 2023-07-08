<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Casa de Reposo Vida de Paz</title>
    <link rel="icon" href="<?php echo base_url; ?>Assets/img/logo.jpeg" type="image/png">
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" />
    <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    <link href="<?php echo base_url; ?>Assets/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo base_url; ?>Pacientes">Vida de Paz</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">Cerrar Sesion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- Botones para los modulos -->
                        <a class="nav-link" href="<?php echo base_url; ?>Pacientes"> Pacientes</a>
                        <a class="nav-link" href="<?php echo base_url; ?>Familiares"> Familiares</a>
                        <a class="nav-link" href="<?php echo base_url; ?>Visitas"> Visitas</a>
                        <a class="nav-link" href="<?php echo base_url; ?>Enfermeras"> Enfermeras</a>
                        <a class="nav-link" href="<?php echo base_url; ?>Diagnostico"> Diagnostico</a>
                        <!-- Botones para los modulos -->

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                            Configuración
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Usuarios"><i class="fas fa-user mr-2"></i> Usuarios</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Cajas</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Clientes"><i class="fas fa-users"></i>Clientes</a>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <img class="img-thumbnail" src="<?php echo base_url; ?>Assets/img/logo.jpeg" alt="Logo de la empresa">

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-2">