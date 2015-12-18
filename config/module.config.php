<?php
return [
    /* Controllers */
    'controllers' => array(
        'invokables' => array(
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
        ),
    ),
    'controller_plugins' => array(
        'factories' => array(
            'rcmUserIsAllowed' =>
                'RcmUser\Api\Controller\Plugin\Factory\RcmUserIsAllowed',
            'rcmUserHasRoleBasedAccess' =>
                'RcmUser\Api\Controller\Plugin\Factory\RcmUserHasRoleBasedAccess',
            'rcmUserGetCurrentUser' =>
                'RcmUser\Api\Controller\Plugin\Factory\RcmUserGetCurrentUser',
        ),
    ),
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
        'htmlAssets' => array(
            'js' => array(
                '/modules/rcm-angular-js/angular/angular.js',
                '/vendor/bootstrap/dist/js/bootstrap.min.js',
                '/modules/rcm-angular-js/angular-ui/bootstrap/ui-bootstrap-tpls-0.11.0.min.js',
            ),

            'css' => array(
                '/vendor/bootstrap/dist/css/bootstrap.min.css',
            ),
        ),
    ],
    'router' => array(
        'routes' => array(
            // GENERAL
            /**
             * TEST CONTROLLER - TESTING ONLY
             *
             * @view
             */
            'RcmUser' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/rcmusertest',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\UserTestController',
                        'action' => 'index',
                    ),
                ),
            ),
            // ADMIN GENERAL
            /**
             * RcmUserAdminCss
             * General Admin CSS
             *
             * @view CSS
             */
            'RcmUserCoreJs' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/rcmuser/js/core.js',
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminCore',
                    ),
                ),
            ),
            // ADMIN ACL
            /**
             * RcmUserAdminAcl
             * View for creating and editing roles and rule
             *
             */
            'RcmUserAdminAcl' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/rcmuser-acl',
                    'constraints' => array(),
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\AdminAclController',
                        'action' => 'index',
                    ),
                ),
            ),
            /**
             * RcmUserAdminAclJs
             * JavaScript for RcmUserAdminAcl
             */
            'RcmUserAdminAclJs' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/rcmuser/js/admin-acl.js',
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminAcl',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiAclResources
             * Get resources
             *
             * @api
             */
            'RcmUserAdminApiAclResources' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-acl-resources[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclResourcesController',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiAclRulesByRoles
             * Returns Roles and the related Rules
             *
             * @api
             */
            'RcmUserAdminApiAclRulesByRoles' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-acl-rulesbyroles[/:id]',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclRulesByRolesController',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiAclRule
             * Return rules and exposes create and delete
             *
             * @api
             */
            'RcmUserAdminApiAclRule' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-acl-rule[/:id]',
                    //'constraints' => array(
                    //'id' => '[a-zA-Z0-9_-]+',
                    //),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclRuleController',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiAclRole
             * Return roles and exposes create and delete
             *
             * @api
             */
            'RcmUserAdminApiAclRole' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-acl-role[/:id]',
                    'constraints' => array(
                        'id' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclRoleController',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiAclDefaultUserRole
             * Return default User roles
             *
             * @api
             */
            'RcmUserAdminApiAclDefaultUserRole' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-acl-default-user-roles[/:id]',
                    'constraints' => array(
                        'id' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiAclDefaultUserRoleController',
                    ),
                ),
            ),
            // ADMIN USERS
            /**
             * RcmUserAdminUsers
             * View for creating and editing users
             */
            'RcmUserAdminUsers' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/rcmuser-users',
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\AdminUserController',
                        'action' => 'index',
                    ),
                ),
            ),
            /**
             * RcmUserAdminUserJs
             * JavaScript for RcmUserAdminUsers
             */
            'RcmUserAdminUserJs' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/rcmuser/js/admin-users.js',
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminUsers',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiUser
             * API for creating and editing users
             *
             * @api
             */
            'RcmUserAdminApiUser' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-user[/:id]',
                    'constraints' => array(
                        'id' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserController',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiUserValidUserStates
             * API to get list of valid user states
             *
             * @api
             */
            'RcmUserAdminApiUserValidUserStates' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-user-validuserstates[/:id]',
                    'constraints' => array(
                        'id' => '[a-zA-Z0-9_-]+',
                    ),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserValidUserStatesController',
                    ),
                ),
            ),
            /* ADMIN USER ROLES
            'RcmUserAdminUserRole' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/rcmuser-user-role/:id',
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\AdminUserRoleController',
                        'action' => 'index',
                    ),
                ),
            ),
            'RcmUserAdminUserRoleJs' => array(
                'may_terminate' => true,
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/rcmuser/js/admin-user-role.js',
                    'defaults' => array(
                        'controller' => 'RcmUser\Api\Controller\AdminJsController',
                        'action' => 'adminUserRoles',
                    ),
                ),
            ),
            */
            /**
             * RcmUserAdminApiUserRoles
             * API for listing, creating and deleting user roles as a group
             *
             * @api
             */
            'RcmUserAdminApiUserRoles' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-user-roles[/:id]',
                    //'constraints' => array(
                    //'id' => '[a-zA-Z0-9_-]+',
                    //),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserRolesController',
                    ),
                ),
            ),
            /**
             * RcmUserAdminApiUserRoles
             * API creating and deleting an individual user role
             *
             * @api
             */
            'RcmUserAdminApiUserRole' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/admin/rcmuser-user-role[/:id]',
                    //'constraints' => array(
                    //'id' => '[a-zA-Z0-9_-]+',
                    //),
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\Controller\AdminApiUserRoleController',
                    ),
                ),
            ),
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
            'RcmUserApiUser' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/rcm-user/user[/:id]',
                    'defaults' => array(
                        'controller' =>
                            'RcmUser\Api\ApiController\UserController',
                    ),
                ),
            ),
        ),
    ),
    'view_helpers' => array(
        'factories' => array(
            'rcmUserIsAllowed' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserIsAllowed',
            'rcmUserHasRoleBasedAccess' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserHasRoleBasedAccess',
            'rcmUserBuildHtmlHead' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserBuildHtmlHead',
            'rcmUserGetCurrentUser' =>
                'RcmUser\Api\View\Helper\Factory\RcmUserGetCurrentUser',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'RcmUser' => __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
    /* ServiceManager */
    'service_manager' => [
        'factories' => [

        ]
    ],
];
