<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-bordered" data-assets-path="../../../../../../assets/" data-template="vertical-menu-template-bordered">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{$title}} Distance-Learning | Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/css/rtl/theme-bordered.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('manager/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/libs/select2/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('manager/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('manager/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/assets/vendor/css/pages/card-analytics.css') }}" />
    <link rel="stylesheet" href="{{ asset('manager/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <!-- Helpers -->
    <script src="{{asset('manager/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('manager/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('manager/assets/js/config.js')}}"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('css')

</head>

<body>

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
    <div class="layout-container">

        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


            <div class="app-brand demo ">
                <a href="{{route('index')}}" class="app-brand-link">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: none!important;">Front Site</span>
                </a>
                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <li class="menu-item {{ activeLiApp('admin', []) }}">
                    <a href="{{route('admin.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i> Home
                    </a>
                </li>
                <br>
                <li class="menu-item {{ activeLiApp('admin', ['/system/field']) }}">
                    <a href="{{route('admin.fields')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i> System Management
                    </a>
                </li>
                <br>
                <li class="menu-item {{ activeLiApp('admin', ['/teachers']) }}">
                    <a href="{{route('admin.teachers')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i> Teachers
                    </a>
                </li>
                <br>
                <li class="menu-item {{ activeLiApp('admin', ['/users']) }}">
                    <a href="{{route('admin.users')}}" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-user"></i> Users
                    </a>
                </li>
            </ul>

        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                    <!-- /Search -->
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="fw-semibold d-block">{{auth()->user()->name}}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" target="_blank" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->


                    </ul>
                </div>


                <!-- Search Small Screens -->
                <div class="navbar-search-wrapper search-input-wrapper  d-none">
                    <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
                    <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                </div>


            </nav>



            <!-- / Navbar -->



            <!-- Content wrapper -->
            <div class="content-wrapper">
            @yield("container-xxl")
            <!-- / Content -->
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{asset('manager/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('manager/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('manager/assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/i18n/i18n.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>

<script src="{{asset('manager/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('manager/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Vendors JS -->
<script src="{{asset('manager/assets/vendor/libs/moment/moment.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables-responsive/datatables.responsive.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables-buttons/datatables-buttons.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/jszip/jszip.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/pdfmake/pdfmake.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables-buttons/buttons.html5.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/datatables-buttons/buttons.print.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/cleavejs/cleave.js')}}"></script>
<script src="{{asset('manager/assets/vendor/libs/cleavejs/cleave-phone.js')}}"></script>

<script src="{{ asset('manager/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.js') }}"></script>

<!-- Main JS -->
<script src="{{asset('manager/assets/js/main.js')}}"></script>

<script src="{{ asset('manager/assets/vendor/libs/datatables-rowgroup/datatables.rowgroup.js') }}"></script>
<script src="{{ asset('manager/assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('manager/assets/js/dashboards-ecommerce.js')}}"></script>
<script src="{{ asset('manager/assets/js/tables-datatables-basic.js') }}"></script>

<script>
    var stockage = localStorage;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('js')

</body>
</html>
