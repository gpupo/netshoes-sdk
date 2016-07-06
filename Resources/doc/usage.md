
---

## Uso para administração de Produtos

Este exemplo demonstra o uso simplificado a partir do ``Factory``:

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


### Acesso a lista de produtos cadastrados:

```php
<?php
//..
$produtosCadastrados = $sdk->factoryManager('product')->fetch(); // Collection de Objetos Product

```

### Acesso a informações de um produto cadastrado e com identificador conhecido:


```php
<?php
//..
$produto = $sdk->factoryManager('product')->findById(9)); // Objeto Produto
echo $product->getName(); // Acesso ao nome do produto de Id 9
```

### Criação de um produto:


```php
<?php
//..
$data = []; // Veja o formato de $data em Resources/fixture/Product/ProductId.json
$product = $sdk->createProduct($data);
```

### Envio do produto para o Marketplace:


```php
<?php
//..
$sdk->factoryManager('product')->save($product);
```

## Uso para administração de Pedidos

Fluxo de status dos pedidos:

Created --> Approved --> Invoiced --> Shipped --> Delivered

Para informações do formato de ``$data`` veja o arquivo ``Resources/fixtures/Order/new.json``


Movendo um pedido para ``Invoiced``:

```php
<?php
//..

	$order = $sdk->createOrder($data);
    $order->setOrderStatus('invoiced');

	$invoice = $sdk->createInvoice([
		'number'    => 4003,
		'line'      => 1,
		'accessKey' => '1789616901235555001000004003000004003',
		'issueDate' => '2016-05-10T09:44:54.000-03:00',
	]);

	$order->getShipping()->setInvoice($invoice);

	echo $sdk->factoryManager('order')->updateStatus($order)->getHttpStatusCode()); // 200
}
