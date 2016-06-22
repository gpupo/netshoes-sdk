<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\NetshoesSdk\Entity;

use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Entity\ManagerAbstract as CommonAbstract;
use Gpupo\CommonSdk\Entity\ManagerInterface;

abstract class ManagerAbstract extends CommonAbstract implements ManagerInterface
{
    protected function fetchDefaultParameters()
    {
        return [
        ];
    }

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|null
     */
    protected function fetchPrepare($data)
    {
        if (!empty($data)) {
            return $this->factoryEntityCollection($data);
        }
    }

    /**
     * @return Gpupo\Common\Entity\CollectionAbstract|null
     */
    public function findById($itemId)
    {
        $data = parent::findById($itemId);

        if (!empty($data)) {
            return $this->factoryEntity($data->toArray());
        }
    }

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent)
    {
        $text = 'Chamada a Atualização de entity ' . $this->entity;

        return $this->log('debug', $text, [
            'entity'   => $entity,
            'existent' => $existent,
        ]);
    }
}
