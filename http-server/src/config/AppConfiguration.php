<?php


namespace wenbinye\tars\demo\config;


use kuiper\di\annotation\Bean;
use kuiper\di\annotation\Configuration;
use kuiper\web\security\Acl;
use kuiper\web\security\AclInterface;
use wenbinye\tars\demo\domain\Role;

/**
 * @Configuration()
 */
class AppConfiguration
{
    /**
     * @Bean()
     */
    public function acl(): AclInterface
    {
        $acl = new Acl();

        foreach (Role::instances() as $role) {
            foreach ($role->authories as $rule) {
                $acl->allow($role->value, $rule);
            }
        }
        return $acl;
    }
}