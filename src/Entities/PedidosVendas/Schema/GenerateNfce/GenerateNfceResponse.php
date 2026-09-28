<?php

namespace AleBatistella\BlingErpApi\Entities\PedidosVendas\Schema\GenerateNfce;

use AleBatistella\BlingErpApi\Entities\Shared\BaseResponseRootObject;
use AleBatistella\BlingErpApi\Entities\Shared\DTO\Request\ResponseOptions;

/**
 * Resposta da geração da nota fiscal eletrônica a partir do pedido de venda
 * pelo ID.
 */
readonly final class GenerateNfceResponse extends BaseResponseRootObject
{
    /**
     * Constrói o objeto.
     * 
     * @param int $idNotaFiscal
     */
    public function __construct(
        public int $idNotaFiscal
    ) {
    }

    /**
     * @inheritDoc
     *
     * A API devolve o id dentro de `data` (`{"data": {"idNotaFiscal": 123}}`), diferente do
     * OpenAPI oficial (`{"idNotaFiscal": 123}`). Os dois formatos são aceitos.
     */
    public static function fromResponse(ResponseOptions $response): static
    {
        if (is_null($response->body?->content)) {
            static::throwForInconsistentResponseOptions($response);
        }

        $content = $response->body->content;

        if (is_array($content['data'] ?? null)) {
            $content = $content['data'];
        }

        return self::from($content);
    }
}
