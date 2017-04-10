<?php
session_start();

//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['id'])){
    header("Location:login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Simplify Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- ionicons -->
    <link href="css/ionicons.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="css/datepicker.css" rel="stylesheet"/>

    <!-- Owl Carousel -->
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <!-- Simplify -->
    <link href="css/simplify.min.css" rel="stylesheet">

</head>

<body class="overflow-hidden">
<div class="wrapper preload">
    <div class="sidebar-right">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="sidebar-header clearfix">
                <input class="form-control dark-input" placeholder="Search" type="text">
                <div class="btn-group pull-right">
                    <a href="#" class="sidebar-setting" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                    <ul class="dropdown-menu pull-right flipInV">
                        <li><a href="#"><i class="fa fa-circle text-danger"></i><span class="m-left-xs">Busy</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i><span class="m-left-xs">Turn Off Chat</span></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="title-block">
                Group Chat
            </div>
            <div class="content-block">
                <ul class="sidebar-list">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o text-success"></i><span class="m-left-xs">Close Friends</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle-o text-success"></i><span class="m-left-xs">Business</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="title-block">
                Favorites
            </div>
            <div class="content-block">
                <ul class="sidebar-list">
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile2.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    John Doe
                                </div>
                                <div class="chat-message">
                                    Where are you?
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-success"></i>
                            </div>
                            <div class="chat-alert">
                                <span class="badge badge-purple bounceIn animation-delay2">2</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile3.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    Jane Doe
                                </div>
                                <div class="chat-message">
                                    Hello
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-success"></i>
                            </div>
                            <div class="chat-alert">
                                <span class="badge badge-info bounceIn animation-delay2">1</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile4.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    John Doe
                                </div>
                                <div class="chat-message">
                                    See you again next week.
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-danger"></i>
                            </div>
                            <div class="chat-alert">
                                <i class="fa fa-check text-success"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile5.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    John Doe
                                </div>
                                <div class="chat-message">
                                    Hello, Are you there?
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-danger"></i>
                            </div>
                            <div class="chat-alert">
                                <i class="fa fa-reply"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="title-block">
                More friends
            </div>
            <div class="content-block">
                <ul class="sidebar-list">
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile6.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    John Doe
                                </div>
                                <div class="chat-message">
                                    Where are you?
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-success"></i>
                            </div>
                            <div class="chat-alert">
                                <span class="badge badge-success bounceIn animation-delay2">2</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile7.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    Jane Doe
                                </div>
                                <div class="chat-message">
                                    Hello
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-success"></i>
                            </div>
                            <div class="chat-alert">
                                <span class="badge badge-danger bounceIn animation-delay2">1</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile8.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    John Doe
                                </div>
                                <div class="chat-message">
                                    See you again next week.
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-danger"></i>
                            </div>
                            <div class="chat-alert">
                                <i class="fa fa-check text-success"></i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="clearfix">
                            <img src="images/profile/profile9.jpg" class="img-circle" alt="user avatar">
                            <div class="chat-detail m-left-sm">
                                <div class="chat-name">
                                    John Doe
                                </div>
                                <div class="chat-message">
                                    Hello, Are you there?
                                </div>
                            </div>
                            <div class="chat-status">
                                <i class="fa fa-circle-o text-danger"></i>
                            </div>
                            <div class="chat-alert">
                                <i class="fa fa-reply"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div><!-- sidebar-inner -->
    </div><!-- sidebar-right -->
    <header class="top-nav">
        <div class="top-nav-inner">
            <div class="nav-header">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleSM">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav-notification pull-right">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-lg"></i></a>
                        <span class="badge badge-danger bounceIn">1</span>
                        <ul class="dropdown-menu dropdown-sm pull-right">
                            <li class="user-avatar">
                                <img src="images/profile/profile1.jpg" alt="" class="img-circle">
                                <div class="user-content">
                                    <h5 class="no-m-bottom">John Doe</h5>
                                    <div class="m-top-xs">
                                        <a href="profile.html" class="m-right-sm">Profile</a>
                                        <a href="signin.html">Log out</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="inbox.html">
                                    Inbox
                                    <span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Notification
                                    <span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="sidebarRight-toggle">
                                    Message
                                    <span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">Setting</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <a href="index.html" class="brand">
                    <i class="fa fa-database"></i><span class="brand-name">SIMPLIFY ADMIN</span>
                </a>
            </div>
            <div class="nav-container">
                <button type="button" class="navbar-toggle pull-left sidebar-toggle" id="sidebarToggleLG">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav-notification">
                    <li class="search-list">
                        <div class="search-input-wrapper">
                            <div class="search-input">
                                <input type="text" class="form-control input-sm inline-block">
                                <a href="#" class="input-icon text-normal"><i class="ion-ios7-search-strong"></i></a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="pull-right m-right-sm">
                    <div class="user-block hidden-xs">
                        <a href="#" id="userToggle" data-toggle="dropdown">
                            <img src="images/profile/profile1.jpg" alt=""
                                 class="img-circle inline-block user-profile-pic">
                            <div class="user-detail inline-block">
                                Jane Doe
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="panel border dropdown-menu user-panel">
                            <div class="panel-body paddingTB-sm">
                                <ul>
                                    <li>
                                        <a href="profile.html">
                                            <i class="fa fa-edit fa-lg"></i><span class="m-left-xs">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="inbox.html">
                                            <i class="fa fa-inbox fa-lg"></i><span class="m-left-xs">Inboxes</span>
                                            <span class="badge badge-danger bounceIn animation-delay3">2</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="signin.html">
                                            <i class="fa fa-power-off fa-lg"></i><span class="m-left-xs">Sign out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="nav-notification">
                        <li>
                            <a href="#" data-toggle="dropdown"><i class="fa fa-envelope fa-lg"></i></a>
                            <span class="badge badge-purple bounceIn animation-delay5 active">2</span>
                            <ul class="dropdown-menu message pull-right">
                                <li><a>You have 4 new unread messages</a></li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="images/profile/profile2.jpg" alt="User Avatar">
                                        <div class="detail">
                                            <strong>John Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-check text-success"></i> 27m ago
                                            </small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="images/profile/profile3.jpg" alt="User Avatar">
                                        <div class="detail">
                                            <strong>Jane Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-check text-success"></i> 5hr ago
                                            </small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="images/profile/profile4.jpg" alt="User Avatar">
                                        <div class="detail m-left-sm">
                                            <strong>Bill Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-reply"></i> Yesterday</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="clearfix" href="#">
                                        <img src="images/profile/profile5.jpg" alt="User Avatar">
                                        <div class="detail">
                                            <strong>Baby Doe</strong>
                                            <p class="no-margin">
                                                Lorem ipsum dolor sit amet...
                                            </p>
                                            <small class="text-muted"><i class="fa fa-reply"></i> 9 Feb 2013</small>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="#">View all messages</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="dropdown"><i class="fa fa-bell fa-lg"></i></a>
                            <span class="badge badge-info bounceIn animation-delay6 active">4</span>
                            <ul class="dropdown-menu notification dropdown-3 pull-right">
                                <li><a href="#">You have 5 new notifications</a></li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-warning">
													<i class="fa fa-warning"></i>
												</span>
                                        <span class="m-left-xs">Server #2 not responding.</span>
                                        <span class="time text-muted">Just now</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-success">
													<i class="fa fa-plus"></i>
												</span>
                                        <span class="m-left-xs">New user registration.</span>
                                        <span class="time text-muted">2m ago</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-danger">
													<i class="fa fa-bolt"></i>
												</span>
                                        <span class="m-left-xs">Application error.</span>
                                        <span class="time text-muted">5m ago</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-success">
													<i class="fa fa-usd"></i>
												</span>
                                        <span class="m-left-xs">2 items sold.</span>
                                        <span class="time text-muted">1hr ago</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
												<span class="notification-icon bg-success">
													<i class="fa fa-plus"></i>
												</span>
                                        <span class="m-left-xs">New user registration.</span>
                                        <span class="time text-muted">1hr ago</span>
                                    </a>
                                </li>
                                <li><a href="#">View all notifications</a></li>
                            </ul>
                        </li>
                        <li class="chat-notification">
                            <a href="#" class="sidebarRight-toggle"><i class="fa fa-comments fa-lg"></i></a>
                            <span class="badge badge-danger bounceIn">1</span>

                            <div class="chat-alert">
                                Hello, Are you there?
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- ./top-nav-inner -->
    </header>
    <aside class="sidebar-menu fixed">
        <div class="sidebar-inner scrollable-sidebar">
            <div class="main-menu">
                <ul class="accordion">
                    <li class="menu-header">
                        Main Menu
                    </li>
                    <li class="bg-palette1">
                        <a href="index.html">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-home fa-lg"></i></span>
										<span class="text m-left-sm">Dashboard</span>
									</span>
                            <span class="menu-content-hover block">
										Home
									</span>
                        </a>
                    </li>
                    <li class="bg-palette2">
                        <a href="landing/landing.html">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-desktop fa-lg"></i></span>
										<span class="text m-left-sm">Landing</span>
									</span>
                            <span class="menu-content-hover block">
										Landing
									</span>
                        </a>
                    </li>
                    <li class="openable bg-palette3">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-list fa-lg"></i></span>
										<span class="text m-left-sm">Form Elements</span>
										<span class="submenu-icon"></span>
									</span>
                            <span class="menu-content-hover block">
										Form
									</span>
                        </a>
                        <ul class="submenu bg-palette4">
                            <li><a href="form_element.html"><span class="submenu-label">Form Element</span></a></li>
                            <li><a href="form_validation.html"><span class="submenu-label">Form Validation</span></a>
                            </li>
                            <li><a href="form_wizard.html"><span class="submenu-label">Form Wizard</span></a></li>
                            <li><a href="dropzone.html"><span class="submenu-label">Dropzone</span></a></li>
                        </ul>
                    </li>
                    <li class="openable bg-palette4">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-tags fa-lg"></i></span>
										<span class="text m-left-sm">UI Elements</span>
										<span class="submenu-icon"></span>
									</span>
                            <span class="menu-content-hover block">
										UI Kits
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="ui_element.html"><span class="submenu-label">Basic Elements</span></a></li>
                            <li><a href="button.html"><span class="submenu-label">Button & Icons</span></a></li>
                            <li class="openable">
                                <a href="#">
                                    <small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right">
                                        2
                                    </small>
                                    <span class="submenu-label">Tables</span>
                                </a>
                                <ul class="submenu third-level">
                                    <li><a href="static_table.html"><span class="submenu-label">Static Table</span></a>
                                    </li>
                                    <li><a href="datatable.html"><span class="submenu-label">DataTables</span></a></li>
                                </ul>
                            </li>
                            <li><a href="widget.html"><span class="submenu-label">Widget</span></a></li>
                            <li><a href="tab.html"><span class="submenu-label">Tab</span></a></li>
                            <li><a href="calendar.html"><span class="submenu-label">Calendar</span></a></li>
                            <li><a href="treeview.html"><span class="submenu-label">Treeview</span></a></li>
                            <li><a href="nestable_list.html"><span class="submenu-label">Nestable Lists</span></a></li>
                        </ul>
                    </li>
                    <li class="bg-palette1">
                        <a href="inbox.html">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-envelope fa-lg"></i></span>
										<span class="text m-left-sm">Inboxs</span>
										<small class="badge badge-danger badge-square bounceIn animation-delay5 m-left-xs">5</small>
									</span>
                            <span class="menu-content-hover block">
										Inboxs
									</span>
                        </a>
                    </li>
                    <li class="bg-palette2">
                        <a href="timeline.html">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-clock-o fa-lg"></i></span>
										<span class="text m-left-sm">Timeline</span>
										<small class="badge badge-warning badge-square bounceIn animation-delay6 m-left-xs pull-right">7</small>
									</span>
                            <span class="menu-content-hover block">
										Timeline
									</span>
                        </a>
                    </li>
                    <li class="menu-header">
                        Others
                    </li>
                    <li class="openable bg-palette3 open">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-gift fa-lg"></i></span>
										<span class="text m-left-sm">Extra Pages</span>
										<span class="submenu-icon"></span>
									</span>
                            <span class="menu-content-hover block">
										Pages
									</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="signin.html"><span class="submenu-label">Sign in</span></a></li>
                            <li><a href="sign_up.html"><span class="submenu-label">Sign Up</span></a></li>
                            <li><a href="lockscreen.html"><span class="submenu-label">Lock Screen</span></a></li>
                            <li class="active"><a href="profile.html"><span class="submenu-label">Profile</span></a>
                            </li>
                            <li><a href="gallery.html"><span class="submenu-label">Gallery</span></a></li>
                            <li><a href="blog.html"><span class="submenu-label">Blog</span></a></li>
                            <li><a href="single_post.html"><span class="submenu-label">Single Post</span></a></li>
                            <li><a href="pricing.html"><span class="submenu-label">Pricing</span></a></li>
                            <li><a href="invoice.html"><span class="submenu-label">Invoice</span></a></li>
                            <li><a href="error404.html"><span class="submenu-label">Error404</span></a></li>
                            <li><a href="blank.html"><span class="submenu-label">Blank</span></a></li>
                        </ul>
                    </li>
                    <li class="openable bg-palette4">
                        <a href="#">
									<span class="menu-content block">
										<span class="menu-icon"><i class="block fa fa-list fa-lg"></i></span>
										<span class="text m-left-sm">Menu Level</span>
										<span class="submenu-icon"></span>
									</span>
                            <span class="menu-content-hover block">
										Menu
									</span>
                        </a>
                        <ul class="submenu">
                            <li class="openable">
                                <a href="signin.html">
                                    <span class="submenu-label">menu 2.1</span>
                                    <small class="badge badge-success badge-square bounceIn animation-delay2 m-left-xs pull-right">
                                        3
                                    </small>
                                </a>
                                <ul class="submenu third-level">
                                    <li><a href="#"><span class="submenu-label">menu 3.1</span></a></li>
                                    <li><a href="#"><span class="submenu-label">menu 3.2</span></a></li>
                                    <li class="openable">
                                        <a href="#">
                                            <span class="submenu-label">menu 3.3</span>
                                            <small class="badge badge-danger badge-square bounceIn animation-delay2 m-left-xs pull-right">
                                                2
                                            </small>
                                        </a>
                                        <ul class="submenu fourth-level">
                                            <li><a href="#"><span class="submenu-label">menu 4.1</span></a></li>
                                            <li><a href="#"><span class="submenu-label">menu 4.2</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><span class="submenu-label">menu 2.2</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="sidebar-fix-bottom clearfix">
                <div class="user-dropdown dropup pull-left">
                    <a href="#" class="dropdwon-toggle font-18" data-toggle="dropdown"><i class="ion-person-add"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="inbox.html">
                                Inbox
                                <span class="badge badge-danger bounceIn animation-delay2 pull-right">1</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Notification
                                <span class="badge badge-purple bounceIn animation-delay3 pull-right">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="sidebarRight-toggle">
                                Message
                                <span class="badge badge-success bounceIn animation-delay4 pull-right">7</span>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Setting</a>
                        </li>
                    </ul>
                </div>
                <a href="lockscreen.html" class="pull-right font-18"><i class="ion-log-out"></i></a>
            </div>
        </div><!-- sidebar-inner -->
    </aside>

    <div class="main-container">
        <div class="padding-md">
            <h3 class="header-text m-bottom-md">
                我的主页

            </h3>

            <div class="row user-profile-wrapper">
                <div class="col-md-3 user-profile-sidebar m-bottom-md">
                    <div class="row">
                        <div class="col-sm-4 col-md-12">
                            <div class="user-profile-pic">
                                <div class="image image-full" id="l_avatar"></div>
                                <div class="ribbon-wrapper">

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12" style="font-size: 1.5rem">
                            <div class="user-name m-top-sm" id="l_name"></div>

                            <div class="m-top-sm">
                                <a id="l_location">

                                </a>

                                <div class="m-top-sm" id="l_job">

                                </div>

                                <div class="m-top-sm" id="l_email">

                                </div>
                            </div>


                            <h4 class="m-top-md m-bottom-sm">关于我</h4>
                            <p class="m-top-sm" id="l_profile">

                            <p>


                        </div>
                    </div><!-- ./row -->
                </div><!-- ./col -->
                <div class="col-md-9">
                    <div class="smart-widget">
                        <div class="smart-widget-inner">
                            <ul class="nav nav-tabs tab-style2 tab-right bg-grey">
                                <li>
                                    <a href="#profileTab3" data-toggle="tab">
                                        <span class="icon-wrapper"><i class="fa fa-eye"></i></span>
                                        <span class="text-wrapper">我的关注</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#profileTab2" data-toggle="tab">
                                        <span class="icon-wrapper"><i class="fa fa-book"></i></span>
                                        <span class="text-wrapper">修改信息</span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#profileTab1" data-toggle="tab">
                                        <span class="icon-wrapper"><i class="fa fa-trophy"></i></span>
                                        <span class="text-wrapper">社交主页</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="smart-widget-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="profileTab1">
                                        <h4 class="header-text m-bottom-md">
                                            我的运动
                                        </h4>
                                        <div class="row" style="font-size: 1.5rem">
                                            <div class="col-sm-3 col-sm-6s">
                                                <div class="widget-stat3 bg-danger">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-fire fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">燃烧卡路里</div>
                                                    <div class="text-center" id="t_calorie"></div>
                                                </div>
                                            </div><!-- ./col -->
                                            <div class="col-sm-3 col-sm-6s">
                                                <div class="widget-stat3 bg-warning">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-retweet fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">运动总步数</div>
                                                    <div class="text-center" id="t_steps"></div>
                                                </div>
                                            </div><!-- ./col -->
                                            <div class="col-sm-3 col-sms-6">
                                                <div class="widget-stat3 bg-info">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-location-arrow fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">运动总距离</div>
                                                    <div class="text-center" id="t_miles"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 col-sm-6s">
                                                <div class="widget-stat3 bg-primary">
                                                    <div class="widget-stat-icon">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="text-upper">运动总天数</div>
                                                    <div class="text-center" id="t_days"></div>
                                                </div>
                                            </div>
                                        </div><!-- ./row -->

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h4 class="m-top-md">我的活动</h4>

                                                <div class="row m-top-md">
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-primary">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-circle-o fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">参加的活动</div>
                                                            <div class="text-center" id="a_join"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-info">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-spinner fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">进行的活动</div>
                                                            <div class="text-center" id="a_uncomplete"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                </div>
                                            </div><!-- ./col -->
                                            <div class="col-lg-6">
                                                <h4 class="m-top-md">朋友圈</h4>

                                                <div class="row m-top-md">
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-primary">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-users fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">好友数</div>
                                                            <div class="text-center" id="w_number"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                    <div class="col-sm-6">
                                                        <div class="widget-stat3 bg-info">
                                                            <div class="widget-stat-icon">
                                                                <i class="fa fa-signal fa-3x"></i>
                                                            </div>
                                                            <div class="text-upper">朋友圈排名</div>
                                                            <div class="text-center" id="w_rank"></div>
                                                        </div>
                                                    </div><!-- ./col -->
                                                </div>
                                                <div class="panel panel-default m-top-md">
                                                    <div class="panel-heading">
                                                        <i class="fa fa-twitter"></i> 周排名
                                                    </div>
                                                    <ul class="list-group" id="friend_rank">

                                                    </ul><!-- /list-group -->
                                                </div><!-- ./panel -->


                                            </div><!-- ./col -->
                                        </div><!-- ./row -->
                                    </div><!-- ./tab-pane -->
                                    <div class="tab-pane fade" id="profileTab2" style="height: 800px">
                                        <h4 class="header-text m-top-md">个人资料</h4>
                                        <form class="form-horizontal m-top-md">

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">昵称&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="name" id="name" type="text" class="form-control"
                                                           value="唐纳德·特朗普" readonly="readonly" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">id&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="uid" id="uid" type="text" class="form-control"
                                                           value="user0" readonly="readonly" style="width: 60%">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">等级&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="level" id="level" type="number" class="form-control"
                                                           value="" style="width: 60%" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">经验&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="exp" id="exp" type="number" class="form-control"
                                                           value="" style="width: 60%" readonly="readonly">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">电子邮箱</label>
                                                <div class="col-sm-9">
                                                    <input name="email" id="email" type="text" class="form-control"
                                                           value="" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">地址&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="location" id="location" type="text"
                                                           class="form-control"
                                                           value="" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">职业&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <input name="job" id="job" type="text" class="form-control"
                                                           value="" style="width: 60%">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">简介&ensp;&ensp;&ensp;&ensp;</label>
                                                <div class="col-sm-9">
                                                    <textarea name="profile" id="profile" rows="3" class="form-control"
                                                              placeholder="make America great again!"
                                                              style="width: 60%"></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group m-top-lg">
                                                <label class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9">
                                                    <button class="btn btn-info m-left-xs" id="submit1">保存</button>
                                                </div>
                                            </div>
                                        </form>
                                        <h4 class="header-text m-top-md">设置头像</h4>
                                        <form class="form-horizontal m-top-md" id="uploadForm">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">上传头像</label>
                                                <div class="col-sm-9">

                                                    <input name="avatar" id="avatar" type="file"
                                                           class="form-control"
                                                           value="" style="width: 60%;">
                                                    <br><br>
                                                    <div class="form-group">
                                                        <div class="col-sm-9">
                                                            <button name="submit" class="btn btn-info m-left-xs" onclick="doUpload()">上传</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div><!-- ./tab-pane -->
                                    <div class="tab-pane fade" id="profileTab3">
                                        <div class="profile-follower-list clearfix">
                                            <ul id="following_list">


                                            </ul>
                                        </div><!-- ./profile-follower-list -->
                                    </div><!-- ./tab-pane -->
                                </div><!-- ./tab-content -->
                            </div><!-- ./smart-widget-body -->
                        </div><!-- ./smart-widget-inner -->
                    </div><!-- ./smart-widget -->
                </div>
            </div>
        </div><!-- ./padding-md -->
    </div><!-- /main-container -->
</div><!-- /wrapper -->

<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src="js/jquery-1.11.1.min.js"></script>

<!-- Bootstrap -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<!-- Slimscroll -->
<script src='js/jquery.slimscroll.min.js'></script>

<!-- Popup Overlay -->
<script src='js/jquery.popupoverlay.min.js'></script>

<!-- Easy Pie Chart -->
<script src='js/jquery.easypiechart.min.js'></script>

<!-- Owl Carousel -->
<script src='js/owl.carousel.min.js'></script>

<!-- Datepicker -->
<script src='js/uncompressed/datepicker.js'></script>

<!-- Modernizr -->
<script src='js/modernizr.min.js'></script>

<!-- Simplify -->
<script src="js/simplify/simplify.js"></script>

<script>
    $(function () {
        $('.chart-skill-red').easyPieChart({
            barColor: '#fc8675',
            lineWidth: '5'
        });

        $('.chart-skill-blue').easyPieChart({
            barColor: '#65C3DF',
            lineWidth: '5'
        });

        $('.chart-skill-green').easyPieChart({
            barColor: '#1dc499',
            lineWidth: '5'
        });

        $('.chart-skill-purple').easyPieChart({
            barColor: '#a48ad4',
            lineWidth: '5'
        });
    });
</script>
<script>
    $.ajax("/api/user/"+id+"/following/", {
        type: 'GET',
        async: false,
        datatype: 'json',
        success: function (result) {

            data = JSON.parse(result);
            for (i = 0; i < data.length; i++) {
                $.ajax("/api/user/" + data[i].id, {
                    type: 'GET',
                    async: false,
                    datatype: 'json',
                    success: function (td) {
                        temp = JSON.parse(td);
                        var tb = "<li>" + "<div class=\"panel panel-default clearfix\">" +
                            "<div class=\"panel-body\"> <div class=\"user-wrapper\"> <div class=\"user-avatar\"> <img class=\"small-img img-circle img-thumbnail\" src="+temp.avatar+ "alt=\"\"> </div> <div class=\"user-detail small-img\">" +
                            "<div class=\"font-16\">" + temp.name + "</div>" +
                            "<small class=\"block text-muted font-12\">" + temp.job + "</small>" +
                            "<div class=\"m-top-sm\">" +

                            "<button type=\"button\" class=\"btn btn-info m-left-xs\" data-toggle=\"modal\"><a href=\"user_specific.php?uid="+ temp.id + "\" style='color: inherit'>进入首页</a></button>" +
                            "</div> </div> </div> </div> </div>" + "</li>";
                        $("#following_list").append(tb);
                    }
                });
            }

        }
    });
</script>
<script>
    $.ajax("/api/user/"+id, {
        type: 'GET',
        async: false,
        datatype: 'json',
        success: function (result) {

            data = JSON.parse(result);
            $("#name").val(data.name);
            $("#uid").val(data.id);
            $("#level").val(data.level);
            $("#exp").val(data.exp);
            $("#email").val(data.email);
            $("#profile").val(data.profile);
            $("#job").val(data.job);
            $("#location").val(data.location);
            $("#l_name").append(data.name + "<i class=\"fa fa-circle text-success m-left-xs font-14\"></i>");
            $("#l_email").append("<i class=\"fa fa-external-link user-profile-icon\"></i>" + data.email);
            $("#l_profile").append(data.profile);
            $("#l_job").append("<i class=\"fa fa-briefcase user-profile-icon\"></i>" + data.job);
            $("#l_location").append("<i class=\"fa fa-map-marker user-profile-icon\" ></i>" + data.location);
            $('#l_avatar').append("<img src="+data.avatar+">");

        }
    });
    $("#submit1").on("click", function () {
        em = $("#email").val();
        pro = $("#profile").val();
        jo = $("#job").val();
        locatio = $("#location").val();
        val = {
            email: em,
            profile: pro,
            job: jo,
            location: locatio
        };
        $.ajax("/api/user/"+id, {
            type: 'PUT',
            async: false,
            data: val,
            success: function (result) {
                alert("更新成功");
                window.location.href = "profile_new.php";
            }
        });
    });
    function doUpload() {
        var formData = new FormData($( "#uploadForm" )[0]);
        $.ajax({
            url: '/api/user/'+id+'/avatar/' ,
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
                alert(returndata);
            },
            error: function (returndata) {
                alert(returndata);
            }
        });
    }
