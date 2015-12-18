rcmuser-api
====================

ZF2 based APIs using REST/JSON

##### Company:
Copyright Reliv' International, Inc. 2015

##### Project homepage: #####
https://github.com/reliv/rcm-user-api

##### Project author: #####
James Jervis
jjervis@relivinc.com
https://github.com/reliv


#### Controller Plugins and View Helpers ####

- rcmUserIsAllowed($resourceId, $privilege = null, $providerId = null) (plugin and helper)
 - Alias of RcmUserService::isAllowed()

- rcmUserHasRoleBasedAccess($roleId) (plugin and helper)
 - Alias of RcmUserService::hasRoleBasedAccess()
 
- rcmUserGetCurrentUser($default = null) (plugin and helper)
 - Alias of RcmUserService::getIdentity()
 
 
 
controller plug-in and view helper for isAllowed (rcmUserIsAllowed for plug-in and helper)



#### View dependencies

- AngularJs (https://angularjs.org/)
- Bootstrap (http://getbootstrap.com/)
- UI Bootstrap (http://angular-ui.github.io/bootstrap/)


# @TODO #

#### More REST/JSON APIs ####

As DevOpts
I should have access to REST/JSON APIs
So that I may securely perform RcmUser actions VIA web clients

#### Addition Default Views ####

Story: 
As a user 
I should have access to edit my own user profile for certain fields based on configurable rules
So that I may update my profile data
    
 - User can edit own profile
 
As a user 
I should have access to a login page
So that i can log in to the site

As a user 
I should have be able to securely reset my password
So that I can get into my account if I forget or lose my password

- Standard email link to password reset

#### Admin Edit Profile Updates ####

Story:
As User when I access a user profile edit page
I should see a list of links or tabs to other profile data
So I can have quick access to all my user properties
    
 - User property links on user edit/profile pages:
 - Simple Interface to register profiles
    
#### Admin Role and Rule UI Updates ####

Story: 
As an ACL administrator 
I should be able to assign multiple privileges while creating rules 
So that the rules easier to administrate and view
 
 - ACL admin should be able to assign multiple privielges
 - Update rules entity to accept multi privileges (store array as cvs)
 - check privilege in is allowed as array
 - allow saving arrays in data mapper
 - fix AclResource->privileges to be object with json and to string and iteratable
 
Story: 
As a Administrator 
I should be able to paginate and filter Role and User lists on the Admin screens
So that I can quickly and efficiently edit Users and Roles
 
 - Admin User list should paginate and filter from server-side
 - Implement data mapper method for:
 - findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)

#### Security Updates ####

Story: 
As and Auditor 
I can access a log of actions performed on users and roles by administrators 
So that I track admin user changes
    
 - Implement logging audit trail for user creates and saves
 - might create event listeners or do at the service level
 - Logging of actions for security audits
