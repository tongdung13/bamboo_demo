<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/regform/colorlib-regform-7/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Apr 2021 07:53:06 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Font Icon -->
    <link rel="stylesheet"
        href="{{ asset('backend/login/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('backend/login/css/style.css') }}">
    {{-- toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-
    alpha/css/bootstrap.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="{{ asset('ckeditor\plugins\codesnippet\lib\highlight\styles\default.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- nav bar --}}
    <link href="{{ asset('frontend/templates/wt_berrykids_pro/css/uikit.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('frontend/templates/wt_berrykids_pro/css/presets/default.css') }}" rel="stylesheet"
        type="text/css" />
    <script src="{{ asset('frontend/media/jui/js/jquery.min7cd4.js?5f8a80a32c1da86a75c46f36fd093a3a') }}"
        type="text/javascript"></script>
    <script src="{{ asset('frontend/media/jui/js/jquery-noconflict7cd4.js?5f8a80a32c1da86a75c46f36fd093a3a') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('frontend/media/jui/js/jquery-migrate.min7cd4.js?5f8a80a32c1da86a75c46f36fd093a3a') }}"
        type="text/javascript">
    </script>
    <script
        src="{{ asset('frontend/media/k2/assets/js/k2.frontend4135.js?v=2.10.3&amp;b=20200429&amp;sitepath=/joomla/wt_berrykids/') }}"
        type="text/javascript"></script>
    <script
        src="{{ asset('frontend/components/com_sppagebuilder/assets/js/sppagebuilder0825.js?0808dd08ad62f5774e5f045e2ce6d08b') }}"
        defer="defer" type="text/javascript"></script>
    <script src="{{ asset('frontend/plugins/sppagebuilder/extra/assets/js/jquery.appear.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('frontend/plugins/sppagebuilder/extra/addons/uicounter/assets/js/jquery.countTo.js') }}"
        type="text/javascript">
    </script>
    <script src="{{ asset('frontend/components/com_speasyimagegallery/assets/js/script-min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('frontend/components/com_speasyimagegallery/assets/js/speasygallery-main.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('frontend/media/com_acym/js/module.minda1f.js?v=730') }}" type="text/javascript"
        defer="defer"></script>
    <script src="{{ asset('frontend/templates/wt_berrykids_pro/js/popper.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('frontend/templates/wt_berrykids_pro/js/bootstrap.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('frontend/templates/wt_berrykids_pro/js/uikit.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/templates/wt_berrykids_pro/js/main.js') }}" type="text/javascript"></script>
    <meta property="og:title" content="Home" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://demo.warptheme.com/joomla/wt_berrykids/" />
    <meta property="og:site_name" content="Joomla Template by WarpTheme" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="Joomla Template by WarpTheme" />
    <script src="{{ asset('frontend/media/system/js/core.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/media/system/js/polyfill.event.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/media/system/js/keepalive.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/media/system/js/punycode.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/media/system/js/validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/media/jui/js/bootstrap.min.js') }}" type="text/javascript"></script>

</head>

<body>
    <nav class="uk-navbar" uk-navbar>

        <div class="uk-navbar-left">
            <a class="uk-navbar-item uk-logo" href="index.html"><img width="150" class="tm-logo"
                    src="{{ asset('frontend/images/warptheme/1.png') }}" alt="BerryKids" /></a>
        </div>

        <div class="uk-navbar-right">


            <div class="sp-megamenu-wrapper">
                <ul class="sp-megamenu-parent menu-animation-none uk-navbar-nav">
                    <li class="sp-menu-item current-item active"><a href="{{ route('frontend.home') }}">Home</a></li>
                    @if (!\Illuminate\Support\Facades\Session::has('login'))
                        <li class="sp-menu-item"><a href="{{ route('login') }}">LogIn</a>
                        @else
                        <li class="sp-menu-item"><a href="{{ route('logout') }}">LogOut</a>
                    @endif


                    </li>

                </ul>
            </div>

            <div class="uk-navbar-item">
                <a class="uk-search-toggle" href="#search-header-modal" uk-search-icon uk-toggle></a>
                <div id="search-header-modal" class="uk-modal-full" uk-modal>
                    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport><button
                            class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                        <div class="uk-search uk-search-large">
                            <form class="uk-search uk-search-large"
                                action="https://demo.warptheme.com/joomla/wt_berrykids/index.php" method="post"><input
                                    name="searchword" class="uk-search-input uk-text-center" type="search"
                                    placeholder="Search" autofocus><input type="hidden" name="task"
                                    value="search"><input type="hidden" name="option" value="com_search"><input
                                    type="hidden" name="Itemid" value="437">
                            </form>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </nav>

    @yield('content')



    <!-- JS -->
    <script src="{{ asset('backend/login/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/login/js/main.js') }}"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');

    </script>
    {{-- toastr --}}
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
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<!-- Mirrored from colorlib.com/etc/regform/colorlib-regform-7/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Apr 2021 07:53:12 GMT -->

</html>
