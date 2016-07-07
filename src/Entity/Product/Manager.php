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

namespace Gpupo\NetshoesSdk\Entity\Product;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\NetshoesSdk\Entity\AbstractManager;
use Gpupo\NetshoesSdk\Factory;

class Manager extends AbstractManager
{
    protected $entity = 'Product';

    /**
     * @codeCoverageIgnore
     */
    protected $maps = [
        'save'     => ['POST', '/products'],
        'findById' => ['GET', '/products/{itemId}'],
        'patch'    => ['PATCH', '/products/{itemId}'],
        'update'   => ['PUT', '/products/{itemId}'],
        'fetch'    => ['GET', '/products?page={offset}&size={limit}'],
    ];

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {
        $previous = null;

        if ($existent) {
            $previous = $existent->getSkus()->first();
        }

        if (0 === $entity->getSkus()->count()) {
            throw new \InvalidArgumentException('Product precisa conter SKU!');
        }

        Factory::getInstance()->factoryManager('sku')
            ->update($entity->getSkus()->first(), $previous);

        return true;
    }
}
