
---

## Administração de Produtos

Para informações do formato de ``$data`` veja o arquivo ``vendor/gpupo/netshoes-sdk/Resources/fixture/Product/new.json``

### Acesso a lista de produtos cadastrados

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

### Acesso ao Status de um Product


``` php
<?php
//..
$status = $sdk->factoryManager('product')->fetchStatusById(9)); // Objeto Status
$status->isPending(); // boolean ou RuntimeException code 404 (inexixtente)
```

### Criação de um produto


```php
<?php
$product = $sdk->createProduct($data);
```

### Gravação de Product

```php
<?php
//..
$sdk->factoryManager('product')->save($product);
```

### Atualização de Product

``` php
<?php
$manager = $sdk->factoryManager('product');
$previous = $sdk->createProduct($previousData);
$product = $sdk->createPrevious($data);
$manager->update($product, $previous);
```

A atualização compara ``$product`` com ``$previous`` é uma instância de Product
para identificar apenas os campos que precisam de atualização;

Importante: ``$previous`` deve ser armazenada localmente, para reduzir a quantidade de requisições à API;

### Atualização de Sku

``` php
<?php
$manager = $sdk->factoryManager('sku');
$previous = $sdk->createSku($previousData);
$sku = $sdk->createSku($data);
$manager->update($sku, $previous);
```

A atualização compara o SKU atual com ``$previous`` é uma instância de Sku
para identificar apenas os campos que precisam de atualização;

Importante: ``$previous`` deve ser armazenada localmente, para reduzir a quantidade de requisições à API;

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
echo $sdk->factoryManager('order')->update($order)->getHttpStatusCode()); // 200
```

### Shipped

```php
<?php
//..
$order = $sdk->createOrder($data)->setOrderStatus('shipped');
$transport = $sdk->createTransport([
	"carrier"               => "Correios",
	"trackingNumber"        => "PJ521644335BR",
	"shipDate"              => "2016-05-10T10:46:00.000-03:00",
	"estimatedDeliveryDate" => "2016-05-10T10:46:00.000-03:00",
]);
$order->getShipping()->setTransport($transport);
echo $sdk->factoryManager('order')->update($order)->getHttpStatusCode()); // 200
```

### Delivered

```php
<?php
//..
$order = $sdk->createOrder($data)
	->setOrderStatus('delivered')
	->getShipping()->getTransport()
	->setDeliveryDate("2016-05-10T10:53:00.000-03:00");
echo $sdk->factoryManager('order')->update($order)->getHttpStatusCode()); // 200
```
## Trade Order

Acesso ao output padrão [Trading Order](https://github.com/gpupo/common-schema#schemas)

```php
<?php
//..
use Gpupo\NetshoesSdk\Entity\Order\Order;
use Gpupo\NetshoesSdk\Entity\Order\Manager;
//...
$manager = new Manager();
$tradeOrder = $manager->export($order);
```
