<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\NetshoesSdk\Entity\Product\Product;
use Gpupo\NetshoesSdk\Entity\Product\Translator;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Translator
 */
class TranslatorTest extends TestCaseAbstract
{
    /**
     * @return \Gpupo\NetshoesSdk\Entity\Product\Translator
     */
    public function dataProviderTranslator()
    {
        $list = [];

        foreach ($this->providerProducts() as $product) {
            $translator = new Translator(['native' => $product]);

            $list[] = [$translator];
        }

        return $list;
    }

    /**
     * @testdox Falha ao tentar traduzir para extrangeiro sem possuir nativo
     * @expectedException \Gpupo\CommonSchema\TranslatorException
     * @expectedExceptionMessage Foreign object missed!
     * @covers ::translateFrom
     * @test
     */
    public function loadMapFailForeign()
    {
        $t = new Translator();
        $t->translateFrom();
    }

    /**
     * @testdox Falha ao tentar traduzir para nativo sem possuir estrangeiro
     * @expectedException \Gpupo\CommonSchema\TranslatorException
     * @expectedExceptionMessage Product missed!
     * @covers ::translateTo
     * @test
     */
    public function loadMapFailNative()
    {
        $t = new Translator();
        $t->translateTo();
    }

    /**
     * @testdox ``loadMap()``
     * @cover ::loadMap
     * @test
     * @dataProvider dataProviderArrayExpected
     */
    public function loadMap($expected)
    {
        $product = new Product($expected);

        $t = $this->proxy(new Translator());
        $foreign = new TranslatorDataCollection([
            'productId' => '111',
        ]);

        $t->setForeign($foreign);
        $t->setNative($product);
        $list = $t->loadMap('native');
        $this->assertSame($product->get('productId'), $list['productId']);
        $list = $t->loadMap('foreign');
        $this->assertSame($foreign->get('productId'), $list['productId']);
    }

    /**
     * @testdox ``translateTo()``
     * @cover ::translateTo
     * @dataProvider dataProviderTranslator
     * @test
     */
    public function translateTo(Translator $translator)
    {
        $translated = $translator->translateTo();
        $this->assertInstanceOf(TranslatorDataCollection::class, $translated);
        $this->assertInternalType('array', $translated->toArray(), 'internal type');
    }

    /**
     * @testdox ``translateFrom()``
     * @cover ::translateFrom
     * @dataProvider dataProviderTranslator
     * @test
     */
    public function translateFrom(Translator $translator)
    {
        $foreign = $translator->translateTo();
        $this->assertInstanceOf(TranslatorDataCollection::class, $foreign);
        $translator->setForeign($foreign);
        $translated = $translator->translateFrom();
        $this->assertInstanceOf(Product::class, $translated);
        $this->assertInternalType('array', $translated->toArray(), 'internal type');
    }

    /**
     * @testdox ``Traduz sem perder informação de preço``
     * @cover ::translateFrom
     * @cover ::translateTo
     * @dataProvider dataProviderArrayExpected
     * @test
     */
    public function translateViceVersa($expected)
    {
        $sku = $expected['skus'][0];
        $product = new Product($expected);

        $assertNative = function ($first, $o, $i = 1) use ($sku) {
            $o->assertSame($sku['listPrice'], $first->getPrice()->getPrice(), 'n)listPrice #'.$i);
            $o->assertSame($sku['sellPrice'], $first->getPriceSchedule()->getPriceTo(), 'n)sellPrice #'.$i);
            $o->assertSame($sku['stock'], $first->getStock()->getAvailable(), 'n)stock #'.$i);
            $o->assertSame($sku['status'], $first->getStatus()->getActive(), 'n)status #'.$i);
        };

        $assertForeign = function ($foreign, $o) use ($sku) {
            $o->assertSame($sku['listPrice'], $foreign->get('skus')[0]['listPrice'], 'f)listPrice');
            $o->assertSame($sku['sellPrice'], $foreign->get('skus')[0]['sellPrice'], 'f)sellPrice');
            $o->assertSame($sku['stock'], $foreign->get('skus')[0]['stock'], 'f)stock');
            $o->assertSame($sku['status'], $foreign->get('skus')[0]['status'], 'f)status');
        };

        $assertNative($product->getSkus()->first(), $this);
        $translator = new Translator(['native' => $product]);
        $foreign = $translator->translateTo();
        $assertForeign($foreign, $this);
        $translator->setForeign($foreign);
        $translated = $translator->translateFrom();
        $assertNative($translated->getSkus()->first(), $this, 2);
    }

    public function dataProviderArrayExpected()
    {
        $list = [];
        $i = 1;
        while ($i <= 50) {
            ++$i;
            $id = rand();
            $price = rand(100, 9999) / rand(3, 55);
            $list[] = [[
                'productId' => $id,
                'skus'      => [
                    [
                        'id'        => $id,
                        'listPrice' => (float) $price,
                        'sellPrice' => (float) ($price * rand(40, 97)) / 100,
                        'stock'     => rand(),
                        'status'    => ($price > rand()),
                    ],
                ],
            ]];
        }

        return $list;
    }
}
