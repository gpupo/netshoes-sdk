<?php

/*
 * This file is part of gpupo/netshoes-sdk
 * Created by Gilmar Pupo <g@g1mr.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * For more information, see <http://www.g1mr.com/>.
 */
namespace Gpupo\Tests\NetshoesSdk\Client;

use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    public function testSucessoAoDefinirOptions()
    {
        $client = $this->factoryClient();
        $this->assertInstanceOf('\Gpupo\CommonSdk\Client\ClientInterface', $client);

        return $client;
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testGerenciaUriDeRecurso($client)
    {
        $this->assertSame('http://api-sandbox.netshoes.com.br/api/v1/sku',
            $client->getResourceUri('/sku'));
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testObjetoRequestPossuiHeader($client)
    {
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $header = implode(';', $client->factoryRequest('/')->getHeader());

        foreach (['client_id', 'access_token'] as $key) {
            $this->assertContains($key, $header);
        }
    }

    /**
     * @requires extension curl
     */
    public function testAcessoAListaDePedidos()
    {
        $this->markIncomplete('Não implementado');
    }

    /**
     * @requires extension curl
     */
    public function testAcessoAListaDeProdutos()
    {
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $response = $this->factoryClient()->get('/products');
        $this->assertSame(200, $response->getHttpStatusCode());
    }
}
