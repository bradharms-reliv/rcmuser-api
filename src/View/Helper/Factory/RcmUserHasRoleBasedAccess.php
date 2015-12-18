<?php

namespace RcmUser\Api\View\Helper\Factory;

use RcmUser\Api\View\Helper\RcmUserIsAllowed;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * RcmUserHasRoleBasedAccess
 *
 * PHP version 5
 *
 * @category  Reliv
 * @package   RcmUser\Api\Service\Factory
 * @author    James Jervis <jjervis@relivinc.com>
 * @copyright 2015 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: <package_version>
 * @link      https://github.com/reliv
 */
class RcmUserHasRoleBasedAccess implements FactoryInterface
{
    /**
     * createService
     *
     * @param ServiceLocatorInterface $mgr mgr
     *
     * @return mixed|RcmUserIsAllowed
     */
    public function createService(ServiceLocatorInterface $mgr)
    {
        $serviceLocator = $mgr->getServiceLocator();
        $authorizeService = $serviceLocator->get(
            'RcmUser\Acl\Service\AuthorizeService'
        );
        $userAuthService = $serviceLocator->get(
            'RcmUser\Authentication\Service\UserAuthenticationService'
        );

        $service = new \RcmUser\Api\View\Helper\RcmUserHasRoleBasedAccess(
            $authorizeService, $userAuthService
        );

        return $service;
    }
}
