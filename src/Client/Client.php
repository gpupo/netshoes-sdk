<?php

/*
 * This file is part of gpupo component
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
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
            'base_url'      => 'https:api-//{VERSION}.netshoes.com.br/api/v1',
            'version'       => 'sandbox',
            'verbose'       => false,
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
                throw new \InvalidArgumentException('[' . $key . '] ausente!');
            }

            $list[] = $key . ':' . $value;
        }

        return $list;
    }
}
