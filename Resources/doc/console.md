
---

## Console

Lista de comandos disponíveis:

    ./bin/console

Verificar suas credenciais Netshoes na linha de comando:

    ./bin/console credential:test

Verificar a situação de um produto:

    ./bin/console produto:view [id do produto]

Você poder criar um arquivo chamado ``app.json`` com suas configurações personalizadas, as quais serão utilizadas na linha de comando:

``` JSON
{
    "client_id": "foo",
    "access_token": "bar"
}
```

Utilize como modelo o arquivo ``app.json.dist``
