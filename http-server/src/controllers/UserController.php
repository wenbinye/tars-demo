<?php


namespace wenbinye\tars\demo\controllers;


use DI\Annotation\Inject;
use kuiper\di\annotation\Controller;
use kuiper\web\AbstractController;
use kuiper\web\annotation\filter\LoginOnly;
use kuiper\web\annotation\filter\PreAuthorize;
use kuiper\web\annotation\GetMapping;
use kuiper\web\security\SecurityContext;
use wenbinye\tars\demo\application\UserService;
use wenbinye\tars\demo\domain\Authority;

/**
 * @Controller()
 */
class UserController extends AbstractController
{
    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    /**
     * @GetMapping("/user-info")
     */
    public function getUserInfo(): void
    {
        $auth = SecurityContext::fromRequest($this->getRequest())->getAuth();
        $this->getResponse()->getBody()->write(json_encode($auth->getIdentity()));
    }

    /**
     * @GetMapping("/user")
     * @PreAuthorize({Authority::USER_LIST})
     */
    public function listUsers(): void
    {
        $this->getResponse()->getBody()->write(json_encode($this->userService->findAllUser()));
    }
}