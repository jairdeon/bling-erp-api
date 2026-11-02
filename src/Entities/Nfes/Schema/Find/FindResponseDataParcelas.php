<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Schema\Id;

readonly final class FindResponseDataParcelas extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?string $data
     * @param ?float $valor
     * @param ?string $observacoes
     * @param ?string $caut
     * @param ?Id $formaPagamento
     */
    public function __construct(
        public ?string $data,
        public ?float $valor,
        public ?string $observacoes,
        public ?string $caut,
        public ?Id $formaPagamento,
    ) {
    }
}
