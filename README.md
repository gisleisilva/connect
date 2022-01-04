# Classe de conexão e acesso ao banco de dados
Centralização de execução de queries em uma classe, pois desta forma é possível garantir mais segurança e confiabilidade na aplicação.

## Instalação
```sh
composer install
```

## Configurações básicas
Edite o arquivo `source/Config.php` e adicione suas configurações de banco de dados
```php
<?php
define("DATABASE", [
    "driver" => "mydriver",
    "host" => "myhost",
    "port" => "myport",
    "dbname" => "mydbname",
    "username" => "mydbuser",
    "passwd" => "mydbpassword",
    "options" => [// configurações do PDO
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
?>
```

## Exemplo Simples
```php
require_once __DIR__ . '/vendor/autoload.php';

use Source\Database\Connect;

/*
 * GET PDO instance AND errors
 */
$connect = Connect::getInstance();
$error = Connect::getError();

/*
 * CHECK connection/errors
 */
if ($error) {
    echo $error->getMessage();
    exit;
}

/*
 * FETCH DATA
 */
$users = $connect->query("SELECT * FROM users LIMIT 5");
var_dump($users->fetchAll());
```
