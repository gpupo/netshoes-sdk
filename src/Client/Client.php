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

namespace Gpupo\NetshoesSdk\Client;

use Gpupo\CommonSdk\Client\ClientAbstract;
use Gpupo\CommonSdk\Client\ClientInterface;

class Client extends ClientAbstract implements ClientInterface
{
    public function getDefaultOptions()
    {
        return [
            'client_id'     => false,
            'access_token'  => false,
            'base_url'      => 'http://api-{VERSION}.netshoes.com.br/api/v1',
            'version'       => 'sandbox',
            'verbose'       => true,
            'sslVersion'    => 'SecureTransport',
            'cacheTTL'      => 3600,
            'sslVerifyPeer' => true,
        ];
    }

    protected function renderAuthorization()
    {
        $list = [];

        foreach (['client_id', 'access_token'] as $key) {
            $value = $this->getOptions()->get($key);
            if (empty($value)) {
                throw new \InvalidArgumentException('['.$key.'] ausente!');
            }

            $list[] = $key.':'.$value;
        }

        return $list;
    }
}
