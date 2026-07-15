<?php

namespace AleBatistella\BlingErpApi\Entities\Estoques;

use AleBatistella\BlingErpApi\Entities\Estoques\Schema\Create\CreateResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\FindBalance\FindBalanceResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\GetBalances\GetBalancesResponse;
use AleBatistella\BlingErpApi\Entities\Estoques\Schema\Update\UpdateResponse;
use AleBatistella\BlingErpApi\Entities\Shared\BaseEntity;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\RequestOptions;
use AleBatistella\BlingErpApi\Exceptions\BlingApiException;
use AleBatistella\BlingErpApi\Exceptions\BlingInternalException;

/**
 * Entidade para interação com estoques.
 *
 * @see https://developer.bling.com.br/referencia#/Estoques
 */
class Estoques extends BaseEntity
{
    /**
     * Obtém o saldo em estoque de produtos por depósito.
     * 
     * @param int $idDeposito ID do depósito
     * @param ?int[] $idsProdutos IDs dos produtos
     * @param ?string[] $codigos Códigos dos produtos
     * 
     * @return FindBalanceResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Estoques/get_estoques_saldos__idDeposito_
     */
    public function findBalance(
        int $idDeposito,
        ?array $idsProdutos = null,
        ?array $codigos = null
    ): FindBalanceResponse {
        $response = $this->repository->show(
            new RequestOptions(
                endpoint: "estoques/saldos/$idDeposito",
                queryParams: ['idsProdutos' => $idsProdutos, 'codigos' => $codigos]
            )
        );

        return FindBalanceResponse::fromResponse($response);
    }

    /**
     * Obtém o saldo em estoque de produtos.
     *
     * Aceita filtrar por IDs de produtos e/ou por códigos de produtos. Ambos os
     * parâmetros são enviados como _arrays_ na _query string_ (`idsProdutos[]`,
     * `codigos[]`), conforme a documentação do endpoint. Ao menos um deve ser
     * informado.
     *
     * @param ?int[] $idsProdutos IDs dos produtos
     * @param ?string[] $codigos Códigos dos produtos
     *
     * @return GetBalancesResponse
     * @throws BlingApiException|BlingInternalException
     *
     * @see https://developer.bling.com.br/referencia#/Estoques/get_estoques_saldos
     */
    public function getBalances(
        ?array $idsProdutos = null,
        ?array $codigos = null
    ): GetBalancesResponse {
        $response = $this->repository->index(
            new RequestOptions(
                endpoint: "estoques/saldos",
                queryParams: ['idsProdutos' => $idsProdutos, 'codigos' => $codigos]
            )
        );

        return GetBalancesResponse::fromResponse($response);
    }

    /**
     * Cria um registro de estoque.
     * 
     * @param array $body Corpo da requisição
     * 
     * @return CreateResponse
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Estoques/post_estoques
     */
    public function create(array $body): CreateResponse
    {
        $response = $this->repository->store(
            new RequestOptions(
                endpoint: "estoques",
                body: $body
            )
        );

        return CreateResponse::fromResponse($response);
    }

    /**
     * Altera um registro de estoque.
     * 
     * @param int $idEstoque ID do estoque
     * @param array $body Corpo da requisição
     * 
     * @return null
     * @throws BlingApiException|BlingInternalException
     * 
     * @see https://developer.bling.com.br/referencia#/Estoques/put_estoques__idEstoque_
     */
    public function update(int $idEstoque, array $body): null
    {
        $response = $this->repository->replace(
            new RequestOptions(
                endpoint: "estoques/$idEstoque",
                body: $body
            )
        );

        return UpdateResponse::fromResponse($response);
    }
}
