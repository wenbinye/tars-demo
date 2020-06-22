<?php


namespace wenbinye\tars\demo\application;


use kuiper\di\annotation\Service;
use wenbinye\tars\demo\domain\Role;
use wenbinye\tars\demo\domain\User;

/**
 * @Service()
 */
class UserServiceImpl implements UserService
{
    /**
     * @var User[]
     */
    private $users;

    /**
     * UserServiceImpl constructor.
     */
    public function __construct()
    {
        $this->users = [
            new User('admin', password_hash("admin", PASSWORD_BCRYPT), ['Admin']),
            new User('john', password_hash("john", PASSWORD_BCRYPT), []),
            new User('mary', password_hash("mary", PASSWORD_BCRYPT), [Role::USER_ADMIN]),
        ];
    }

    public function findUser(string $username): User
    {
        foreach ($this->users as $user) {
            if ($user->getName() === $username) {
                return $user;
            }
        }
        throw new \InvalidArgumentException("User name $username not found ");
    }

    public function findAllUser(): array
    {
        return $this->users;
    }
}