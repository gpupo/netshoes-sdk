
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
$status->isPending(); // boolean ou RuntimeException code 404 (inexistente)
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
