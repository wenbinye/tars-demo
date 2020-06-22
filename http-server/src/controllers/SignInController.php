<?php


namespace wenbinye\tars\demo\controllers;


use DI\Annotation\Inject;
use kuiper\di\annotation\Controller;
use kuiper\web\AbstractController;
use kuiper\web\annotation\GetMapping;
use kuiper\web\annotation\PostMapping;
use kuiper\web\security\SecurityContext;
use kuiper\web\view\ViewInterface;
use wenbinye\tars\demo\application\UserService;

/**
 * @Controller()
 */
class SignInController extends AbstractController
{
    /**
     * @Inject()
     * @var ViewInterface
     */
    private $view;

    /**
     * @Inject()
     * @var UserService
     */
    private $userService;

    /**
     * @GetMapping("/login")
     */
    public function login()
    {
        $this->getResponse()->getBody()->write($this->view->render("login"));
    }

    /**
     * @PostMapping("/login")
     */
    public function processLogin()
    {
        $parsedBody = $this->getRequest()->getParsedBody();
        if (isset($parsedBody['username'], $parsedBody['password'])) {
            $user = $this->userService->findUser($parsedBody['username']);
            if ($user->isPasswordMatch($parsedBody['password'])) {
                SecurityContext::fromRequest($this->getRequest())->getAuth()
                    ->login($user->getIdentity());
                return $this->getResponse()->withStatus(302)
                    ->withHeader("location", "/");
            }
        }
        return $this->getResponse()->withStatus(302)
            ->withHeader("location", "/login");
    }
}