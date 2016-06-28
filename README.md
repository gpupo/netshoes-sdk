# Netshoes-SDK

SDK Não Oficial para integração a partir de aplicações PHP com as APIs da Netshoes Marketplace

[![Paypal Donations](https://www.paypalobjects.com/en_US/i/btn/btn_donate_SM.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EK6F2WRKG7GNN&item_name=netshoes-sdk)


## Requisitos

* PHP >= *5.6*
* [curl extension](http://php.net/manual/en/intro.curl.php)

## Direitos autorais e de licença

Este componente está sob a [licença MIT](https://github.com/gpupo/common-sdk/blob/master/LICENSE)

Para a informação dos direitos autorais e de licença você deve ler o arquivo
de [licença](https://github.com/gpupo/common-sdk/blob/master/LICENSE) que é distribuído com este código-fonte.

### Resumo da licença

Exigido:

- Aviso de licença e direitos autorais

Permitido:

- Uso comercial
- Modificação
- Distribuição
- Sublicenciamento
- Proibido

Proibido:

- Responsabilidade Assegurada

<!-- //licence -->
<!-- qa -->

---

## Indicadores de qualidade

[![Build Status](https://secure.travis-ci.org/gpupo/netshoes-sdk.png?branch=master)](http://travis-ci.org/gpupo/netshoes-sdk)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/gpupo/netshoes-sdk/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/gpupo/netshoes-sdk/?branch=master)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/fb9acd45d3bc42c1a5b45ebaeaa10401)](https://www.codacy.com/app/g/netshoes-sdk?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=gpupo/netshoes-sdk&amp;utm_campaign=Badge_Grade)
[![Code Climate](https://codeclimate.com/github/gpupo/netshoes-sdk/badges/gpa.svg)](https://codeclimate.com/github/gpupo/netshoes-sdk)
[![Test Coverage](https://codeclimate.com/github/gpupo/netshoes-sdk/badges/coverage.svg)](https://codeclimate.com/github/gpupo/netshoes-sdk/coverage)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/c59c4efb-173f-4008-b7e8-17a2586fb0f2/big.png)](https://insight.sensiolabs.com/projects/c59c4efb-173f-4008-b7e8-17a2586fb0f2)

[![StyleCI](https://styleci.io/repos/61658580/shield)](https://styleci.io/repos/61658580)
<!-- thanks -->

---

## Agradecimentos

* A todos os que [contribuiram com patchs](https://github.com/gpupo/netshoes-sdk/contributors);
* Aos que [fizeram sugestões importantes](https://github.com/gpupo/netshoes-sdk/issues);
* Aos desenvolvedores que criaram as [bibliotecas utilizadas neste componente](https://github.com/gpupo/netshoes-sdk/blob/master/Resources/doc/libraries-list.md).

 _- [Gilmar Pupo](http://www.g1mr.com/)_
<!-- install -->

---

## Instalação

Adicione o pacote ``netshoes-sdk`` ao seu projeto utilizando [composer](http://getcomposer.org):

    composer require gpupo/netshoes-sdk

---

## Uso

Este exemplo demonstra o uso simplificado a partir do ``Factory``:

```php
<?php

use Gpupo\NetshoesSdk\Factory;

$sdk = Factory::getInstance()->setup([
    'client_id'     => 'foo',
    'access_token'  => 'bar',
    'version'       => 'sandbox',
 ]);

$manager = $sdk->factoryManager('product');
```

Parâmetro | Descrição | Valores possíveis
----------|-----------|------------------
``client_id``|Chave da loja| string
``access_token``|Token de autorização da aplicação| string
``version``|Identificação do Ambiente| sandbox, prod (produção)
``registerPath``|Quando informado, registra no diretório informado, os dados de cada requisição executada


### Acesso a lista de produtos cadastrados:

```php
<?php
//..
$produtosCadastrados = $sdk->factoryManager('product')->fetch(); // Collection de Objetos Product

```

### Acesso a informações de um produto cadastrado e com identificador conhecido:


```php
<?php
//..
$produto = $sdk->factoryManager('product')->findById(9)); // Objeto Produto
echo $product->getName(); // Acesso ao nome do produto de Id 9
```

### Criação de um produto:


```php
<?php
//..
$data = []; // Veja o formato de $data em Resources/fixture/Product/ProductId.json
$product = $sdk->createProduct($data);
```

### Envio do produto para o Marketplace:


```php
<?php
//..
$sdk->factoryManager('product')->save($product);
```

### Registro (log)

```php
<?php
//..
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//..
$logger = new Logger('foo');
$logger->pushHandler(new StreamHandler('var/log/main.log', Logger::DEBUG));
$sdk->setLogger($logger);
```
<!-- console -->

---

## Console

Lista de comandos disponíveis:

    ./bin/console

Verificar suas credenciais Netshoes na linha de comando:

    ./bin/console credential:test

Verificar a situação de um produto:

    ./bin/console produto:view [id do produto]

Inserir um produto a partir de um arquivo json:

    ./bin/console  product:insert --file=Resources/fixture/Product/new.json

Exibe os SKUs de um produto:

    ./bin/console product:sku:view 14080

Mostra preço, estoque e situação de um SKU:

    ./bin/console product:sku:details 14080


Lista de Departamentos:

    ./bin/console templates:departments NS



### Configurações

Você poder criar um arquivo chamado ``app.json`` com suas configurações personalizadas, as quais serão utilizadas na linha de comando:

``` JSON
{
    "client_id": "foo",
    "access_token": "bar"
}
```

Utilize como modelo o arquivo ``app.json.dist``
<!-- links -->

---

## Links

* [Netshoes-sdk Composer Package](https://packagist.org/packages/gpupo/netshoes-sdk) no packagist.org
* [Documentação Oficial](http://developers.netshoes.com.br/api-portal/)
* [SDK Oficial](https://github.com/netshoes/marketplace-api-sdk-php)
* [Marketplace-bundle Composer Package](http://www.g1mr.com/MarkethubBundle/) - Integração deste pacote com Symfony
* [Outras SDKs para o Ecommerce do Brasil](http://www.g1mr.com/common-sdk/)
<!-- dev -->

---

## Desenvolvimento

    git clone --depth=1  git@github.com:gpupo/netshoes-sdk.git
    cd netshoes-sdk;
    ant;

Personalize a configuração do ``phpunit``:

    cp phpunit.xml.dist phpunit.xml;

Personalize os parâmetros!



*Dica*: Verifique os logs gerados em ``var/log/main.log``

---

## Propriedades dos objetos

### Client\Client


- [x] Sucesso ao definir options
- [x] Gerencia uri de recurso
- [x] Objeto request possui header
- [ ] Acesso a lista de pedidos
- [x] Acesso a lista de produtos

### Entity\Product\Manager


- [x] Administra operações de Products
- [x] Possui objeto client
- [x] Obtem lista de produtos cadastrados
- [x] Recupera informacoes de um produto especifico a partir de id

### Entity\Product\ProductCollection


- [x] Links
- [x] Instance
- [x] Possui objeto metadata
- [x] Metadata self
- [x] Metadata first
- [x] Metadata last

### Entity\Product\Product


- [x] Possui propriedades e objetos
- [x] Possui uma colecao attributes
- [x] Entrega json
- [x] Possui método ``getProductId()`` para acessar ProductId
- [x] Possui método ``setProductId()`` que define ProductId
- [x] Possui método ``getSkus()`` para acessar Skus
- [x] Possui método ``setSkus()`` que define Skus
- [x] Possui método ``getDepartment()`` para acessar Department
- [x] Possui método ``setDepartment()`` que define Department
- [x] Possui método ``getProductType()`` para acessar ProductType
- [x] Possui método ``setProductType()`` que define ProductType
- [x] Possui método ``getBrand()`` para acessar Brand
- [x] Possui método ``setBrand()`` que define Brand
- [x] Possui método ``getAttributes()`` para acessar Attributes
- [x] Possui método ``setAttributes()`` que define Attributes
- [x] Entidade é uma Coleção

### Entity\Product\Sku\Image


- [x] Possui método ``getUrl()`` para acessar Url
- [x] Possui método ``setUrl()`` que define Url
- [x] Entidade é uma Coleção

### Entity\Product\Sku\Item


- [x] Possui método ``getId()`` para acessar Sku Id
- [x] Possui método ``getSku()`` para acessar Sku
- [x] Possui método ``setSku()`` que define Sku
- [x] Possui método ``getName()`` para acessar Name
- [x] Possui método ``setName()`` que define Name
- [x] Possui método ``getDescription()`` para acessar Description
- [x] Possui método ``setDescription()`` que define Description
- [x] Possui método ``getColor()`` para acessar Color
- [x] Possui método ``setColor()`` que define Color
- [x] Possui método ``getSize()`` para acessar Size
- [x] Possui método ``setSize()`` que define Size
- [x] Possui método ``getGender()`` para acessar Gender
- [x] Possui método ``setGender()`` que define Gender
- [x] Possui método ``getEanIsbn()`` para acessar EanIsbn
- [x] Possui método ``setEanIsbn()`` que define EanIsbn
- [x] Possui método ``getVideo()`` para acessar Video
- [x] Possui método ``setVideo()`` que define Video
- [x] Possui método ``getHeight()`` para acessar Height
- [x] Possui método ``setHeight()`` que define Height
- [x] Possui método ``getWidth()`` para acessar Width
- [x] Possui método ``setWidth()`` que define Width
- [x] Possui método ``getDepth()`` para acessar Depth
- [x] Possui método ``setDepth()`` que define Depth
- [x] Possui método ``getWeight()`` para acessar Weight
- [x] Possui método ``setWeight()`` que define Weight
- [x] Entidade é uma Coleção

### Entity\Product\Sku\Manager


- [x] Administra operações de SKUs
- [x] Possui objeto client
- [x] Dá Acesso a lista de SKUs de um Product

### Entity\Product\Sku\PriceSchedule


- [x] Entidade é uma Coleção

### Entity\Product\Sku\Price


- [x] Possui método ``getPrice()`` para acessar Price
- [x] Possui método ``setPrice()`` que define Price
- [x] Entidade é uma Coleção

### Entity\Product\Sku\SkuCollection


- [x] Links
- [x] Instance
- [x] Possui objeto metadata
- [x] Metadata self

### Entity\Product\Sku\Status


- [x] Possui método ``getActive()`` para acessar Active
- [x] Possui método ``setActive()`` que define Active
- [x] Entidade é uma Coleção

### Entity\Product\Sku\Stock


- [x] Possui método ``getAvailable()`` para acessar Available
- [x] Possui método ``setAvailable()`` que define Available
- [x] Entidade é uma Coleção

### Entity\Templates\Brand


- [x] Possui Acesso a lista de marcas cadastradas
- [x] Cada objeto da lista é uma instância de Item

### Entity\Templates\Item


- [x] Possui método ``getCode()`` para acessar Code
- [x] Possui método ``setCode()`` que define Code
- [x] Possui método ``getName()`` para acessar Name
- [x] Possui método ``setName()`` que define Name
- [x] Possui método ``getExternalCode()`` para acessar ExternalCode
- [x] Possui método ``setExternalCode()`` que define ExternalCode
- [x] Entidade é uma Coleção

### Entity\Templates\TemplatesCollection


- [x] Links
- [x] Instance
- [x] Possui objeto metadata
- [x] Metadata self

### Factory


- [x] Centraliza acesso a managers
- [x] Centraliza criacao de objetos


## Lista de dependências (libraries)

 Name | Version | Description
 -----|---------|-----------------------------------------------------------------------------
codeclimate/php-test-reporter | v0.3.2 | PHP client for reporting test coverage to Code Climate
doctrine/annotations | v1.2.7 | Docblock Annotations Parser
doctrine/cache | v1.6.0 | Caching library offering an object-oriented API for many cache backends
doctrine/collections | v1.3.0 | Collections Abstraction library
doctrine/common | v2.5.3 | Common Library for Doctrine projects
doctrine/inflector | v1.1.0 | Common String Manipulations with regard to casing and singular/plural rules.
doctrine/instantiator | 1.0.5 | A small, lightweight utility to instantiate objects in PHP without invoking their constructors
doctrine/lexer | v1.0.1 | Base library for a lexer that can be used in Top-Down, Recursive Descent Parsers.
gpupo/cache | 1.3.0 | Caching library that implements PSR-6
gpupo/common | 1.6.5 | Common Objects
gpupo/common-sdk | 2.0.11 | Componente de uso comum entre SDKs para integração a partir de aplicações PHP com Restful webservices
guzzle/guzzle | v3.9.3 | PHP HTTP client. This library is deprecated in favor of https://packagist.org/packages/guzzlehttp/guzzle
monolog/monolog | 1.19.0 | Sends your logs to files, sockets, inboxes, databases and various web services
myclabs/deep-copy | 1.5.1 | Create deep copies (clones) of your objects
phpdocumentor/reflection-common | 1.0 | Common reflection classes used by phpdocumentor to reflect the code structure
phpdocumentor/reflection-docblock | 3.1.0 | With this component, a library can provide support for annotations via DocBlocks or otherwise retrieve information that is embedded in a DocBlock.
phpdocumentor/type-resolver | 0.2 |
phpspec/prophecy | v1.6.1 | Highly opinionated mocking framework for PHP 5.3+
phpunit/php-code-coverage | 4.0.0 | Library that provides collection, processing, and rendering functionality for PHP code coverage information.
phpunit/php-file-iterator | 1.4.1 | FilterIterator implementation that filters files based on a list of suffixes.
phpunit/php-text-template | 1.2.1 | Simple template engine.
phpunit/php-timer | 1.0.8 | Utility class for timing
phpunit/php-token-stream | 1.4.8 | Wrapper around PHP's tokenizer extension.
phpunit/phpunit | 5.4.6 | The PHP Unit Testing framework.
phpunit/phpunit-mock-objects | 3.2.3 | Mock Object library for PHPUnit
psr/cache | 1.0.0 | Common interface for caching libraries
psr/log | 1.0.0 | Common interface for logging libraries
satooshi/php-coveralls | v1.0.1 | PHP client library for Coveralls API
sebastian/code-unit-reverse-lookup 1.0.0 | Looks up which function or method a line of code belongs to
sebastian/comparator | 1.2.0 | Provides the functionality to compare PHP values for equality
sebastian/diff | 1.4.1 | Diff implementation
sebastian/environment | 1.3.7 | Provides functionality to handle HHVM/PHP environments
sebastian/exporter | 1.2.2 | Provides the functionality to export PHP variables for visualization
sebastian/global-state | 1.1.1 | Snapshotting of global state
sebastian/object-enumerator | 1.0.0 | Traverses array structures and object graphs to enumerate all referenced objects
sebastian/peek-and-poke | dev-master a8295e0 Proxy for accessing non-public attributes and methods of an object
sebastian/recursion-context | 1.0.2 | Provides functionality to recursively process PHP variables
sebastian/resource-operations | 1.0.0 | Provides a list of PHP built-in functions that operate on resources
sebastian/version | 2.0.0 | Library that helps with managing the version number of Git-hosted PHP projects
symfony/config | v3.1.1 | Symfony Config Component
symfony/console | v3.1.1 | Symfony Console Component
symfony/event-dispatcher | v2.8.7 | Symfony EventDispatcher Component
symfony/filesystem | v3.1.1 | Symfony Filesystem Component
symfony/polyfill-mbstring | v1.2.0 | Symfony polyfill for the Mbstring extension
symfony/stopwatch | v3.1.1 | Symfony Stopwatch Component
symfony/yaml | v3.1.1 | Symfony Yaml Component
twig/twig | v1.24.1 | Twig, the flexible, fast, and secure template language for PHP
webmozart/assert | 1.0.2 | Assertions to validate method input/output with nice error messages.
