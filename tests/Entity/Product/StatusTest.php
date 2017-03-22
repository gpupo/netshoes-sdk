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

namespace Gpupo\Tests\NetshoesSdk\Entity\Product;

use Gpupo\NetshoesSdk\Entity\Product\Status;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

/**
 * @coversDefaultClass \Gpupo\NetshoesSdk\Entity\Product\Status
 */
class StatusTest extends TestCaseAbstract
{
    /**
     * @testdox Identifica se um produto está pendente
     */
    public function isPending()
    {
        $status = new Status([
            'active'      => true,
            'statusMatch' => 'PROCESSANDO_INTEGRACAO_CATALOGO',
        ]);

        $this->assertTrue($status->isPending());
    }
}
