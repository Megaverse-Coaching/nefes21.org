<?php
return array(
    'admin' => array(
        '' => array(
            'title' => 'Dashboard',
            'description' => 'This is a description',
            'view' => 'dashboard',
            'layout' => array(
                'page-title' => array(
                    'description' => false,
                    'breadcrumb' => false,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        //'js/widgets.bundle.js',
                    ),
                ),
                //'vendors' => array('fullcalendar', 'amcharts', 'amcharts-maps'),
            ),
        ),
        'login' => array(
            'title' => 'Login',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/authentication/sign-in/general.js',
                    ),
                ),
            ),
            'layout' => array(
                'main' => array(
                    'type' => 'blank', // Set blank layout
                    'body' => array(
                        'class' => theme()->isDarkMode() ? '' : 'bg-body',
                    ),
                ),
            ),
        ),
        'register' => array(
            'title' => 'Register',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/authentication/sign-up/general.js',
                    ),
                ),
            ),
            'layout' => array(
                'main' => array(
                    'type' => 'blank', // Set blank layout
                    'body' => array(
                        'class' => theme()->isDarkMode() ? '' : 'bg-body',
                    ),
                ),
            ),
        ),
        'forgot-password' => array(
            'title' => 'Forgot Password',
            'assets' => array(
                'custom' => array(
                    'js' => array(
                        'js/custom/authentication/password-reset/password-reset.js',
                    ),
                ),
            ),
            'layout' => array(
                'main' => array(
                    'type' => 'blank', // Set blank layout
                    'body' => array(
                        'class' => theme()->isDarkMode() ? '' : 'bg-body',
                    ),
                ),
            ),
        ),
        'log' => array(
            'audit' => array(
                'title' => 'Audit Log',
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                        ),
                    ),
                ),
            ),
            'system' => array(
                'title' => 'System Log',
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                        ),
                    ),
                ),
            ),
        ),
        'error' => array(
            'error-404' => array(
                'title' => 'Error 404',
            ),
            'error-500' => array(
                'title' => 'Error 500',
            ),
        ),
        'account' => array(
            'overview' => array(
                'title' => 'Account Overview',
                'view' => 'account/overview/overview',
                'assets' => array(
                    'custom' => array(
                        'js' => array(
                            'js/custom/widgets.js',
                        ),
                    ),
                ),
            ),

            'settings' => array(
                'title' => 'Account Settings',
                'assets' => array(
                    'custom' => array(
                        'js' => array(
                            'js/custom/account/settings/profile-details.js',
                            'js/custom/account/settings/signin-methods.js',
                            'js/custom/modals/two-factor-authentication.js',
                        ),
                    ),
                ),
            ),
        ),
        'user-management' => array(
            'users' => array(
                'title' => 'Kullanıcı Listesi',
                'layout' => array(
                    'page-title' => array(
                        'description' => false,
                        'breadcrumb' => false,
                    ),
                ),
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                            'js/graf/admin/users/list/add.js',
                            'js/graf/admin/users/list/export-users.js',
                            'js/graf/admin/users/list/table.js',
                            'js/graf/admin/users/list/user-roles.js',
                        ),
                    ),
                ),
                '*' => array(
                    'title' => 'Göster',
                    'edit' => array(
                        'title' => 'Düzenle',
                    ),
                ),
            ),
            'roles' => array(
                'title' => 'Roller',
                'description' => '',
                'view' => 'index',
                'layout' => array(
                    'page-title' => array(
                        'description' => true,
                        'breadcrumb' => true,
                    ),
                ),
                'assets' => array(
                    'custom' => array(
                        'css' => array(),
                        'js' => array(
                            'js/custom/user-management/roles/list/add.js',
                            'js/custom/user-management/roles/list/update-role.js',
                        ),
                    ),
                ),
                '*' => array(
                    'title' => 'Role Management',
                    'edit' => array(
                        'title' => 'Düzenle',
                        'assets' => array(
                            'custom' => array(
                                'css' => array(
                                    'plugins/custom/datatables/datatables.bundle.css',
                                ),
                                'js' => array(
                                    'plugins/custom/datatables/datatables.bundle.js',
                                    'js/graf/admin/roles/view/view.js',
                                    'js/graf/admin/roles/view/update-role.js',
                                    'js/graf/admin/roles/roles.js',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
            'permissions' => array(
                'title' => 'İzinler',
                'description' => '',
                'view' => 'index',
                'layout' => array(
                    'page-title' => array(
                        'description' => true,
                        'breadcrumb' => true,
                    ),
                ),
                'assets' => array(
                    'custom' => array(
                        'css' => array(),
                        'js' => array(
                            'js/graf/admin/users/list/users-search.js',
                        ),
                    ),
                ),
            )
        ),

        'contents' => array(
            'title' => 'İçerik Yönetimi',
            'description' => '',
            'view' => 'index',
            'layout' => array(
                'page-title' => array(
                    'description' => true,
                    'breadcrumb' => true,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/contents/contents.js',
                    ),
                ),
            ),
            'create' => array(
                'title' => 'Yeni İçerik Ekle',
                'assets' => array(
                    'custom' => array(
                        'css' => array(),
                        'js' => array(
                            'js/graf/admin/contents/contents.js',
                        ),
                    ),
                ),
            ),
            '*' => array(
                'edit' => array(
                    'title' => 'Yeni İçerik Ekle',
                    'assets' => array(
                        'custom' => array(
                            'css' => array(),
                            'js' => array(
                                'js/graf/admin/contents/contents.js',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'tracks' => array(
            'title' => 'Track Management',
            'description' => '',
            'view' => 'index',
            'layout' => array(
                'page-title' => array(
                    'description' => true,
                    'breadcrumb' => true,
                ),
            ),
            '*' => array(
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                            'js/graf/admin/tracks/tracks.js',
                        ),
                    ),
                ),
                'edit' => array(
                    'title' => 'Edit Track',
                    'assets' => array(
                        'custom' => array(
                            'css' => array(),
                            'js' => array(
                                'js/graf/admin/tracks/tracks.js',
                            ),
                        ),
                    ),
                ),

            ),
            'create' => array(
                'title' => 'Add New Track',
            ),


        ),
        'soundscape' => array(
            'title' => 'Soundscape Management',
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                    ),
                ),
            ),
            'create' => array(
                'title' => 'Update Sound',
                'assets' => array(
                    'custom' => array(
                        'css' => array(),
                        'js' => array(
                            'js/graf/admin/soundscapes/create-soundscape.js',
                        ),
                    ),
                ),
            ),
            '*' => array(
                'edit' => array(
                    'title' => 'Update Sound',
                    'assets' => array(
                        'custom' => array(
                            'css' => array(),
                            'js' => array(
                                'js/graf/admin/soundscapes/soundscape.js',
                            ),
                        ),
                    ),
                )
            ),
        ),

        'authors' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/authors/table.js',
                        'js/graf/admin/authors/add.js',
                        'js/graf/admin/authors/update.js',
                    ),
                ),
            ),
        ),

        'decks' => array(
            'title' => 'Decks',
            'description' => 'Daily Cards',
            'view' => 'index',
            'layout' => array(
                'page-title' => array(
                    'description' => true,
                    'breadcrumb' => true,
                ),
            ),
            '*' => array(
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                            'js/graf/admin/decks/decks.js',
                        ),
                    ),
                ),
                'cards' => array(
                    'title' => 'Edit Card',
                    'assets' => array(
                        'custom' => array(
                            'css' => array(
                                'plugins/custom/datatables/datatables.bundle.css',
                            ),
                            'js' => array(
                                'plugins/custom/datatables/datatables.bundle.js',
                                'js/graf/admin/cards/table.js',
                                'js/graf/admin/cards/add.js',
                                'js/graf/admin/cards/update.js',
                            ),
                        ),
                    ),
                ),
                'edit' => array(
                    'title' => 'Edit Card',
                    'assets' => array(
                        'custom' => array(
                            'css' => array(),
                            'js' => array(
                                'js/graf/admin/decks/decks.js',
                            ),
                        ),
                    ),
                ),
            ),

            'create' => array(
                'title' => 'Add New Card',
            ),


        ),
        'cards' => array(
            'title' => 'Cards',
            'description' => 'Daily Cards',
            'view' => 'index',
            'layout' => array(
                'page-title' => array(
                    'description' => true,
                    'breadcrumb' => true,
                ),
            ),
            '*' => array(
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                        ),
                    ),
                ),
                '*' => array(
                    'edit' => array(
                        'title' => 'Edit Card',
                        'assets' => array(
                            'custom' => array(
                                'css' => array(),
                                'js' => array(
                                    'js/graf/admin/cards/edit-card.js',
                                ),
                            ),
                        ),
                    ),

                ),
            ),
        ),
        'categories' => array(
            'title' => 'Categories',
            'description' => 'Select Categories',
            'view' => 'index',
            'layout' => array(
                'page-title' => array(
                    'description' => true,
                    'breadcrumb' => true,
                ),
            ),
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/categories/table.js',
                        'js/graf/admin/categories/add.js',
                        'js/graf/admin/categories/update.js',
                    ),
                ),
            ),

            '*' => [
                'assets' => array(
                    'custom' => array(
                        'css' => array(),
                        'js' => array(
                        ),
                    ),
                ),
            ]
        ),
        'moods' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/moods/table.js',
                        'js/graf/admin/moods/add.js',
                        'js/graf/admin/moods/update.js',
                    ),
                ),
            ),
        ),
        'dimensions' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(

                    ),
                    'js' => array(
                        'js/graf/admin/dimensions/add.js',
                    ),
                ),
            ),
            '*' => array(
                'assets' => array(
                    'custom' => array(
                        'css' => array(),
                        'js' => array(
                            'js/graf/admin/dimensions/add.js',
                        ),
                    ),
                ),

            ),
        ),

        'today-starters' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/today-starters/table.js',
                        'js/graf/admin/today-starters/add.js',
                    ),
                ),
            ),
        ),
        'today-showcases' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/today-showcases/table.js',
                        'js/graf/admin/today-showcases/add.js',
                        'js/graf/admin/today-showcases/update.js',
                    ),
                ),
            ),
        ),
        'today-pools' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/today-pools/table.js',
                        'js/graf/admin/today-pools/add.js',
                        'js/graf/admin/today-pools/update.js',
                    ),
                ),
            ),
            '*' => array(
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                            'js/graf/admin/today-pools/table.js',
                            'js/graf/admin/today-pools/add.js',
                            'js/graf/admin/today-pools/update.js',
                        ),
                    ),
                ),

            ),
        ),
        'showcase-pools' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/showcase-pools/table.js',
                        'js/graf/admin/showcase-pools/add.js',
                        'js/graf/admin/showcase-pools/update.js',
                    ),
                ),
            ),
            '*' => array(
                'assets' => array(
                    'custom' => array(
                        'css' => array(
                            'plugins/custom/datatables/datatables.bundle.css',
                        ),
                        'js' => array(
                            'plugins/custom/datatables/datatables.bundle.js',
                            'js/graf/admin/showcase-pools/table.js',
                            'js/graf/admin/showcase-pools/add.js',
                            'js/graf/admin/showcase-pools/update.js',
                        ),
                    ),
                ),

            ),
        ),


        'programs' => array(
            'assets' => array(
                'custom' => array(
                    'css' => array(
                        'plugins/custom/datatables/datatables.bundle.css',
                    ),
                    'js' => array(
                        'plugins/custom/datatables/datatables.bundle.js',
                        'js/graf/admin/programs/table.js',
                        'js/graf/admin/programs/add.js',
                        'js/graf/admin/programs/update.js',
                    ),
                ),
            ),

        ),
    ),
);
