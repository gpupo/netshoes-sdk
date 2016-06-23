<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Traits\PoolTrait;
use Gpupo\NetshoesSdk\Entity\ManagerAbstract;

class Manager extends ManagerAbstract
{
    use PoolTrait;

    protected $entity = 'Product';

    protected $maps = [
        'save'     => ['POST', '/products'],
        'findById' => ['GET', '/products/{itemId}'],
        'patch'    => ['PATCH', '/products/{itemId}'],
        'update'   => ['PUT', '/products/{itemId}'],
        'fetch'    => ['GET', '/products?page={offset}&size={limit}'],
    ];

    public function save(EntityInterface $product, $route = 'save')
    {
        $existent = $product->getPrevious();

        $this->log('INFO', 'save', ['route' => $route, 'existent' => $existent]);

        if ($existent) {
            return $this->update($product, $existent);
        }

        return $this->getPool()->add($product);
    }

    protected function getMap($route, Product $product)
    {
        return $this->factoryMap($route, ['itemId' => $product->getId()]);
    }

    public function commit()
    {
        if ($this->getPool()->count() > 0) {
            return $this->execute($this->factoryMap('save'), $this->getPool()->toJson());
        }

        return false;
    }
}
