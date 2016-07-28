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

use Gpupo\CommonSchema\AbstractTranslator;
use Gpupo\CommonSchema\TranslatorDataCollection;
use Gpupo\CommonSchema\TranslatorInterface;

class Translator extends AbstractTranslator implements TranslatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function translateTo()
    {
        $native = $this->getNative();

        if (!$native instanceof Order) {
            throw new \Exception('Order missed!');
        }

        return $this->factoryOutputCollection(include __DIR__.'/map/translateTo.map.php');
    }

    /**
     * {@inheritdoc}
     */
    public function translateFrom()
    {
        $foreign = $this->getForeign();

        if (!$foreign instanceof TranslatorDataCollection) {
            throw new \Exception('Foreign missed!');
        }

        return new Order(include __DIR__.'/map/translateFrom.map.php');
    }
}
