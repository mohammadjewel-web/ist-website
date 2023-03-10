<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('admin-assets')}}/vendors/core/core.css">
    <link rel="stylesheet" href="{{asset('admin-assets')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin-assets')}}/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{asset('admin-assets')}}/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin-assets')}}/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('admin-assets')}}/images/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
<div class="main-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="{{route('home')}}" class="sidebar-brand" style="color: #e66702; margin-left: 67px">
                IST
            </a>
        </div>
        <div class="sidebar-body">
            <ul class="nav">
                <li class="nav-item nav-category">Main</li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Website Cantent</li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">User</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('user')}}" class="nav-link">User List</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('trash')}}" class="nav-link">Trash List</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#pages" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="codepen"></i>
                        <span class="link-title">Post Pages</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="pages">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#home" role="button" aria-expanded="false" aria-controls="emails">
                                    <i class="link-icon" data-feather="sliders"></i>
                                    <span class="link-title">Slider Module</span>
                                    <i class="link-arrow" data-feather="chevron-down"></i>
                                </a>
                                <div class="collapse" id="home">
                                    <ul class="nav sub-menu">
                                        <li class="nav-item">
                                            <ul class="nav sub-menu">
                                                <li class="nav-item">
                                                    <a href="{{route('slider')}}" class="nav-link">Slider</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('manage.slider')}}" class="nav-link">Manage Slider</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#about" role="button" aria-expanded="false" aria-controls="emails">
                                    <i class="link-icon" data-feather="info"></i>
                                    <span class="link-title">About Module</span>
                                    <i class="link-arrow" data-feather="chevron-down"></i>
                                </a>
                                <div class="collapse" id="about">
                                    <ul class="nav sub-menu">
                                        <li class="nav-item">
                                            <ul class="nav sub-menu">
                                                <li class="nav-item">
                                                    <a href="{{route('add.about')}}" class="nav-link">About Us</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('manage.about')}}" class="nav-link">Manage About Us</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#Post" role="button" aria-expanded="false" aria-controls="emails">
                                    <i class="link-icon" data-feather="book-open"></i>
                                    <span class="link-title">Blog Module</span>
                                    <i class="link-arrow" data-feather="chevron-down"></i>
                                </a>
                                <div class="collapse" id="Post">
                                    <ul class="nav sub-menu">
                                        <li class="nav-item">
                                            <ul class="nav sub-menu">
                                                <li class="nav-item">
                                                    <a href="{{route('add.post')}}" class="nav-link">Add Blog</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('my.post')}}" class="nav-link">My Blog</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#course" role="button" aria-expanded="false" aria-controls="emails">
                                    <i class="link-icon" data-feather="sunset"></i>
                                    <span class="link-title">Courses Module</span>
                                    <i class="link-arrow" data-feather="chevron-down"></i>
                                </a>
                                <div class="collapse" id="course">
                                    <ul class="nav sub-menu">
                                        <li class="nav-item">
                                            <ul class="nav sub-menu">
                                                <li class="nav-item">
                                                    <a href="{{route('add.courses')}}" class="nav-link">Add Courses</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('manage.courses')}}" class="nav-link">Manage Courses</a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#teacher" role="button" aria-expanded="false" aria-controls="emails">
                                    <i class="link-icon" data-feather="users"></i>
                                    <span class="link-title">Teacher Information Module</span>
                                    <i class="link-arrow" data-feather="chevron-down"></i>
                                </a>
                                <div class="collapse" id="teacher">
                                    <ul class="nav sub-menu">
                                        <li class="nav-item">
                                            <ul class="nav sub-menu">
                                                <li class="nav-item">
                                                    <a href="{{route('add.teacher.information')}}" class="nav-link">Add Teacher Information</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('manage.teacher.information')}}" class="nav-link">Manage Teacher Information</a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#event" role="button" aria-expanded="false" aria-controls="emails">
                                    <i class="link-icon" data-feather="calendar"></i>
                                    <span class="link-title">Event Module</span>
                                    <i class="link-arrow" data-feather="chevron-down"></i>
                                </a>
                                <div class="collapse" id="event">
                                    <ul class="nav sub-menu">
                                        <li class="nav-item">
                                            <ul class="nav sub-menu">
                                                <li class="nav-item">
                                                    <a href="{{route('add.event')}}" class="nav-link">Event</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{route('manage.event')}}" class="nav-link">Manage Events</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#cat" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="align-justify"></i>
                        <span class="link-title">Category</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="cat">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('category')}}" class="nav-link">Add New Category</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#tag" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="tag"></i>
                        <span class="link-title">Tag</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="tag">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('tag')}}" class="nav-link">Add Tag</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#role" role="button" aria-expanded="false" aria-controls="emails">
                        <i class="link-icon" data-feather="user-plus"></i>
                        <span class="link-title">Role Manager</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="role">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{route('role')}}" class="nav-link">Role</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="settings-sidebar">
        <div class="sidebar-body">
            <a href="#" class="settings-sidebar-toggler">
                <i data-feather="settings"></i>
            </a>
            <h6 class="text-muted">Sidebar:</h6>
            <div class="form-group border-bottom">
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight" value="sidebar-light" checked>
                        Light
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark" value="sidebar-dark">
                        Dark
                    </label>
                </div>
            </div>
            <div class="theme-wrapper">
                <h6 class="text-muted mb-2">Light Theme:</h6>
                <a class="theme-item active" href="../../../demo_1/dashboard-one.html">
                    <img src="{{asset('admin-assets')}}/images/screenshots/light.jpg" alt="light theme">
                </a>
                <h6 class="text-muted mb-2">Dark Theme:</h6>
                <a class="theme-item" href="../../../demo_2/dashboard-one.html">
                    <img src="{{asset('admin-assets')}}/images/screenshots/dark.jpg" alt="light theme">
                </a>
            </div>
        </div>
    </nav>
    <!-- partial -->
    <div class="page-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
                <form class="search-form">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-apps">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="grid"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="appsDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">Web Apps</p>
                                <a href="javascript:;" class="text-muted">Edit</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="d-flex align-items-center apps">
                                    <a href="../../pages/apps/chat.html"><i data-feather="message-square" class="icon-lg"></i><p>Chat</p></a>
                                    <a href="../../pages/apps/calendar.html"><i data-feather="calendar" class="icon-lg"></i><p>Calendar</p></a>
                                    <a href="../../pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i><p>Email</p></a>
                                    <a href="../../pages/general/profile.html"><i data-feather="instagram" class="icon-lg"></i><p>Profile</p></a>
                                </div>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-messages">
                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="mail"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messageDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">9 New Messages</p>
                                <a href="javascript:;" class="text-muted">Clear all</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Leonardo Payne</p>
                                            <p class="sub-text text-muted">2 min ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Project status</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Carl Henson</p>
                                            <p class="sub-text text-muted">30 min ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Client meeting</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Jensen Combs</p>
                                            <p class="sub-text text-muted">1 hrs ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Project updates</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Amiah Burton</p>
                                            <p class="sub-text text-muted">2 hrs ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Project deadline</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Yaretzi Mayo</p>
                                            <p class="sub-text text-muted">5 hr ago</p>
                                        </div>
                                        <p class="sub-text text-muted">New record</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-notifications">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell"></i>
                            <div class="indicator">
                                <div class="circle"></div>
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">6 New Notifications</p>
                                <a href="javascript:;" class="text-muted">Clear all</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="user-plus"></i>
                                    </div>
                                    <div class="content">
                                        <p>New customer registered</p>
                                        <p class="sub-text text-muted">2 sec ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="gift"></i>
                                    </div>
                                    <div class="content">
                                        <p>New Order Recieved</p>
                                        <p class="sub-text text-muted">30 min ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="alert-circle"></i>
                                    </div>
                                    <div class="content">
                                        <p>Server Limit Reached!</p>
                                        <p class="sub-text text-muted">1 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="layers"></i>
                                    </div>
                                    <div class="content">
                                        <p>Apps are ready for update</p>
                                        <p class="sub-text text-muted">5 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="download"></i>
                                    </div>
                                    <div class="content">
                                        <p>Download completed</p>
                                        <p class="sub-text text-muted">6 hrs ago</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user()->image == null)
                                <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                            @else
                            <img src="{{asset('admin-assets/user-photo')}}/{{ Auth::user()->image }}" alt="profile">
                            @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">
                                    @if(Auth::user()->image == null)
                                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                                    @else
                                        <img src="{{asset('admin-assets/user-photo')}}/{{ Auth::user()->image }}" alt="profile">
                                    @endif
                                </div>
                                <div class="info text-center">
                                    <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                    <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">
                                    <li class="nav-item">
                                        <a href="../../pages/general/profile.html" class="nav-link">
                                            <i data-feather="user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('profile.edit')}}" class="nav-link">
                                            <i data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:;" class="nav-link">
                                            <i data-feather="repeat"></i>
                                            <span>Switch User</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- partial -->
        <div class="page-content">
            @yield('content')
        </div>
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
            <p class="text-muted text-center text-md-left">Copyright © 2021 <a href="https://www.nobleui.com" target="_blank">IST</a>. All rights reserved</p>
            <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
        </footer>
        <!-- partial -->
    </div>
</div>

<!-- core:js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admin-assets')}}/vendors/core/core.js"></script>
<!-- endinject -->
<!-- plugin js for this page -->
<script src="{{asset('admin-assets')}}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{asset('admin-assets')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>

<!-- end plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin-assets')}}/vendors/feather-icons/feather.min.js"></script>
<script src="{{asset('admin-assets')}}/js/template.js"></script>
<script src="{{asset('admin-assets')}}/js/file-upload.js"></script>
<script src="{{asset('admin-assets')}}/js/data-table.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

@yield('footer_script')

<!-- endinject -->
<!-- custom js for this page -->
<!-- end custom js for this page -->
</body>
</html>
