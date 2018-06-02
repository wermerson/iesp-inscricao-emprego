<?php
/**
 * Created by PhpStorm.
 * User: lab05usuario06
 * Date: 19/05/2018
 * Time: 14:15
 */

namespace AppBundle\Service;

use Domain\Model\Oportunidade;
use Domain\Repository\OportunidadeRepositoryInterface;
use Domain\Service\OportunidadeServiceInterface;

class OportunidadeService implements OportunidadeServiceInterface
{
    /**]
     * @var OportunidadeRepositoryInterface
     */
    private $oportunidadeRepository;

    /**
     * OportunidadeService constructor.
     * @param OportunidadeRepositoryInterface $oportunidadeRepository
     */
    public function __construct(
        OportunidadeRepositoryInterface $oportunidadeRepository
    )
    {
        $this->oportunidadeRepository = $oportunidadeRepository;
    }

    /**
     * @param Oportunidade
     * @return void
     */

    public function salvar(Oportunidade $oportunidade)
    {
        /* tudo que for de validação é feito aqui! */
        $this->oportunidadeRepository->salvar($oportunidade);
    }

    /**
     * @return array
     */

    public function listarTudo(){
        return $this->oportunidadeRepository->findAll();
    }
}