
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
