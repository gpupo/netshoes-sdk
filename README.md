# Netshoes-SDK

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Netshoes Marketplace

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=netshoes-sdk)


## Requisitos

* PHP >= *5.6*
* [curl extension](http://php.net/manual/en/intro.curl.php)

## Licença

Este componente está sob a [licença MIT](https://github.com/gpupo/common-sdk/blob/master/LICENSE)

## Indicadores de qualidade

[![Build Status](https://secure.travis-ci.org/gpupo/netshoes-sdk.png?branch=master)](http://travis-ci.org/gpupo/netshoes-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/netshoes-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/netshoes-sdk/?branch=master)
[![Codacy Badge](https://www.codacy.com/project/badge/1289591352044e509187b0a9a3699332)](https://www.codacy.com/app/g/netshoes-sdk)
[![Code Climate](https://codeclimate.com/github/gpupo/netshoes-sdk/badges/gpa.svg)](https://codeclimate.com/github/gpupo/netshoes-sdk)
[![Test Coverage](https://codeclimate.com/github/gpupo/netshoes-sdk/badges/coverage.svg)](https://codeclimate.com/github/gpupo/netshoes-sdk/coverage)

## Agradecimentos

* A todos os que [contribuiram com patchs](https://github.com/gpupo/netshoes-sdk/contributors);
* Aos que [fizeram sugestões importantes](https://github.com/gpupo/netshoes-sdk/issues);
* Aos desenvolvedores que criaram as [bibliotecas utilizadas neste componente](https://github.com/gpupo/netshoes-sdk/blob/master/Resources/doc/libraries-list.md).

 _- [Gilmar Pupo](http://www.g1mr.com/)_

---

## Instalação

Adicione o pacote ``netshoes-sdk`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/netshoes-sdk

---

## Uso

Este exemplo demonstra o uso simplificado a partir do ``Factory``:

```PHP

///...
use Gpupo\NetshoesSdk\Factory;

$netshoesSdk = Factory::getInstance()->setup([
    'client_id'     => 'foo',
    'access_token'  => 'bar',
    'version'       => 'sandbox',
 ]);

$manager = $netshoesSdk->factoryManager('product'));

```

Parâmetro | Descrição | Valores possíveis
----------|-----------|------------------
``client_id``|Chave da loja| string
``access_token``|Token de autorização da aplicação| string
``version``|Identificação do Ambiente| sandbox, prod (produção)
``registerPath``|Quando informado, registra no diretório informado, os dados de cada requisição executada


### Acesso a lista de produtos cadastrados:

    $produtosCadastrados = $manager->fetch(); // Collection de Objetos Product

### Acesso a informações de um produto cadastrado e com identificador conhecido:

    $produto = $manager->findById(9)); // Objeto Produto
    echo $product->getTitle(); // Acesso ao nome do produto de Id 9


### Criação de um produto:

    $data = []; // Veja o formato de $data em Resources/fixture/Product/ProductId.json
    $product = $netshoesSdk->createProduct($data);

### Envio do produto para o Marketplace:

    $manager->save($product);

### Registro (log)

    //...
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    //..
    $logger = new Logger('foo');
    $logger->pushHandler(new StreamHandler('var/log/main.log', Logger::DEBUG));
    $netshoesSdk->setLogger($logger);

---


## Links

* [Netshoes-sdk Composer Package](https://packagist.org/packages/gpupo/netshoes-sdk) no packagist.org
* [Documentação Oficial](http://developers.netshoes.com.br/api-portal/)
* [SDK Oficial](https://github.com/netshoes/marketplace-api-sdk-php)
* [Marketplace-bundle Composer Package](http://www.g1mr.com/MarkethubBundle/) - Integração deste pacote com Symfony
* [Outras SDKs para o Ecommerce do Brasil](http://www.g1mr.com/common-sdk/)

---

## Desenvolvimento

    git clone --depth=1  git@github.com:gpupo/netshoes-sdk.git
    cd netshoes-sdk;
    ant;

Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Personalize os parâmetros!

---

## Comandos

Lista de comandos disponíveis:

    ./bin/console

Você pode verificar suas credenciais Netshoes na linha de comando:

    ./bin/console credential

Você poder criar um arquivo chamado ``app.json`` com suas configurações personalizadas, as quais serão utilizadas na linha de comando:

``` JSON
{
    "client_id": "foo",
    "access_token": "bar"
}
```

Utilize como modelo o arquivo ``app.json.dist``


*Dica*: Verifique os logs gerados em ``var/log/main.log``

---

## Propriedades dos objetos

<!--
Comando para geração da lista:

phpunit --testdox | grep -vi php |  sed "s/.*\[/-&/" | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/.*Gpupo.*/&\'$'\n/g' | sed 's/Gpupo\\Tests\\NetshoesSdk\\/### /g' > var/logs/testdox.txt
-->

A lista abaixo é gerada a partir da saída da execução dos testes:


### Client\Client


- [x] Sucesso ao definir options
- [x] Gerencia uri de recurso
- [x] Objeto request possui header
- [ ] Acesso a lista de pedidos
- [x] Acesso a lista de produtos

### Entity\Product\Manager


- [x] É o administrador de produtos
- [x] Possui objeto pool
- [x] Possui objeto client
- [x] Obtem lista de produtos cadastrados
- [x] Recupera informacoes de um produto especifico a partir de id
- [x] Guarda produtos em uma fila para gravacao em lote
- [x] Gerencia gravacao de produtos em lote

### Entity\Product\Product


- [x] Possui propriedades e objetos
- [x] Possui uma colecao attributes
- [x] Entrega json


### Factory


- [x] Centraliza acesso a managers
- [x] Centraliza criacao de objetos
