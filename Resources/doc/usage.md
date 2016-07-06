
---

## Uso para administração de Produtos

Para informações do formato de ``$data`` veja o arquivo ``Resources/fixtures/Product/new.json``

### Acesso a lista de produtos cadastrados:

``` php
<?php
//..
$produtosCadastrados = $sdk->factoryManager('product')->fetch(); // Collection de Objetos Product

```

### Acesso a informações de um produto cadastrado e com identificador conhecido:


``` php
<?php
//..
$produto = $sdk->factoryManager('product')->findById(9)); // Objeto Produto
echo $product->getName(); // Acesso ao nome do produto de Id 9
```

### Criação de um produto:


```php
<?php
//..
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

A seguir seguem exemplos de mudanças de status de um pedido:

### Invoiced

```php
<?php
//..
$order = $sdk->createOrder($data)->setOrderStatus('invoiced');
$invoice = $sdk->createInvoice([
	'number'    => 4003,
	'line'      => 1,
	'accessKey' => '1789616901235555001000004003000004003',
	'issueDate' => '2016-05-10T09:44:54.000-03:00',
]);
$order->getShipping()->setInvoice($invoice);
echo $sdk->factoryManager('order')->updateStatus($order)->getHttpStatusCode()); // 200
```

### Shipped

```php
<?php
//..
$order = $sdk->createOrder($data)->setOrderStatus('shipped');
$transport = $sdk->createTransport([
    "carrier":"Correios",
    "trackingNumber":"PJ521644335BR",
    "shipDate":"2016-05-10T10:46:00.000-03:00",
    "estimatedDeliveryDate":"2016-05-10T10:46:00.000-03:00"
]);
$order->getShipping()->setTransport($transport);
echo $sdk->factoryManager('order')->updateStatus($order)->getHttpStatusCode()); // 200
```

### Delivered

```php
<?php
//..
$order = $sdk->createOrder($data)
	->setOrderStatus('delivered')
	->getShipping()->getTransport()
	->setDeliveryDate("2016-05-10T10:53:00.000-03:00");
echo $sdk->factoryManager('order')->updateStatus($order)->getHttpStatusCode()); // 200
```
