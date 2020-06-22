<?php


namespace wenbinye\tars\demo\application;


use wenbinye\tars\demo\domain\User;

interface UserService
{
    public function findUser(string $username): User;

    public function findAllUser(): array ;
}