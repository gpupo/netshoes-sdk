---

## Instalação

Adicione o pacote ``netshoes-sdk`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/netshoes-sdk


Acesso ao componente:

```php
<?php

use Gpupo\NetshoesSdk\Factory;

$sdk = Factory::getInstance()->setup([
    'client_id'     => 'foo',
    'access_token'  => 'bar',
    'version'       => 'sandbox',
 ]);

$manager = $sdk->factoryManager('product');
```

Parâmetro | Descrição | Valores possíveis
----------|-----------|------------------
``client_id``|Chave da loja| string
``access_token``|Token de autorização da aplicação| string
``version``|Identificação do Ambiente| sandbox, prod (produção)
``registerPath``|Quando informado, registra no diretório informado, os dados de cada requisição executada


### Registro (log)

Adicione log para as atividades do componente:
    
```php
<?php
//..
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//..
$logger = new Logger('foo');
$logger->pushHandler(new StreamHandler('var/log/main.log', Logger::DEBUG));
$sdk->setLogger($logger);
```
