<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */

namespace Gpupo\NetshoesSdk\Entity\Product\Sku;

use Gpupo\CommonSdk\Entity\EntityAbstract;
use Gpupo\CommonSdk\Entity\EntityInterface;

class Item extends EntityAbstract implements EntityInterface
{
    protected $primaryKey = 'sku';

    protected $exclude = ['price','priceSchedule','stock'];

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

        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $a = parent::toArray();

        foreach($this->exclude as $k) {
            unset($a[$k]);
        }

        return $a;
    }
}
