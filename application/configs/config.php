<?php
$config = array(
    'production' => array(
        'db' => array(
            'host' => 'localhost',
            'username' => 'username',
            'password' => 'password',
            'db' => 'blue'
        )
    ),
    'dev' => array(
        'db' => array(
            'host' => 'localhost',
            'username' => 'devuser',
            'password' => 'devpassword',
            'db' => 'elephant'
        ),
        'recaptcha' => array(
            'publicKey' => 'wat',
            'privateKey' => 'ok'
        ),
        'debug' => array(
            'on' => true,
            'backtrace' => true,
            'globals' => true,
            'exception' => true
        ),
        'layout' => array(
            'default' => 'main.php'
        ),
        'security' => array(
            'token' => 'site-wide-secret-salt'
        )
    )
);
?>
