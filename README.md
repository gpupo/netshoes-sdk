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

### Client\Client


- [x] Sucesso ao definir options
- [x] Gerencia uri de recurso
- [ ] Objeto request possui header
- [ ] Acesso a lista de pedidos
- [ ] Acesso a lista de produtos

### Entity\Product\Manager


- [x] É o administrador de produtos
- [x] Possui objeto pool
- [x] Possui objeto client
- [x] Obtem lista de produtos cadastrados
- [x] Recupera informacoes de um produto especifico a partir de id
- [x] Guarda produtos em uma fila para gravacao em lote
- [x] Gerencia gravacao de produtos em lote

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

### Entity\Product\Sku\Item


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

