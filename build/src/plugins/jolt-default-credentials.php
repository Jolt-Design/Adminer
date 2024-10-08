<?php

class AdminerJoltDefaultCredentials {
    protected $envFields = [
        'MYSQL_HOST' => 'server',
        'MYSQL_USER' => 'username',
        'MYSQL_PASSWORD' => 'password',
        'MYSQL_DATABASE' => 'db',
    ];

    protected $password = null;

    protected $hasEnvs = false;

    function __construct() {
        foreach ($this->envFields as $envVar => $getVar) {
            $value = getenv($envVar);

            if (!$value) {
                continue;
            }

            $this->hasEnvs = true;

            if ($getVar === 'password') {
                $this->password = $value;
            } else if ($getVar === 'server') {
                if (empty($_GET['server']) && !defined('SERVER')) {
                    define('SERVER', $value);
                }
            } else {
                if (empty($_GET[$getVar])) {
                    $_GET[$getVar] = $value;
                }
            }
        }
    }

    function loginForm() {
        if ($this->hasEnvs) {
            echo '<p>Default settings are configured - press Login to use them.</p>';
        }
    }

    function credentials() {
        $password = get_password();

        if (!$password) {
            $password = $this->password;
        }

        return [
            SERVER,
            $_GET['username'],
            $password,
        ];
    }

    function login($username, $password) {
        return $password || $this->password !== '';
    }
}
