<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Test">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard.">
    <meta name="keywords" content="bootstrap 5, admin dashboard, etc.">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Global styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../../dist/css/adminlte.css">

    @stack('styles') {{-- Inclure les styles spécifiques à une page --}}
    <style>
    .sidebar-brand {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 3.5rem;
        padding: 0.8125rem 0.5rem;
        overflow: hidden;
        font-size: 1.25rem;
        white-space: nowrap;
        transition: width 0.3s ease-in-out;
    }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary" style="background-color:WHITE">
    <div class="app-wrapper" style="background-color:white">
        <!--end::Header-->
        <!--begin::Sidebar-->
        <aside class="app-sidebar" data-bs-theme="dark" style="background-color:#012545FF;color:white">

    <div  style="background-color:#FFFFFFFF">
        <center>
           <img src=" {{ asset('assets/logo.png')}}" alt="AdminLTE Logo" width="150px" class="brand-image opacity-75">
</center>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                    <a href="{{ route('statistiques.index') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Tableau de bord</p>
                    </a>
                </li>
            <li class="nav-item">
                    <a href="{{ route('bu.index') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Business Units</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('projets.index') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Projets</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('articles.index') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Stock general</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('caisse.brouillard') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Comptabilité</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ventes.index') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Vente</p>
                    </a>
                </li>
            <li class="nav-item">
                    <a href="{{ route('until') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Utilitaire</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link" style="color:white">
                        <i class="nav-icon bi bi-geo-alt-fill text-white"></i>
                        <p>Accès et Permissions </p>
                    </a>
                </li>
                

            </ul>
        </nav>
    </div>
</aside>

        <main class="app-main" style="background-color:white">
            <div class="app-content-header">
                <!--
                <div class="container-fluid"> 
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </div>
                    </div>
                </div> end::Row-->
            </div>
            <div class="app-content" >
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    @yield('content') {{-- Section pour le contenu principal --}}

                </div>
                <!--end::Container-->
            </div>
        </main>
    </div>

    <!-- Global scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
    <script src="../../dist/js/adminlte.js"></script>

    @stack('scripts') {{-- Inclure les scripts spécifiques à une page --}}
</body>

</html>