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

/**
 * @codeCoverageIgnore
 */
$array = [
    //Product
    'product:post:simple'      => 'Cadastro de 4 produtos contendo apenas 1 Sku',
    'product:post:multiple'    => 'Cadastro de 4 produtos contendo mais de 1 Sku',
    'product:update'           => 'Atualizar parcialmente no mínimo 4 produtos criados. As alterações devem incluir department, productType e atributes',
    'product:update:full'      => 'Atualizar três produtos cadastrados. As atualizações devem mudar o produto por completo exceto ID e SKU',
    'product:translate:update' => 'Atualizar um produto a partir de um schema comum',
    //Sku
    'skus:post'               => 'Criação de no mínimo 4 novos Skus em produtos já existentes',
    'skus:update'             => 'Atualizar no mínimo 4 Skus existentes',
    'skus:put:status'         => 'Alterar status de 4 skus cadastrados',
    'skus:put:priceSchedules' => 'Criar agendamento de preço para no mínimo 4 Skus',
    'skus:put:prices'         => 'Atualizar preço de no mínimo 4 Skus',
    'skus:put:stock'          => 'Atualizar estoque de no mínimo 4 Skus',
    //orders
    'order:create' => 'Criar pelo menos doze pedidos com mais de um item',
    'order:status' => 'Mover pedidos',
];

foreach ([
    'brands',
    'colors',
    'flavors',
    'sizes',
    'departments',
    'productType',
    'attributes',
] as $i) {
    $array['templates:'.$i] = 'Acessar a lista de ['.$i.']';
}

return $array;
