<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 06:39:36 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('backend/demo/sales-html/img/logo.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/css/bootstrap.min.css') }}" />
    <!-- themefy CSS -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/themefy_icon/themify-icons.css') }}" />
    <!-- select2 CSS -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/niceselect/css/nice-select.css') }}" />
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/owl_carousel/css/owl.carousel.css') }}" />
    <!-- gijgo css -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/gijgo/gijgo.min.css') }}" />
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/tagsinput/tagsinput.css') }}" />

    <!-- date picker -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/datepicker/date-picker.css') }}" />

    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/vectormap-home/vectormap-2.0.2.css') }}" />

    <!-- scrollabe  -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/scroll/scrollable.css') }}" />
    <!-- datatable CSS -->
    <link rel="stylesheet"
        href="{{ asset('backend/demo/sales-html/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/demo/sales-html/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('backend/demo/sales-html/vendors/datatable/css/buttons.dataTables.min.css') }}" />
    <!-- text editor css -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/text_editor/summernote-bs4.css') }}" />
    <!-- morris css -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/morris/morris.css') }}">
    <!-- metarial icon css -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/vendors/material_icon/material-icons.css') }}" />

    <!-- menu css  -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/css/metisMenu.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/demo/sales-html/css/colors/default.css') }}" id="colorSkinCSS">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
     alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('ckeditor\plugins\codesnippet\lib\highlight\styles\default.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body class="crm_body_bg">



    <!-- main content part here -->

    <!-- sidebar  -->
    <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
        <div class="logo d-flex justify-content-between">
            <a href="index-2.html"><img src="{{ asset('backend/demo/sales-html/img/1.png') }}" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="mm-active">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/dashboard.svg') }}" alt="">
                    </div>
                    <span>Category</span>
                </a>
                <ul>
                    <li><a class="active" href="{{ route('categories.create') }}">Create</a></li>
                    <li><a href="{{ route('categories.index') }}">Category List</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/2.svg') }}" alt="">
                    </div>
                    <span>Blog</span>
                </a>
                <ul>
                    <li><a href="{{ route('blogs.index') }}">Blog List</a></li>
                    <li><a href="{{ route('blogs.create') }}">Create Blog</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/3.svg') }}" alt="">
                    </div>
                    <span>Toy</span>
                </a>
                <ul>
                    <li><a href="{{ route('toys.index') }}">Toy List</a></li>
                    <li><a href="{{ route('toys.create') }}">Create Toy</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/4.svg') }}" alt="">
                    </div>
                    <span>Age</span>
                </a>
                <ul>
                    <li><a href="{{ route('ages.index') }}">Age List</a></li>
                    <li><a href="{{ route('ages.create') }}">Create Age</a></li>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/8.svg') }}" alt="">
                    </div>
                    <span>Course</span>
                </a>
                <ul>
                    <li><a href="{{ route('courses.index') }}">Course List</a></li>
                    <li><a href="{{ route('courses.create') }}">Create Course</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/13.svg') }}" alt="">
                    </div>
                    <span>Lesson</span>
                </a>
                <ul>
                    <li><a href="{{ route('lessons.index') }}">Lesson List</a></li>
                    <li><a href="{{ route('lessons.create') }}">Create Lesson</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/13.svg') }}" alt="">
                    </div>
                    <span>User</span>
                </a>
                <ul>
                    <li><a href="{{ route('users.index') }}">User List</a></li>
                    <li><a href="{{ route('users.index') }}">Update User</a></li>

                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">

                    <div class="icon_menu">
                        <img src="{{ asset('backend/demo/sales-html/img/menu-icon/13.svg') }}" alt="">
                    </div>
                    <span>Day</span>
                </a>
                <ul>
                    <li><a href="{{ route('days.index') }}">Day List</a></li>
                    <li><a href="{{ route('days.create') }}">Create Day</a></li>

                </ul>
            </li>
        </ul>
    </nav>
    <!--/ sidebar  -->


    <section class="main_content dashboard_part large_header_bg">
        <!-- menu  -->
        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-lg-12 p-0 ">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area d-flex align-items-center">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here...">
                                    </div>
                                    <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                                </form>
                            </div>
                            <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="profile_info">
                                <div class="tm-header uk-visible@m" uk-header>
                                    <div class="uk-navbar-container">
                                        <div class="container">
                                            <nav class="uk-navbar" uk-navbar>
                                                <ul>
                                                    @if (!\Illuminate\Support\Facades\Session::has('login'))
                                                        <li class="sp-menu-item"><a href="{{ route('login') }}">Đăng
                                                                nhập</a></li>
                                                    @else
                                                        <li class="sp-menu-item sp-has-child">
                                                            <a href="">
                                                                @if ($user = \Illuminate\Support\Facades\Auth::user())
                                                                    {{ $user->userName }}
                                                                @endif
                                                            </a>
                                                            <div class="sp-dropdown sp-dropdown-main sp-menu-right"
                                                                style="width: 220px;">
                                                                <div class="sp-dropdown-inner">
                                                                    <ul class="sp-dropdown-items">
                                                                        <li class="sp-menu-item"><a
                                                                                href="{{ route('logout') }}">Đăng
                                                                                xuất</a></li>
                                                                        <li class="sp-menu-item"><a
                                                                                href="{{ route('newPassword', $user->id) }}">Đổi
                                                                                mật khẩu</a>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ menu  -->
        <hr>
        <div>
            @yield('content')
        </div>
        <hr>
        <!-- footer part -->
        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2020 © Influence - Designed by <a href="#"> <i class="ti-heart"></i> </a><a href="#">
                                    Dashboard</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer  -->
    <script src="{{ asset('backend/demo/sales-html/js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('backend/demo/sales-html/js/popper.min.js') }}"></script>
    <!-- bootstarp js -->
    <script src="{{ asset('backend/demo/sales-html/js/bootstrap.min.js') }}"></script>
    <!-- sidebar menu  -->
    <script src="{{ asset('backend/demo/sales-html/js/metisMenu.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('backend/demo/sales-html/vendors/count_up/jquery.waypoints.min.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('backend/demo/sales-html/vendors/chartlist/Chart.min.js') }}"></script>
    <!-- counterup js -->
    <script src="{{ asset('backend/demo/sales-html/vendors/count_up/jquery.counterup.min.js') }}"></script>

    <!-- nice select -->
    <script src="{{ asset('backend/demo/sales-html/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('backend/demo/sales-html/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

    <!-- responsive table -->
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datatable/js/buttons.print.min.js') }}"></script>

    <!-- datepicker  -->
    <script src="{{ asset('backend/demo/sales-html/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datepicker/datepicker.en.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/datepicker/datepicker.custom.js') }}"></script>

    <script src="{{ asset('backend/demo/sales-html/js/chart.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/chartjs/roundedBar.min.js') }}"></script>

    <!-- progressbar js -->
    <script src="{{ asset('backend/demo/sales-html/vendors/progressbar/jquery.barfiller.js') }}"></script>
    <!-- tag input -->
    <script src="{{ asset('backend/demo/sales-html/vendors/tagsinput/tagsinput.js') }}"></script>
    <!-- text editor js -->
    <script src="{{ asset('backend/demo/sales-html/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/am_chart/amcharts.js') }}"></script>

    <!-- scrollabe  -->
    <script src="{{ asset('backend/demo/sales-html/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/scroll/scrollable-custom.js') }}"></script>

    <!-- vector map  -->
    <script src="{{ asset('backend/demo/sales-html/vendors/vectormap-home/vectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/vectormap-home/vectormap-world-mill-en.js') }}"></script>

    <!-- apex chrat  -->
    <script src="{{ asset('backend/demo/sales-html/vendors/apex_chart/apex-chart2.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/apex_chart/apex_dashboard.js') }}"></script>

    <script src="{{ asset('backend/demo/sales-html/vendors/echart/echarts.min.js') }}"></script>


    <script src="{{ asset('backend/demo/sales-html/vendors/chart_am/core.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/vendors/chart_am/chart-custom.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('backend/demo/sales-html/js/dashboard_init.js') }}"></script>
    <script src="{{ asset('backend/demo/sales-html/js/custom.js') }}"></script>

    <script>
        @if (Session::has('message'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options =
            {
            "closeButton" : true,
            "progressBar" : true
            }
            toastr.warning("{{ session('warning') }}");
        @endif

    </script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('ckeditor\plugins\codesnippet\lib\highlight\highlight.pack.js') }}"></script>
    <script>
        hljs.initHighlightingOnLoad();

    </script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

    </script>
</body>

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 07:00:38 GMT -->

</html>
