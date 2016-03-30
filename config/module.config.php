<?php
return [
    /* Controllers */
    'controllers' => [
        'config_factories' => [

            /* ADMIN ACL */
            'RcmUser\Api\Controller\AclDefaultUserRoleController' => [
                'class' => 'RcmUser\Api\Controller\AclDefaultUserRoleController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\AclResourcesController' => [
                'class' => 'RcmUser\Api\Controller\AclResourcesController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\AclRoleController' => [
                'class' => 'RcmUser\Api\Controller\AclRoleController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\AclRulesByRolesController' => [
                'class' => 'RcmUser\Api\Controller\AclRulesByRolesController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\AclRuleController' => [
                'class' => 'RcmUser\Api\Controller\AclRuleController',
                'arguments' => ['ServiceManager'],
            ],
            /* ADMIN USERS */
            'RcmUser\Api\Controller\UserAdminController' => [
                'class' => 'RcmUser\Api\Controller\UserAdminController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\UserValidUserStatesController' => [
                'class' => 'RcmUser\Api\Controller\UserValidUserStatesController',
                'arguments' => ['ServiceManager'],
            ],
            /* ADMIN USER ROLES */
            'RcmUser\Api\Controller\DefaultRoleDataController' => [
                'class' => 'RcmUser\Api\Controller\DefaultRoleDataController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\UserRolesController' => [
                'class' => 'RcmUser\Api\Controller\UserRolesController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\UserRoleController' => [
                'class' => 'RcmUser\Api\Controller\UserRoleController',
                'arguments' => ['ServiceManager'],
            ],
            'RcmUser\Api\Controller\UserController' => [
                'class' => 'RcmUser\Api\Controller\UserController',
                'arguments' => ['ServiceManager'],
            ],
        ],
//        'invokables' => [
//            // ADMIN ACL
////            'RcmUser\Api\Controller\AclResourcesController' =>
////                'RcmUser\Api\Controller\AclResourcesController',
////            'RcmUser\Api\Controller\AclRulesByRolesController' =>
////                'RcmUser\Api\Controller\AclRulesByRolesController',
////            'RcmUser\Api\Controller\AclRuleController' =>
////                'RcmUser\Api\Controller\AclRuleController',
////            'RcmUser\Api\Controller\AclRoleController' =>
////                'RcmUser\Api\Controller\AclRoleController',
////            'RcmUser\Api\Controller\AclDefaultUserRoleController' =>
////                'RcmUser\Api\Controller\AclDefaultUserRoleController',
//            // ADMIN USERS
////            'RcmUser\Api\Controller\UserAdminController' =>
////                'RcmUser\Api\Controller\UserAdminController',
////            'RcmUser\Api\Controller\UserValidUserStatesController' =>
////                'RcmUser\Api\Controller\UserValidUserStatesController',
//            // ADMIN USER ROLES
////            'RcmUser\Api\Controller\DefaultRoleDataController' =>
////                'RcmUser\Api\Controller\DefaultRoleDataController',
////            'RcmUser\Api\Controller\UserRolesController' =>
////                'RcmUser\Api\Controller\UserRolesController',
////            'RcmUser\Api\Controller\UserRoleController' =>
////                'RcmUser\Api\Controller\UserRoleController',
////            'RcmUser\Api\Controller\UserController' =>
////                'RcmUser\Api\Controller\UserController'
//        ],
    ],
    /**
     * Configuration
     */
    'RcmUser\\Api' => [

    ],
    /**
     * Router
     */
    'router' => require __DIR__ . '/router.config.php',
    /**
     *ServiceManager
     */
    'service_manager' => [
        'factories' => [

        ]
    ],
];
