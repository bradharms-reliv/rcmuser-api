<?php
return [
    /* Controllers */
    'controllers' => [
        'invokables' => [
            // TESTING
            'RcmUser\Api\Controller\UserTestController' =>
                'RcmUser\Api\Controller\UserTestController',
            // ADMIN GENERAL
            'RcmUser\Api\Controller\AdminJsController' =>
                'RcmUser\Api\Controller\AdminJsController',
            // ADMIN ACL
            'RcmUser\Api\Controller\AdminAclController' =>
                'RcmUser\Api\Controller\AdminAclController',
            'RcmUser\Api\Controller\AdminApiAclResourcesController' =>
                'RcmUser\Api\Controller\AdminApiAclResourcesController',
            'RcmUser\Api\Controller\AdminApiAclRulesByRolesController' =>
                'RcmUser\Api\Controller\AdminApiAclRulesByRolesController',
            'RcmUser\Api\Controller\AdminApiAclRuleController' =>
                'RcmUser\Api\Controller\AdminApiAclRuleController',
            'RcmUser\Api\Controller\AdminApiAclRoleController' =>
                'RcmUser\Api\Controller\AdminApiAclRoleController',
            'RcmUser\Api\Controller\AdminApiAclDefaultUserRoleController' =>
                'RcmUser\Api\Controller\AdminApiAclDefaultUserRoleController',
            // ADMIN USERS
            'RcmUser\Api\Controller\AdminUserController' =>
                'RcmUser\Api\Controller\AdminUserController',
            'RcmUser\Api\Controller\AdminApiUserController' =>
                'RcmUser\Api\Controller\AdminApiUserController',
            'RcmUser\Api\Controller\AdminApiUserValidUserStatesController' =>
                'RcmUser\Api\Controller\AdminApiUserValidUserStatesController',
            // ADMIN USER ROLES
            /*'RcmUser\Api\Controller\AdminUserRoleController'
            => 'RcmUser\Api\Controller\AdminUserRoleController',*/
            'RcmUser\Api\Controller\AdminApiUserRolesController' =>
                'RcmUser\Api\Controller\AdminApiUserRolesController',
            'RcmUser\Api\Controller\AdminApiUserRoleController' =>
                'RcmUser\Api\Controller\AdminApiUserRoleController',
            'RcmUser\Api\ApiController\UserController' =>
                'RcmUser\Api\ApiController\UserController'
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'rcmUserIsAllowed' =>
                'RcmUser\Api\Controller\Plugin\Factory\RcmUserIsAllowed',
            'rcmUserHasRoleBasedAccess' =>
                'RcmUser\Api\Controller\Plugin\Factory\RcmUserHasRoleBasedAccess',
            'rcmUserGetCurrentUser' =>
                'RcmUser\Api\Controller\Plugin\Factory\RcmUserGetCurrentUser',
        ],
    ],
    /**
     * Configuration
     */
    'RcmUser\\Api' => [
        /**
         * Include any paths for JavaScript and CSS here
         * The included views require:
         * - AngularJS
         * - Angular-UI
         * - TwitterBootstrap
         */
        'htmlAssets' => [
            'js' => [
                '/modules/rcm-angular-js/angular/angular.js',
                '/vendor/bootstrap/dist/js/bootstrap.min.js',
                '/modules/rcm-angular-js/angular-ui/bootstrap/ui-bootstrap-tpls-0.11.0.min.js',
            ],

            'css' => [
                '/vendor/bootstrap/dist/css/bootstrap.min.css',
            ],
        ],
    ],
    'router' => [
        'routes' => [
            // GENERAL
            /**
             * TEST CONTROLLER - TESTING ONLY
             *
             * @view
             */
            'RcmUser' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/rcmusertest',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\UserTestController',
                        'action' => 'index',
                    ],
                ],
            ],
            // ADMIN GENERAL
            /**
             * RcmUserAdminCss
             * General Admin CSS
             *
             * @view CSS
             */
            'RcmUserCoreJs' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/admin/rcmuser/js/core.js',
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminCore',
                    ],
                ],
            ],
            // ADMIN ACL
            /**
             * RcmUserAdminAcl
             * View for creating and editing roles and rule
             *
             */
            'RcmUserAdminAcl' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/admin/rcmuser-acl',
                    'constraints' => [],
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\AdminAclController',
                        'action' => 'index',
                    ],
                ],
            ],
            /**
             * RcmUserAdminAclJs
             * JavaScript for RcmUserAdminAcl
             */
            'RcmUserAdminAclJs' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/admin/rcmuser/js/admin-acl.js',
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminAcl',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiAclResources
             * Get resources
             *
             * @api
             */
            'RcmUserAdminApiAclResources' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-acl-resources[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclResourcesController',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiAclRulesByRoles
             * Returns Roles and the related Rules
             *
             * @api
             */
            'RcmUserAdminApiAclRulesByRoles' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-acl-rulesbyroles[/:id]',
                    'constraints' => [
                        'id' => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclRulesByRolesController',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiAclRule
             * Return rules and exposes create and delete
             *
             * @api
             */
            'RcmUserAdminApiAclRule' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-acl-rule[/:id]',
                    //'constraints' => [
                    //'id' => '[a-zA-Z0-9_-]+',
                    //],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclRuleController',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiAclRole
             * Return roles and exposes create and delete
             *
             * @api
             */
            'RcmUserAdminApiAclRole' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-acl-role[/:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclRoleController',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiAclDefaultUserRole
             * Return default User roles
             *
             * @api
             */
            'RcmUserAdminApiAclDefaultUserRole' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-acl-default-user-roles[/:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclDefaultUserRoleController',
                    ],
                ],
            ],
            // ADMIN USERS
            /**
             * RcmUserAdminUsers
             * View for creating and editing users
             */
            'RcmUserAdminUsers' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/admin/rcmuser-users',
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\AdminUserController',
                        'action' => 'index',
                    ],
                ],
            ],
            /**
             * RcmUserAdminUserJs
             * JavaScript for RcmUserAdminUsers
             */
            'RcmUserAdminUserJs' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/admin/rcmuser/js/admin-users.js',
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminUsers',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiUser
             * API for creating and editing users
             *
             * @api
             */
            'RcmUserAdminApiUser' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-user[/:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserController',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiUserValidUserStates
             * API to get list of valid user states
             *
             * @api
             */
            'RcmUserAdminApiUserValidUserStates' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-user-validuserstates[/:id]',
                    'constraints' => [
                        'id' => '[a-zA-Z0-9_-]+',
                    ],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserValidUserStatesController',
                    ],
                ],
            ],
            /* ADMIN USER ROLES
            'RcmUserAdminUserRole' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/admin/rcmuser-user-role/:id',
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\AdminUserRoleController',
                        'action' => 'index',
                    ],
                ],
            ],
            'RcmUserAdminUserRoleJs' => [
                'may_terminate' => true,
                'type' => 'segment',
                'options' => [
                    'route' => '/admin/rcmuser/js/admin-user-role.js',
                    'defaults' => [
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminUserRoles',
                    ],
                ],
            ],
            */
            /**
             * RcmUserAdminApiUserRoles
             * API for listing, creating and deleting user roles as a group
             *
             * @api
             */
            'RcmUserAdminApiUserRoles' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-user-roles[/:id]',
                    //'constraints' => [
                    //'id' => '[a-zA-Z0-9_-]+',
                    //],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserRolesController',
                    ],
                ],
            ],
            /**
             * RcmUserAdminApiUserRoles
             * API creating and deleting an individual user role
             *
             * @api
             */
            'RcmUserAdminApiUserRole' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/admin/rcmuser-user-role[/:id]',
                    //'constraints' => [
                    //'id' => '[a-zA-Z0-9_-]+',
                    //],
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserRoleController',
                    ],
                ],
            ],
            /**
             * RcmUserApiUser
             * API for User
             * - GET New:     /api/rcm-user/user/new
             * - GET current: /api/rcm-user/user/current
             * - POST login:  /api/rcm-user/user/login
             *   {
             *    "username": "MYUSERNAME",
             *    "password": "MYPASSWORD"
             *   }
             * - POST logout: /api/rcm-user/user/logout
             *
             * @api
             */
            'RcmUserApiUser' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/rcm-user/user[/:id]',
                    'defaults' => [
                        'controller' =>
                            'RcmUser\Api\ApiController\UserController',
                    ],
                ],
            ],
        ],
    ],
    'view_helpers' => [
        'factories' => [
            'rcmUserIsAllowed' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserIsAllowed',
            'rcmUserHasRoleBasedAccess' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserHasRoleBasedAccess',
            'rcmUserBuildHtmlHead' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserBuildHtmlHead',
            'rcmUserGetCurrentUser' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserGetCurrentUser',
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'RcmUser' => __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
    /* ServiceManager */
    'service_manager' => [
        'factories' => [

        ]
    ],
];
