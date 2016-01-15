<?php

namespace ExampleLogin;

class Auth
{
    protected $username;
    protected $password;

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function submitLogin()
    {
        if ($this->username === "user" && $this->password === "password") {
            return "Access granted.";
        } else {
            return "Access denied.";
        }
    }
}
