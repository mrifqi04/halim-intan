<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center my-5" href="/dashboard">
                {{-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
                <img src="{{ URL::asset('img/Nissan.png') }}" width="150px" alt="">
            </a>
            <div class="sidebar-brand d-flex align-items-center justify-content-center my-2">
                <span class="text-light">PT. INTAN HALIM JAKARTA</span>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @php
            $role = Auth::user()->role_id;
            @endphp

            <li class="nav-item">
                <a class="nav-link ml-4" href="/dashboard">
                    <span>Home</span></a>
            </li>
            @if ($role == 1 || $role == 2|| $role == 3)
            <li class="nav-item">
                <a class="nav-link ml-4" href="{{ route('jadwals.index') }}">
                    <span>Jadwal</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="{{ route('fuses.index') }}">
                    <span>FUS</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="{{ route('services.index') }}">
                    <span>Service</span></a>
            </li>
            @endif

            @if ($role == 1 || $role == 3)
            <li class="nav-item">
                <a class="nav-link ml-4" href="{{ route('validasi.index') }}">
                    <span>Validasi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="/summary">
                    <span>Summary</span></a>
            </li>
            @endif

            @if ($role == 4 || $role == 5)
            <li class="nav-item">
                <a class="nav-link ml-4" href="{{ route('validasi.index') }}">
                    <span>Validasi</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link ml-4" href="{{ route('services.index') }}">
                    <span>Service</span></a>
            </li>
            @endif

            @if ($role == 1 || $role == 3)
            <li class="nav-item">
                <a class="nav-link ml-4" href="{{ route('users.index') }}">
                    <span>Users</span></a>
            </li>            
            @endif


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        @if (Auth::user()->role_id == 2)
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter"><span
                                        id="get-total-notif">0</span></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown" style="max-height: 400px; overflow-y: scroll; ">
                                <div class="row">
                                    <h6 class="dropdown-header col-md-6">
                                        Notifications Center
                                    </h6>
                                    <h6 class="dropdown-header col-md-6 text-right" id="read-notif"
                                        style="cursor: pointer">
                                        Read All
                                    </h6>
                                </div>
                                <div id="all-notifications">
                                    <a class="dropdown-item text-center p-3">
                                        <h4 class="text-muted">Tidak ada notifikasi</h4>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endif

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name
                                    }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ URL::asset('admin/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.index' ) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Page Heading -->
                <div class="container-fluid">

                    @yield('content')

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">??</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {!! Form::open([
                    'url' => '/logout'
                    ]) !!}
                    <button class="btn btn-primary" href="login.html">Logout</butt>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('admin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ URL::asset('admin/js/demo/chart-pie-demo.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js">
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>

    <script>
        $(document).ready(function() {
            check_jadwals()
            get_notification()
        })

        function get_notification()
        {
            $.ajax({
                url: '/get-notifikasi',                
                dataType: 'json',                                     
                cache: false,
                success: function(res) { 
                    var len = 0
                    len = res.length;                                                          
                    if (len > 0) {
                        let data = ''
                        res.forEach((item) => {
                            const monthNames = ["January", "February", "March", "April", "May", "June",
                                "July", "August", "September", "October", "November", "December"
                            ];
                            var formattedDate = new Date(item.created_at);
                            var d = formattedDate.getDate();
                            let m =  formattedDate.getMonth();
                              // JavaScript months are 0-11
                            var y = formattedDate.getFullYear();
                            data += `<a class="dropdown-item d-flex align-items-center" data-id="${item.id}" id="notifikasi-item">
                                            <div class="mr-3">
                                                <div class="icon-circle bg-warning">
                                                    <i class="fas fa-exclamation-triangle text-white"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="small text-gray-500">${monthNames[m]} ${d}, ${y}</div>
                                                No Polisi : ${item.no_polisi} <br>
                                                Model : ${item.model} <br>
                                                Customer : ${item.nama_customer}, ${item.alamat} <br>
                                                ${item.no_telp}
                                            </div>
                                        </a>`
                        });
                        $("#all-notifications").html(data)
                        $("#get-total-notif").html(`${len}`)
                    }                
                }
            })
        }

        $("#read-notif").on('click', function() {
            $.ajax({
                url: '/read-notifikasi',    
                method: 'post',         
                dataType: 'json',                                     
                cache: false,
                success: function(res) { 
                    document.location.reload();    
                }                
            })
            location.reload()
        })

        function check_jadwals()
        {
            $.ajax({
                url: '/check-jadwals',    
                method: 'post',         
                dataType: 'json',                                     
                cache: false,
                success: function(res) { 
                    
                }                
            })            
        }
    </script>

    @yield('script')
    @include('sweetalert::alert')

</body>

</html>