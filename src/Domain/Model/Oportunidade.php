<?php
/**
 * Created by PhpStorm.
 * User: lab05usuario26
 * Date: 12/05/2018
 * Time: 14:49
 */

namespace Domain\Model;

class Oportunidade
{

    /**
     * @var int
     */
    private $idOportunidade;

    /*
     * @var string
     * @Serializer\SerializedName("descricao")
     * @Serializer\Type("string")
     */
    private $descricao;

    /*
     * @var \DateTime
     * @Serializer\SerializedName("periodoInicial")
     * @Serializer\Type("DateTime<'d/m/Y'>")
     */
    private $periodoInicial;

    /*
     * @var \DateTime
     * @Serializer\SerializedName("periodoFinal")
     * @Serializer\Type("DateTime<'d/m/Y'>")
     */
    private $periodoFinal;

    /*
     * Oportunidade constructor.
     * @param string $descricao
     * @param \DateTime $periodoInicial
     * @param \DateTime $periodoFinal
     */
    public function __construct(
        $descricao,
        \DateTime $periodoInicial,
        \DateTime $periodoFinal
    ) {
        $this->descricao = $descricao;
        $this->periodoInicial = $periodoInicial;
        $this->periodoFinal = $periodoFinal;
    }

    public function get($get){
        return $this->$get;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return \DateTime
     */
    public function getPeriodoInicial()
    {
        return $this->periodoInicial;
    }

    /**
     * @return \DateTime
     */
    public function getPeriodoFinal()
    {
        return $this->periodoFinal;
    }

    /*
     * @var int
     */
    private $qtdVagas;
}