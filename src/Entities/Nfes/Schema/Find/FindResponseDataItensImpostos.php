<?php

namespace AleBatistella\BlingErpApi\Entities\Nfes\Schema\Find;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseObject;

readonly final class FindResponseDataItensImpostos extends BaseResponseObject
{
    /**
     * Constrói o objeto.
     *
     * A API devolve só o ICMS do item; PIS, COFINS e IPI ficam apenas no XML da nota.
     *
     * @param ?float $valorAproximadoTotalTributos
     * @param ?FindResponseDataItensImpostosIcms $icms
     */
    public function __construct(
        public ?float $valorAproximadoTotalTributos,
        public ?FindResponseDataItensImpostosIcms $icms,
    ) {
    }
}
