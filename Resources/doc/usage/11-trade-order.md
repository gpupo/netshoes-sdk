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
