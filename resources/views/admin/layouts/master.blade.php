<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard analytics - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="dark-layout">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                </div>
                <ul class="nav navbar-nav float-right">
{{--                    <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#" data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a class="dropdown-item" href="#" data-language="fr"><i class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#" data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a class="dropdown-item" href="#" data-language="pt"><i class="flag-icon flag-icon-pt"></i> Portuguese</a></div>--}}
{{--                    </li>--}}
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>

                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon feather icon-bell"></i><span class="badge badge-pill badge-primary badge-up">5</span></a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                        <div class="media-body">
                                            <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-alert-triangle font-medium-5 danger"></i></div>
                                        <div class="media-body">
                                            <h6 class="danger media-heading yellow darken-3">Warning notifixation</h6><small class="notification-text">Server have 99% CPU usage.</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-check-circle font-medium-5 info"></i></div>
                                        <div class="media-body">
                                            <h6 class="info media-heading">Complete the task</h6><small class="notification-text">Cake sesame snaps cupcake</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                                    </div>
                                </a><a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i class="feather icon-file font-medium-5 warning"></i></div>
                                        <div class="media-body">
                                            <h6 class="warning media-heading">Generate monthly report</h6><small class="notification-text">Chocolate cake oat cake tiramisu marzipan</small>
                                        </div><small>
                                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                                    </div>
                                </a></li>
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="javascript:void(0)">Read all notifications</a></li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">John Doe</span><span class="user-status">Available</span></div><span><img class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="auth-login.html"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/xls.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="../../../app-assets/images/icons/doc.png" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
        </a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mx-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template-dark/index.html">
                    <div class="brand-logo">
                        <img src="{{asset('img/logo.png')}}" class="img-thumbnail">
                    </div>
{{--                    <h2 class="brand-text mb-0">Vuexy</h2>--}}
                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content mt-3">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('dashboard'))?'active':''}}"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i><span class="menu-title">Home</span></a> </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title" data-i18n="Ecommerce">Users</span></a>
                <ul class="menu-content">
                    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Shop">users</span></a></li>
                    <li><a href="app-ecommerce-details.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Details">providers</span></a></li>
                    <li><a href="app-ecommerce-wishlist.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Wish List">not activated</span> <span class="badge badge-danger">15</span> </a></li>
                </ul>
            </li>
            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.services.index'))?'active':''}}"><a href="{{route('admin.services.index')}}"><i class="feather icon-codepen"></i><span class="menu-title">Services</span></a> </li>
            <li class=" nav-item {{(\Illuminate\Support\Facades\URL::current() == route('admin.sliders.index'))?'active':''}}"><a href="{{route('admin.sliders.index')}}"><i class="feather icon-play"></i><span class="menu-title" >Slider</span></a> </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
                    @yield('content')
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}}
{{--            <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>--}}
            All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart success"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="../../../app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/tether.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/shepherd.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="../../../app-assets/js/core/app-menu.js"></script>
<script src="../../../app-assets/js/core/app.js"></script>
<script src="../../../app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="../../../app-assets/js/scripts/pages/dashboard-analytics.js"></script>
<script src="../../../app-assets/js/scripts/datatables/datatable.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has('message'))
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: '{{\Illuminate\Support\Facades\Session::get('message')}}',
        showConfirmButton: false,
        timer: 1500
    });
    @endif
    function fireDeleteEvent(id){
        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
                $('#form-'+id).submit();
            }
        })
    }//end fireDeleteEvent
</script>

<!-- END: Page JS-->

<script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.4.3/firebase-messaging.js"></script>


<script>
    // For Firebase JavaScript SDK v7.20.0 and later, `measurementId` is an optional field
    const firebaseConfig = {
        apiKey: "AIzaSyD1D-7yw8o6m3YZNYUTlDF_vrNK0S_tGPM",
        authDomain: "fresh-delight-164317.firebaseapp.com",
        projectId: "fresh-delight-164317",
        storageBucket: "fresh-delight-164317.appspot.com",
        messagingSenderId: "1080870077265",
        appId: "1:1080870077265:web:301ff735db4733d4970970",
        measurementId: "G-TZ5K7K871L"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");
                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token : "+token);
                document.getElementById("token").innerHTML=token;
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }//end IntitalizeFireBaseMessaging

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
            })
    })
    IntitalizeFireBaseMessaging();
</script>
<script src="{{asset('assets/js/scripts.js')}}"></script>

@yield('script')

</body>
<!-- END: Body-->

</html>
