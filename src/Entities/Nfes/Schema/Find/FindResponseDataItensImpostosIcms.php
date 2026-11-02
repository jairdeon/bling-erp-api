<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataItensImpostosIcms extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * @param ?int $st
     * @param ?int $origem
     * @param ?int $modalidade
     * @param ?float $aliquota
     * @param ?float $valor
     */
    public function __construct(
        public ?int $st,
        public ?int $origem,
        public ?int $modalidade,
        public ?float $aliquota,
        public ?float $valor,
    ) {
    }
}
