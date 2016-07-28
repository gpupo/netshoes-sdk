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

namespace Gpupo\NetshoesSdk\Entity\Order;

use DateInterval;
use DateTime;
use Gpupo\CommonSdk\Entity\EntityInterface;
use Gpupo\CommonSdk\Response;
use Gpupo\CommonSdk\Traits\LoadTrait;
use Gpupo\CommonSdk\Traits\TranslatorManagerTrait;
use Gpupo\NetshoesSdk\Entity\AbstractManager;

final class Manager extends AbstractManager
{
    use TranslatorManagerTrait;
    use LoadTrait;

    protected $entity = 'Order';

    /**
     * @codeCoverageIgnore
     */
    protected function setUp()
    {
        $this->maps = $this->loadArrayFromFile(__DIR__.'/map/restful.map.php');
    }

    public function factoryDecorator(Order $order, $decoratorName)
    {
        $className = __NAMESPACE__.'\\Decorator\\'.$decoratorName;
        $instance = new $className();
        $instance->setOrder($order);

        return $instance;
    }

    /**
     * {@inheritdoc}
     */
    public function update(EntityInterface $entity, EntityInterface $existent = null)
    {
        if (!empty($existent)) {
            if ($entity->getOrderStatus() === $existent->getOrderStatus()) {
                $this->log('info', 'Order sem atualização');

                return false;
            }
        }

        if ('processing' === $entity->getOrderStatus()) {
            return new Response([
                'raw'            => '{"message":"Order status not used"}',
                'httpStatusCode' => 204,
            ]);
        }

        if (in_array($entity->getOrderStatus(), ['approved', 'canceled',
            'delivered', 'invoiced', 'shipped', ], true)) {
            $decorator = $this->factoryDecorator($entity, 'Status\\'.ucfirst($entity->getOrderStatus()));
            $json = $decorator->toJson();
            $mapKey = 'to'.ucfirst($entity->getOrderStatus());
            $shipping = $entity->getShipping();
            $code = $shipping->getShippingCode();
            $shipping->toJson();
            $map = $this->factoryMap($mapKey, [
                'orderNumber'  => $entity->getOrderNumber(),
                'itemId'       => $entity->getOrderNumber(),
                'shippingCode' => $code,
            ]);

            return $this->execute($map, $json);
        }

        throw new \InvalidArgumentException('Order Status ['.$entity->getOrderStatus().'] não suportado', 1);
    }

    public function factoryTranslator(array $data = [])
    {
        $translator = new Translator($data);

        return $translator;
    }

    public function fetchQueue($offset = 0, $limit = 50, array $parameters = [])
    {
        $date = new DateTime();
        $date->sub(new DateInterval('P4D'));

        return $this->translatorFetch($offset, $limit, array_merge([
            'orderStatus'    => 'approved',
            'orderStartDate' => $date->format('Y-m-d'),
        ], $parameters));
    }
}
