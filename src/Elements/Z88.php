<?php

namespace NFePHP\Sintegra\Elements;

/**
 * Informações de exportações
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z88 extends Element implements ElementInterface
{
    const REGISTRO = '88';

    protected $parameters = [
        'TIPO' => [
            'type' => 'string',
            'regex' => '^.{1,3}$',
            'required' => true,
            'info' => 'Tipo do registro 88',
            'format' => 'totalNumber',
            'length' => 3
        ],
        'VERSAO_EAN' => [
            'type' => 'string',
            'regex' => '^.{1,2}$',
            'required' => true,
            'info' => 'Versão do código EAN informado',
            'format' => 'empty',
            'length' => 2
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'string',
            'regex' => '^.{1,14}$',
            'required' => true,
            'info' => 'Código do produto ou serviço do informante',
            'format' => 'empty',
            'length' => 14
        ],
        'DESCRICAO' => [
            'type' => 'string',
            'regex' => '^.{1,53}$',
            'required' => true,
            'info' => 'Descrição do produto ou serviço',
            'format' => 'empty',
            'length' => 53
        ],
        'EAN' => [
            'type' => 'string',
            'regex' => '^.{1,13}$',
            'required' => true,
            'info' => 'EAN do produto',
            'format' => 'empty',
            'length' => 13
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '^.{1,32}$',
            'required' => true,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 41
        ],
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REGISTRO);
        $this->std = $this->standarize($std);
    }
}
