---

## Console

Lista de comandos disponíveis

```bash
$ ./vendor/bin/netshoes-sdk
```

Verificar suas credenciais Netshoes na linha de comando

```bash
$ ./vendor/bin/netshoes-sdk credential:test
```

### Product

Verificar a situação de um produto

```bash
$ ./vendor/bin/netshoes-sdk produto:view [id]
```

Inserir um produto a partir de um arquivo json

```bash
$ ./vendor/bin/netshoes-sdk  product:insert --file=vendor/gpupo/netshoes-sdk/Resources/fixture/Product/new.json
```

Atualizar um produto a partir de dois arquivos

```bash
$ ./vendor/bin/netshoes-sdk   product:update \
    --file-previous=Resources/fixture/Product/Update/previous.json \
    --file-current=Resources/fixture/Product/Update/current.json
```

Exibe os SKUs de um produto

```bash
$ ./vendor/bin/netshoes-sdk product:sku:view 14080
```

Mostra preço, estoque e situação de um SKU

```bash
$ ./vendor/bin/netshoes-sdk product:sku:details 14080
```

Atualizar um produto a partir de um arquivo json

```bash
$ ./vendor/bin/netshoes-sdk  product:sku:update --file=vendor/gpupo/netshoes-sdk/Resources/fixture/Product/Sku/update.json
```


### Templates

Lista de Departamentos

    ./vendor/bin/netshoes-sdk templates:departments NS

### Order

Detalhes de um pedido

```bash
$./vendor/bin/netshoes-sdk order:view 111111
```

Movendo um pedido para ``Approved`` a partir de seu número e informações contidas em arquivo

```bash
$ ./vendor/bin/netshoes-sdk order:update:to:approved 111111 --file=vendor/gpupo/netshoes-sdk/Resources/fixture/Order/Status/Request/toApproved.json
```

Movendo um pedido para ``Invoiced`` a partir de seu número e informações contidas em arquivo

```bash
$ ./vendor/bin/netshoes-sdk order:update:to:invoiced 111111 --file=vendor/gpupo/netshoes-sdk/Resources/fixture/Order/Status/Request/toInvoiced.json
```

Movendo um pedido para ``Shipped`` a partir de seu número e informações contidas em arquivo

```bash
$ ./vendor/bin/netshoes-sdk order:update:to:shipped 111111 --file=vendor/gpupo/netshoes-sdk/Resources/fixture/Order/Status/Request/toShipped.json
```

Movendo um pedido para ``Delivered`` a partir de seu número e informações contidas em arquivo

```bash
$ ./vendor/bin/netshoes-sdk order:update:to:delivered 111111 --file=vendor/gpupo/netshoes-sdk/Resources/fixture/Order/Status/Request/toDelivered.json
```

### Configurações

Você poder criar um arquivo chamado ``bin/.netshoes.json`` com suas configurações personalizadas, as quais serão utilizadas na linha de comando

```JSON
{
    "client_id": "foo",
    "access_token": "bar"
}
```

Utilize como modelo o arquivo ``bin/app.json.dist``
