<?php
/**
 * router.config.php
 */
return [
    'routes' => [
        // ADMIN ACL
        /**
         * RcmUser\Api\AclResources
         * Get resources
         *
         * @api
         */
        'RcmUser\Api\AclResources' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-acl-resources[/:id]',
                'constraints' => [
                    'id' => '[0-9]+',
                ],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\AclResourcesController',
                ],
            ],
        ],
        /**
         * RcmUser\Api\AclRulesByRoles
         * Returns Roles and the related Rules
         *
         * @api
         */
        'RcmUser\Api\AclRulesByRoles' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-acl-rulesbyroles[/:id]',
                'constraints' => [
                    'id' => '[0-9]+',
                ],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\AclRulesByRolesController',
                ],
            ],
        ],
        /**
         * RcmUser\Api\AclRule
         * Return rules and exposes create and delete
         *
         * @api
         */
        'RcmUser\Api\AclRule' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-acl-rule[/:id]',
                //'constraints' => [
                //'id' => '[a-zA-Z0-9_-]+',
                //],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\AclRuleController',
                ],
            ],
        ],
        /**
         * RcmUser\Api\AclRole
         * Return roles and exposes create and delete
         *
         * @api
         */
        'RcmUser\Api\AclRole' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-acl-role[/:id]',
                'constraints' => [
                    'id' => '[a-zA-Z0-9_-]+',
                ],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\AclRoleController',
                ],
            ],
        ],
        /**
         * RcmUser\Api\AclDefaultUserRole
         * Return default User roles
         *
         * @api
         */
        'RcmUser\Api\AclDefaultUserRole' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-acl-default-user-roles[/:id]',
                'constraints' => [
                    'id' => '[a-zA-Z0-9_-]+',
                ],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\AclDefaultUserRoleController',
                ],
            ],
        ],
        // ADMIN USERS
        /**
         * RcmUser\Api\User
         * API for creating and editing users
         *
         * @api
         */
        'RcmUser\Api\User' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-user[/:id]',
                'constraints' => [
                    'id' => '[a-zA-Z0-9_-]+',
                ],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\UserAdminController',
                ],
            ],
        ],
        /**
         * RcmUser\Api\UserValidUserStates
         * API to get list of valid user states
         *
         * @api
         */
        'RcmUser\Api\UserValidUserStates' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-user-validuserstates[/:id]',
                'constraints' => [
                    'id' => '[a-zA-Z0-9_-]+',
                ],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\UserValidUserStatesController',
                ],
            ],
        ],
        // User Roles
        'RcmUser\Api\DefaultRoleData' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/default-role-data[/:id]',
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\DefaultRoleDataController',
                ],
            ],
        ],

        /**
         * RcmUser\Api\UserRoles
         * API for listing, creating and deleting user roles as a group
         *
         * @api
         */
        'RcmUser\Api\UserRoles' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-user-roles[/:id]',
                //'constraints' => [
                //'id' => '[a-zA-Z0-9_-]+',
                //],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\UserRolesController',
                ],
            ],
        ],
        /**
         * RcmUser\Api\UserRole
         * API creating and deleting an individual user role
         *
         * @api
         */
        'RcmUser\Api\UserRole' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/api/admin/rcmuser-user-role[/:id]',
                //'constraints' => [
                //'id' => '[a-zA-Z0-9_-]+',
                //],
                'defaults' => [
                    'controller' =>
                        'RcmUser\Api\Controller\UserRoleController',
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
                        'RcmUser\Api\Controller\UserController',
                ],
            ],
        ],
    ],
];
