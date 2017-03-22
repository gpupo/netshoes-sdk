<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <contact@gpupo.com>
 * For the information of copyright and license you should read the file
 * LICENSE which is distributed with this source code.
 * Para a informação dos direitos autorais e de licença você deve ler o arquivo
 * LICENSE que é distribuído com este código-fonte.
 * Para obtener la información de los derechos de autor y la licencia debe leer
 * el archivo LICENSE que se distribuye con el código fuente.
 * For more information, see <https://www.gpupo.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

final class Item extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'sku';

    protected $exclude = ['price', 'priceSchedule', 'stock', 'status'];

    /**
     * @codeCoverageIgnore
     */
    public function getSchema()
    {
        return  [
            'sku'           => 'string',
            'name'          => 'string',
            'description'   => 'string',
            'color'         => 'string',
            'size'          => 'string',
            'gender'        => 'string',
            'eanIsbn'       => 'string',
            'images'        => 'object',
            'video'         => 'string',
            'height'        => 'string',
            'width'         => 'string',
            'depth'         => 'string',
            'weight'        => 'string',
            'price'         => 'object',
            'priceSchedule' => 'object',
            'stock'         => 'object',
            'status'        => 'object',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->setOptionalSchema($this->exclude);
    }

    /**
     * {@inheritdoc}
     */
    protected function beforeConstruct($data = null)
    {
        if (empty($data)) {
            return;
        }

        if (is_array($data)) {
            if (array_key_exists('stock', $data)) {
                $data['stock'] = ['available' => $data['stock']];
            }

            if (array_key_exists('listPrice', $data)) {
                $data['price'] = ['price' => $data['listPrice']];
                unset($data['listPrice']);
            }

            if (array_key_exists('sellPrice', $data)) {
                $data['priceSchedule'] = ['priceTo' => $data['sellPrice']];
                unset($data['sellPrice']);
            }

            if (array_key_exists('status', $data)) {
                $data['status'] = ['active' => $data['status']];
            }
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $a = parent::toArray();

        foreach ($this->exclude as $k) {
            unset($a[$k]);
        }

        return $a;
    }

    protected function toPrice()
    {
        return $this->getPrice()->toArray();
    }

    protected function toPriceSchedule()
    {
        return $this->getPriceSchedule()->toArray();
    }

    protected function toStatus()
    {
        return $this->getStatus()->toArray();
    }

    protected function toStock()
    {
        return $this->getStock()->toArray();
    }
}
