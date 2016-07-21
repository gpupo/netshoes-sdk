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
    public function translatePrice($expected)
    {
        $sku = $expected['skus'][0];
        $product = new Product($expected);
        $first = $product->getSkus()->first();
        $this->assertSame($sku['listPrice'], $first->getPrice()->getPrice());
        $this->assertSame($sku['sellPrice'], $first->getPriceSchedule()->getPriceTo());
        $this->assertSame($sku['stock'], $first->getStock()->getAvailable());
        $this->assertSame($sku['status'], $first->getStatus()->getActive());
        $translator = new Translator(['native' => $product]);
        $foreign = $translator->translateTo();
        $this->assertSame($sku['listPrice'], $foreign->get('skus')[0]['listPrice']);
        $this->assertSame($sku['sellPrice'], $foreign->get('skus')[0]['sellPrice']);
        $this->assertSame($sku['stock'], $foreign->get('skus')[0]['stock']);
        $translator->setForeign($foreign);
        $translated = $translator->translateFrom();
        $tfirst = $translated->getSkus()->first();
        $this->assertSame($sku['listPrice'], $tfirst->getPrice()->getPrice());
        $this->assertSame($sku['status'], $tfirst->getStatus()->getActive());
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
                        'listPrice' => $price,
                        'sellPrice' => ($price * rand(40, 97)) / 100,
                        'stock'     => rand(),
                        'status'    => ($price > rand()),
                    ],
                ],
            ]];
        }

        return $list;
    }
}
