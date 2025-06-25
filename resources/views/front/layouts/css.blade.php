<!-- Favicon -->
<link href="{{ asset('assets/images/logos/favicon.ico') }}" rel="icon"/>
<!-- IOS Touch Icons -->
<link rel="apple-touch-icon" href="{{ asset('assets/images/logos/apple-touch-icon.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/images/logos/touch-icon-ipad.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logos/touch-icon-iphone-retina.png') }}">
<link rel="apple-touch-icon" sizes="167x167" href="{{ asset('assets/images/logos/touch-icon-ipad-retina.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/logos/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/logos/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/logos/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('assets/images/logos/site.webmanifest') }}">
<!-- Styles -->
<link href="{{ asset('assets/css/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/styles.bundle.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/js/flipster/jquery.flipster.min.css') }}" rel="stylesheet" type="text/css"/>

<!-- Google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    #header .header-container {
        padding: 0.5rem 1.5rem;
        background-color: #196eed;
        color: #fff;
        border-radius: 0.375rem;
        position: relative;
        -webkit-box-shadow: 0 1px 2rem 0 rgba(0,0,0,.3);
        box-shadow: 0 1px 2rem 0 rgba(0,0,0,.3);
    }
    .cover .cover__head:before{
        height:60%!important;
    }
    .smartbanner.smartbanner--android {
        background: #3d3d3d url(data:image/gif;base64,R0lGODlhCAAIAIABAFVVVf///yH5BAEHAAEALAAAAAAIAAgAAAINRG4XudroGJBRsYcxKAA7);
        box-shadow: inset 0 4px 0 #88b131;
        z-index: 99999999999!important;
    }

    .smartbanner {
        position: absolute;
        top: 0;
        left: 0;
        overflow-x: hidden;
        width: 100%;
        z-index: 9999999999;
        height: 84px;
        /* background: #f3f3f3; */
        font-family: Helvetica, sans, sans-serif;
    }


    #landing_footer::after {
        background: url({{ asset('assets/images/logos/nefes-amblem.png') }}) no-repeat right bottom;
    }
    .start_trial_modal .modal-dialog .modal-content:before{
        background: url({{ asset('assets/images/background/modal-bg.jpg') }}) no-repeat center center;
    }
    .invite_modal .modal-dialog .modal-content:before{
        background: url({{asset('assets/images/background/modal-invite-bg.jpg')}}) no-repeat center top;
    }
    .invitation-banner-container::after{
        background: url({{ asset('assets/images/logos/nefes-amblem.png') }}) no-repeat right center;
    }
    .premium-banner-container::after {
        background: url({{ asset('assets/images/logos/nefes-amblem.png') }}) no-repeat right center;
    }
    .landing-hero {
        background: url({{asset('assets/images/hero-bg.png')}}) center no-repeat;
    }
    [x-cloak] {
        display: none !important;
    }
    .loginModal,
    .registerModal
    {
        z-index: 1004;
        position: fixed;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50vh);
    }
</style>

<link rel="stylesheet" href="{{ asset('assets/js/flipster/jquery.flipster.min.css') }}">