</script>
<script>
    id = $("#id").text();
    $.ajax("/api/user/"+id+"/sport_record_total", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#t_steps").html(data.t_steps);
            $("#t_miles").html(data.t_miles);
            $("#t_calorie").html(data.t_calorie);
        }
    });
    $.ajax("/api/user/"+id+"/sport_days", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#t_days").html(data.t_days);
        }
    });
    $.ajax("/api/user/"+id+"/activity_todo/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#a_uncomplete").html(data.length);
        }
    });
    $.ajax("/api/user/"+id+"/activity/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#a_join").html(data.length);
        }
    });
    $.ajax("/api/user/"+id+"/following/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            $("#w_number").html(data.length);
        }
    });
    $.ajax("/api/user/"+id+"/weekly_rank/", {
        type: 'GET',
        datatype: 'json',
        success: function (result) {
            data = JSON.parse(result);
            for (i = 0; i < data.length; i++) {
                var td = "<li><p>" +
                    data.id + "</p></li>";
                $("#friend_rank").append(td);
            }
            if (data.length == 0) {
                $("#w_rank").html(1);
            } else {

                $.ajax("/api/user/"+id+"/sport_record_weekly", {
                    type: 'GET',
                    datatype: 'json',
                    success: function (result) {
                        data1 = JSON.parse(result);
                        rank = 1;
                        for (i = 0; i < data.length; i++) {
                            if (data[i].w_steps > data1.w_steps) {
                                rank++;
                            }
                        }
                        $("#w_rank").html(rank);
                    }
                });
            }
        }
    });
</script>
</body>
</html>
