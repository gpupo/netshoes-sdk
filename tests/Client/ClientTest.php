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

namespace Gpupo\Tests\NetshoesSdk\Client;

use Gpupo\CommonSdk\Client\ClientInterface;
use Gpupo\NetshoesSdk\Client\Client;
use Gpupo\Tests\NetshoesSdk\TestCaseAbstract;

class ClientTest extends TestCaseAbstract
{
    /**
     * @covers \Gpupo\NetshoesSdk\Client\Client::getDefaultOptions
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function testSucessoAoDefinirOptions()
    {
        $client = $this->factoryClient();
        $this->assertInstanceOf('\Gpupo\CommonSdk\Client\ClientInterface', $client);

        return $client;
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testGerenciaUriDeRecurso(ClientInterface $client)
    {
        $this->assertSame(
            'http://api-sandbox.netshoes.com.br/api/v1/sku',
            $client->getResourceUri('/sku')
        );
    }

    /**
     * @depends testSucessoAoDefinirOptions
     */
    public function testObjetoRequestPossuiHeader(ClientInterface $client)
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
        if (!$this->hasToken()) {
            return $this->markSkipped('API Token ausente');
        }

        $response = $this->factoryClient()->get('/orders');
        $this->assertSame(200, $response->getHttpStatusCode());
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

    /**
     * @test Trata com a autenticação(HTTP headers)
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     */
    public function renderAuthorization()
    {
        $client = new Client([
            'client_id'    => 'x882ja',
            'access_token' => '8998329jejd',
        ]);

        $list = $this->proxy($client)->renderAuthorization();

        $this->assertStringStartsWith('client_id', $list[0]);
        $this->assertStringStartsWith('access_token', $list[1]);
    }

    /**
     * @testdox Falha ao ser usado sem credenciais
     * @covers \Gpupo\NetshoesSdk\Client\Client::renderAuthorization
     * @expectedException InvalidArgumentException
     * @test
     */
    public function renderAuthorizationFail()
    {
        $client = new Client();
        $this->proxy($client)->renderAuthorization();
    }
}
