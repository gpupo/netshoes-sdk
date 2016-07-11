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

/**
 * @codeCoverageIgnore
 */
$array = [
    //Product
    'product:post:simple'   => 'Cadastro de quatro produtos contendo apenas um Sku',
    'product:post:multiple' => 'Cadastro de quatro produtos contendo mais de um Sku',
    'product:update'        => 'Atualizar parcialmente no mínimo quatro produtos criados. As alterações devem incluir department, productType e atributes',
    'product:update:full'   => 'Atualizar três produtos cadastrados. As atualizações devem mudar o produto por completo exceto ID e SKU',
    //Sku
    'skus:post'               => 'Criação de no mínimo quatro novos Skus em produtos já existentes',
    'skus:update'             => 'Atualizar no mínimo quatro Skus existentes',
    'skus:put:status'         => 'Alterar status de quatro skus cadastrados',
    'skus:put:priceSchedules' => 'Criar agendamento de preço para no mínimo quatro Skus',
    'skus:put:prices'         => 'Atualizar preço de no mínimo quarto Skus',
    'skus:put:stock'          => 'Atualizar estoque de no mínimo quarto Skus',
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
