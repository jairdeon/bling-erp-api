<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataItens extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * Em nota de entrada importada da SEFAZ, `codigo` é o código do produto no Bling (o vínculo feito
     * na importação), e não o código do fornecedor que está no XML.
     *
     * @param ?string $codigo
     * @param ?string $descricao
     * @param ?string $unidade
     * @param ?float $quantidade
     * @param ?float $valor
     * @param ?float $valorTotal
     * @param ?string $tipo
     * @param ?string $gtin
     * @param ?string $cfop
     * @param ?string $classificacaoFiscal
     * @param ?string $cest
     * @param ?int $origem
     * @param ?string $numeroPedidoCompra
     * @param ?string $informacoesAdicionais
     * @param ?FindResponseDataItensImpostos $impostos
     */
    public function __construct(
        public ?string $codigo,
        public ?string $descricao,
        public ?string $unidade,
        public ?float $quantidade,
        public ?float $valor,
        public ?float $valorTotal,
        public ?string $tipo,
        public ?string $gtin,
        public ?string $cfop,
        public ?string $classificacaoFiscal,
        public ?string $cest,
        public ?int $origem,
        public ?string $numeroPedidoCompra,
        public ?string $informacoesAdicionais,
        public ?FindResponseDataItensImpostos $impostos,
    ) {
    }
}
