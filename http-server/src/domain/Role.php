<?php


namespace wenbinye\tars\demo\domain;


use kuiper\helper\Enum;

/**
 * Class Role
 * @package wenbinye\tars\demo\domain
 *
 * @property array $authories
 */
class Role extends Enum
{
    public const USER_ADMIN = 'user_admin';

    protected static $PROPERTIES = [
        'authories' => [
            self::USER_ADMIN => [
                "user:*"
            ]
        ]
    ];
}