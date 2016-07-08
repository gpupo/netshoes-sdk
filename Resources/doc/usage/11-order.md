
## Administração de Pedidos

Fluxo de status dos pedidos:

``Created`` --> ``Approved`` --> ``Invoiced`` --> ``Shipped`` --> ``Delivered``

Para informações do formato de ``$data`` veja o arquivo ``vendor/gpupo/netshoes-sdk/Resources/fixture/Order/new.json``

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
