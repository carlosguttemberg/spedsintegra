<?php

namespace NFePHP\Sintegra\Elements;

/**
 *  Nota fiscal de serviços de comunicação e telecomunicações
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z76 extends Element implements ElementInterface
{
    const REGISTRO = '76';

    protected $parameters = [
        'CNPJ' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{11,14}$',
            'required' => true,
            'info' => 'CNPJ/CPF do tomador do serviço',
            'format' => 'totalNumber',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^ISENTO|[0-9]{2,14}$',
            'required' => false,
            'info' => 'Inscrição estadual do tomador do serviço',
            'format' => '',
            'length' => 14
        ],
        'COD_MOD' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{2}$',
            'required' => true,
            'info' => 'Código do modelo da nota fiscal',
            'format' => 'totalNumber',
            'length' => 2
        ],
        'SERIE' => [
            'type' => 'string',
            'regex' => '^[0-9]{1,2}$',
            'required' => true,
            'info' => 'Série do documento fiscal',
            'format' => '',
            'length' => 2
        ],
        'SUB_SERIE' => [
            'type' => 'string',
            'regex' => '^.{1,2}$',
            'required' => false,
            'info' => 'Série do documento fiscal',
            'format' => 'empty',
            'length' => 2
        ],
        'NUM_DOC' => [
            'type' => 'numeric',
            'regex' => '^[0-9]{1,10}$',
            'required' => true,
            'info' => 'Número do documento fiscal',
            'format' => 'totalNumber',
            'length' => 10
        ],
        'CFOP' => [
            'type' => 'numeric',
            'regex' => "^[1,2,3,5,6,7]{1}[0-9]{3}$",
            'required' => true,
            'info' => 'Código Fiscal de Operação e Prestação',
            'format' => '',
            'length' => 4
        ],
        'TIPO_RECEITA' => [
            'type' => 'string',
            'regex' => '^(1|2|3)$',
            'required' => true,
            'info' => 'Código da identificação do tipo de receita (1 Receita própria; 2 Receita de terceiros; 3 Ressarcimento - utilizar este código somente nas hipóteses de estorno de débito do imposto, em que as correspondentes deduções do valor do serviço, da base de cálculo e do respectivo imposto, são lançados no documento fiscal com sinal negativo nos termos do Convênio ICMS 126/98.)',
            'format' => 'empty',
            'length' => 1
        ],
        'DATA_EMISSAO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data de emissão na saída ou de recebimento na entrada',
            'format' => '',
            'length' => 8
        ],
        'UF' => [
            'type' => 'string',
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$',
            'required' => true,
            'info' => 'Sigla da Unidade da Federação do remetente',
            'format' => 'empty',
            'length' => 2
        ],
        'VL_TOTAL' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor total da nota fiscal (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'VL_BC_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Base de Cálculo do ICMS (com 2 decimais)',
            'format' => '11v2',
            'length' => 13
        ],
        'VL_ICMS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Montante do imposto (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'ISENTA_NTRIBUTADA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor amparado por isenção ou não incidência (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'OUTRAS' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor que não confira débito ou crédito do ICMS (com 2 decimais)',
            'format' => '10v2',
            'length' => 12
        ],
        'ALIQUOTA' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Alíquota do ICMS (valor inteiro)',
            'format' => 'totalNumber',
            'length' => 2
        ],
        'SITUACAO' => [
            'type' => 'string',
            'regex' => '^(S|N|E|X|2|4)$',
            'required' => true,
            'info' => 'Situação da Nota fiscal (N - Documento Fiscal Normal; S - Documento Fiscal Cancelado; E - Lançamento Extemporâneo de Documento Fiscal Normal; X - Lançamento Extemporâneo de Documento Fiscal Cancelado; 2 - Documento com USO DENEGADO; 4 - Documento com USO inutilizado)',
            'format' => '',
            'length' => 1
        ]
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
