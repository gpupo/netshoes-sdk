
### NetshoesSdk\Client\Client


- [x] Sucesso ao definir options
- [x] Gerencia uri de recurso
- [x] Objeto request possui header
- [ ] Acesso a lista de pedidos
- [x] Acesso a lista de produtos

### NetshoesSdk\Entity\Order\Order


- [x] Possui método ``getAgreedDate()`` para acessar AgreedDate 
- [x] Possui método ``setAgreedDate()`` que define AgreedDate 
- [x] Possui método ``getBusinessUnit()`` para acessar BusinessUnit 
- [x] Possui método ``setBusinessUnit()`` que define BusinessUnit 
- [x] Possui método ``getDevolutionRequested()`` para acessar DevolutionRequested 
- [x] Possui método ``setDevolutionRequested()`` que define DevolutionRequested 
- [x] Possui método ``getExchangeRequested()`` para acessar ExchangeRequested 
- [x] Possui método ``setExchangeRequested()`` que define ExchangeRequested 
- [x] Possui método ``getOrderDate()`` para acessar OrderDate 
- [x] Possui método ``setOrderDate()`` que define OrderDate 
- [x] Possui método ``getOrderNumber()`` para acessar OrderNumber 
- [x] Possui método ``setOrderNumber()`` que define OrderNumber 
- [x] Possui método ``getOrderStatus()`` para acessar OrderStatus 
- [x] Possui método ``setOrderStatus()`` que define OrderStatus 
- [x] Possui método ``getOrderType()`` para acessar OrderType 
- [x] Possui método ``setOrderType()`` que define OrderType 
- [x] Possui método ``getOriginNumber()`` para acessar OriginNumber 
- [x] Possui método ``setOriginNumber()`` que define OriginNumber 
- [x] Possui método ``getOriginSite()`` para acessar OriginSite 
- [x] Possui método ``setOriginSite()`` que define OriginSite 
- [x] Possui método ``getPaymentDate()`` para acessar PaymentDate 
- [x] Possui método ``setPaymentDate()`` que define PaymentDate 
- [x] Possui método ``getShippings()`` para acessar Shippings 
- [x] Possui método ``setShippings()`` que define Shippings 
- [x] Possui método ``getTotalCommission()`` para acessar TotalCommission 
- [x] Possui método ``setTotalCommission()`` que define TotalCommission 
- [x] Possui método ``getTotalDiscount()`` para acessar TotalDiscount 
- [x] Possui método ``setTotalDiscount()`` que define TotalDiscount 
- [x] Possui método ``getTotalFreight()`` para acessar TotalFreight 
- [x] Possui método ``setTotalFreight()`` que define TotalFreight 
- [x] Possui método ``getTotalGross()`` para acessar TotalGross 
- [x] Possui método ``setTotalGross()`` que define TotalGross 
- [x] Possui método ``getTotalNet()`` para acessar TotalNet 
- [x] Possui método ``setTotalNet()`` que define TotalNet 
- [x] Possui método ``getTotalQuantity()`` para acessar TotalQuantity 
- [x] Possui método ``setTotalQuantity()`` que define TotalQuantity 
- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Order\Shippings\Shipping


- [x] Possui método ``getShippingCode()`` para acessar ShippingCode 
- [x] Possui método ``setShippingCode()`` que define ShippingCode 
- [x] Possui método ``getCustomer()`` para acessar Customer 
- [x] Possui método ``setCustomer()`` que define Customer 
- [x] Possui método ``getFreightAmount()`` para acessar FreightAmount 
- [x] Possui método ``setFreightAmount()`` que define FreightAmount 
- [x] Possui método ``getInvoice()`` para acessar Invoice 
- [x] Possui método ``setInvoice()`` que define Invoice 
- [x] Possui método ``getItems()`` para acessar Items 
- [x] Possui método ``setItems()`` que define Items 
- [x] Possui método ``getSender()`` para acessar Sender 
- [x] Possui método ``setSender()`` que define Sender 
- [x] Possui método ``getStatus()`` para acessar Status 
- [x] Possui método ``setStatus()`` que define Status 
- [x] Possui método ``getTransport()`` para acessar Transport 
- [x] Possui método ``setTransport()`` que define Transport 
- [x] Possui método ``getCountry()`` para acessar Country 
- [x] Possui método ``setCountry()`` que define Country 
- [x] Possui método ``getCancellationReason()`` para acessar CancellationReason 
- [x] Possui método ``setCancellationReason()`` que define CancellationReason 
- [x] Possui método ``getDevolutionItems()`` para acessar DevolutionItems 
- [x] Possui método ``setDevolutionItems()`` que define DevolutionItems 
- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Product\Manager


- [x] Administra operações de Products
- [x] Possui objeto Client
- [x] Obtem a lista de produtos cadastrados
- [x] Recupera informações de um produto especifico a partir de Id
- [x] Recebe false em caso de produto inexistente

### NetshoesSdk\Entity\Product\ProductCollection


- [x] Links
- [x] Instance
- [x] Possui objeto metadata
- [x] Metadata self
- [x] Metadata first
- [x] Metadata last

### NetshoesSdk\Entity\Product\Product


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

### NetshoesSdk\Entity\Product\Sku\Image


- [x] Possui método ``getUrl()`` para acessar Url 
- [x] Possui método ``setUrl()`` que define Url 
- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Product\Sku\Item


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

### NetshoesSdk\Entity\Product\Sku\Manager


- [x] Administra operações de SKUs
- [x] Possui objeto client
- [x] Dá Acesso a lista de SKUs de um Product

### NetshoesSdk\Entity\Product\Sku\PriceSchedule


- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Product\Sku\Price


- [x] Possui método ``getPrice()`` para acessar Price 
- [x] Possui método ``setPrice()`` que define Price 
- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Product\Sku\SkuCollection


- [x] Links
- [x] Instance
- [x] Possui objeto metadata
- [x] Metadata self

### NetshoesSdk\Entity\Product\Sku\Status


- [x] Possui método ``getActive()`` para acessar Active 
- [x] Possui método ``setActive()`` que define Active 
- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Product\Sku\Stock


- [x] Possui método ``getAvailable()`` para acessar Available 
- [x] Possui método ``setAvailable()`` que define Available 
- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Templates\Brand


- [x] Possui Acesso a lista de marcas cadastradas
- [x] Cada objeto da lista é uma instância de Item

### NetshoesSdk\Entity\Templates\Item


- [x] Possui método ``getCode()`` para acessar Code 
- [x] Possui método ``setCode()`` que define Code 
- [x] Possui método ``getName()`` para acessar Name 
- [x] Possui método ``setName()`` que define Name 
- [x] Possui método ``getExternalCode()`` para acessar ExternalCode 
- [x] Possui método ``setExternalCode()`` que define ExternalCode 
- [x] Entidade é uma Coleção 

### NetshoesSdk\Entity\Templates\TemplatesCollection


- [x] Links
- [x] Instance
- [x] Possui objeto metadata
- [x] Metadata self

### NetshoesSdk\Factory


- [x] Centraliza acesso a managers 
- [x] Centraliza criacao de objetos 

