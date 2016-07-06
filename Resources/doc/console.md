---

## Console

Lista de comandos disponíveis

```bash
$ ./bin/console
```

Verificar suas credenciais Netshoes na linha de comando

```bash
$ ./bin/console credential:test
```

### Product

Verificar a situação de um produto

```bash
$ ./bin/console produto:view [id do produto]
```

Inserir um produto a partir de um arquivo json

```bash
$ ./bin/console  product:insert --file=Resources/fixture/Product/new.json
```

Exibe os SKUs de um produto

```bash
$ ./bin/console product:sku:view 14080
```

Mostra preço, estoque e situação de um SKU

```bash
$ ./bin/console product:sku:details 14080
```

Atualizar um produto a partir de um arquivo json

```bash
$ ./bin/console  product:sku:update --file=Resources/fixture/Product/Sku/update.json
```


### Templates

Lista de Departamentos

    ./bin/console templates:departments NS

### Order

Detalhes de um pedido

```bash
$./bin/console order:view 111111
```

Movendo um pedido para ``Approved`` a partir de seu número e informações contidas em arquivo

```bash
$ ./bin/console order:update:to:approved 111111 --file=Resources/fixture/Order/Status/Request/toApproved.json
```

Movendo um pedido para ``Invoiced`` a partir de seu número e informações contidas em arquivo

```bash
$ ./bin/console order:update:to:invoiced 111111 --file=Resources/fixture/Order/Status/Request/toInvoiced.json
```

Movendo um pedido para ``Shipped`` a partir de seu número e informações contidas em arquivo

```bash
$ ./bin/console order:update:to:shipped 111111 --file=Resources/fixture/Order/Status/Request/toShipped.json
```

Movendo um pedido para ``Delivered`` a partir de seu número e informações contidas em arquivo

```bash
$ ./bin/console order:update:to:delivered 111111 --file=Resources/fixture/Order/Status/Request/toDelivered.json
```

### Configurações

Você poder criar um arquivo chamado ``app.json`` com suas configurações personalizadas, as quais serão utilizadas na linha de comando

```JSON
{
    "client_id": "foo",
    "access_token": "bar"
}
```

Utilize como modelo o arquivo ``app.json.dist``
