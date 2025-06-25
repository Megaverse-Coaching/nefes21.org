<?php

return array(
    // Main menu
    'main'          => array(

        //// HOME
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">HOME</span>',
        ),
        array(
            'title' => 'Dashboard',
            'path'  => 'admin',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-1"),
        ),

        //// USER MANAGEMENT
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">USER MANAGEMENT</span>',
        ),
        array(
            'title' => 'User Search',
            'path'  => 'admin/users',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art003.svg", "svg-icon-1"),
        ),
        array(
            'title' => 'Transaction Search',
            'path'  => 'admin/transaction',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art004.svg", "svg-icon-1"),
        ),

        //// CONTENT CREATORS
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">CONTENT CREATORS</span>',
        ),
        array(
            'title' => 'Authors',
            'path'  => 'admin/authors',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art003.svg", "svg-icon-1"),
        ),
        array(
            'title' => 'Narrators',
            'path'  => 'admin/narrators',
            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/art/art004.svg", "svg-icon-1"),
        ),



        //// CONTENT MANAGEMENT
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">CONTENT MANAGEMENT</span>',
        ),


        // Contents
        array(
            'title' => 'Contents',
            'path' => 'admin/contents',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/art/art003.svg", "svg-icon-1"),
        ),
        // Soundscapes
        array(
            'title' => 'Soundscape',
            'path' => 'admin/soundscape',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/abstract/abs008.svg", "svg-icon-1"),
        ),
        // Decks
        array(
            'title' => 'Decks',
            'path' => 'admin/decks',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen006.svg", "svg-icon-1"),
        ),


        //// LAYOUT MANAGEMENT
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">LAYOUT MANAGEMENT</span>',
        ),


        // Categories
        array(
            'title' => 'Categories',
            'path' => 'admin/categories',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen008.svg", "svg-icon-1"),
        ),


        // Mood Check-in Layout
        array(
            'title' => 'Mood Check-in Layout',
            'path' => 'admin/moods',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen004.svg", "svg-icon-1"),
        ),


        // Dimension Layout
        array(
            'title' => 'Dimension Layout',
            'path' => 'admin/dimensions',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-1"),
        ),


        // Today Starters
        array(
            'title' => 'Today Starters',
            'path' => 'admin/today-starters',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen009.svg", "svg-icon-1"),
        ),


        // Today Showcase Items
        array(
            'title' => 'Today Showcase Items',
            'path' => 'admin/today-showcases',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen010.svg", "svg-icon-1"),
        ),


        //// CONTENT POOLS
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">CONTENT POOLS</span>',
        ),


        // Today Series Pool
        array(
            'title' => 'Today Series Pool',
            'path' => 'admin/today-pools',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen011.svg", "svg-icon-1"),
        ),


        // Today Showcase Pool
        array(
            'title' => 'Today Showcase Pool',
            'path' => 'admin/showcase-pools',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen012.svg", "svg-icon-1"),
        ),


        //// PROGRAM MANAGEMENT
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">PROGRAM MANAGEMENT</span>',
        ),


        // Today Series Pool
        array(
            'title' => 'Programs',
            'path' => 'admin/programs',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen013.svg", "svg-icon-1"),
        ),


        // Today Showcase Pool
        array(
            'title' => 'Programs Layout',
            'path' => 'admin/programs-layout',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen014.svg", "svg-icon-1"),
        ),




        //// PRODUCT MANAGEMENT
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">PRODUCT MANAGEMENT</span>',
        ),


        // Prepaid Codes
        array(
            'title' => 'Prepaid Codes',
            'path' => 'admin/prepaid-codes',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen015.svg", "svg-icon-1"),
        ),


        // Promo Codes
        array(
            'title' => 'Promo Codes',
            'path' => 'admin/promo-codes',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen016.svg", "svg-icon-1"),
        ),

        // Products
        array(
            'title' => 'Products',
            'path' => 'admin/products',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen018.svg", "svg-icon-1"),
        ),

        // Suppliers
        array(
            'title' => 'Suppliers',
            'path' => 'admin/suppliers',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen017.svg", "svg-icon-1"),
        ),


    ),

    // Horizontal menu
    'horizontal'    => array(
        // Dashboard
        array(
            'title'   => 'Dashboard',
            'path'    => 'admin/index',
            'classes' => array('item' => 'me-lg-1'),
        ),
        // Users
        array(
            'title'      => 'Users',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title'  => 'Kullanıcılar',
                        'path'   => 'admin/user-management/users',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Roller',
                        'path'   => 'admin/user-management/roles',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'İzinler',
                        'path'   => 'admin/user-management/permissions',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Account
        array(
            'title'      => 'Account',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title'  => 'Overview',
                        'path'   => 'admin/account/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'Settings',
                        'path'   => 'admin/account/settings',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // System
        array(
            'title'      => 'System',
            'classes'    => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger'   => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub'        => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title'  => 'Audit Log',
                        'path'   => 'admin/log/audit',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'System Log',
                        'path'   => 'admin/log/system',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
    ),
);
