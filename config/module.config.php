<?php
return [
    /* Controllers */
    'controllers' => [
        'invokables' => [
            // ADMIN ACL
            'RcmUser\Api\Controller\AclResourcesController' =>
                'RcmUser\Api\Controller\AclResourcesController',
            'RcmUser\Api\Controller\AclRulesByRolesController' =>
                'RcmUser\Api\Controller\AclRulesByRolesController',
            'RcmUser\Api\Controller\AclRuleController' =>
                'RcmUser\Api\Controller\AclRuleController',
            'RcmUser\Api\Controller\AclRoleController' =>
                'RcmUser\Api\Controller\AclRoleController',
            'RcmUser\Api\Controller\AclDefaultUserRoleController' =>
                'RcmUser\Api\Controller\AclDefaultUserRoleController',
            // ADMIN USERS
            'RcmUser\Api\Controller\UserAdminController' =>
                'RcmUser\Api\Controller\UserAdminController',
            'RcmUser\Api\Controller\UserValidUserStatesController' =>
                'RcmUser\Api\Controller\UserValidUserStatesController',
            // ADMIN USER ROLES
            'RcmUser\Api\Controller\DefaultRoleDataController' =>
                'RcmUser\Api\Controller\DefaultRoleDataController',
            'RcmUser\Api\Controller\UserRolesController' =>
                'RcmUser\Api\Controller\UserRolesController',
            'RcmUser\Api\Controller\UserRoleController' =>
                'RcmUser\Api\Controller\UserRoleController',
            'RcmUser\Api\Controller\UserController' =>
                'RcmUser\Api\Controller\UserController'
        ],
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
