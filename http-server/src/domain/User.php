<?php


namespace wenbinye\tars\demo\domain;


class User implements \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string[]
     */
    private $roles;

    /**
     * User constructor.
     * @param string $name
     * @param string $password
     */
    public function __construct(string $name, string $password, array $roles = [])
    {
        $this->name = $name;
        $this->password = $password;
        $this->roles = $roles;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string[]
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    public function getIdentity(): array
    {
        return [
            'name' => $this->name,
            'roles' => $this->roles
        ];
    }

    public function isPasswordMatch(string $password): bool
    {
        return password_verify($password, $this->password);
    }

    public function jsonSerialize()
    {
        return $this->getIdentity();
    }
}