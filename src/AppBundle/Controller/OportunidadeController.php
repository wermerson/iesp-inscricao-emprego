<?php

/**
 * Created by PhpStorm.
 * User: lab05usuario26
 * Date: 12/05/2018
 * Time: 15:06
 */

namespace AppBundle\Controller;

use Domain\Model\Oportunidade;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OportunidadeController extends Controller
{
    /**
     * @Route("/oportunidade/salvar")
     * @Method("POST")
     * @param Request $request
     */
    public function SalvarAction(Request $request) {
        /*
        Exemplo .json:

        {
            "descricao": "Analista Programador",
            "periodoInicial": "01/06/2018",
            "periodoFinal": "01/07/2018"
        }

        {"descricao": "Analista Programador",
"periodoInicial": "01/06/2018",
"periodoFinal": "01/07/2018",
"qtdVagas": "3"
}

        dump($request);
        dump($request->getContent());
        */

        $serializerService = $this->get('infra.serializer.service');
        $oportunidadeService = $this->get('app.oportunidade.service');
        #dump($serializerService); die;

        try {
            $oportunidade = $serializerService->converter($request->getContent(), Oportunidade::class);
            $oportunidadeService->salvar($oportunidade);

            #dump($oportunidade);
            #dump($oportunidade->get('periodoInicial'));
            #die;
        } catch (\Exception $exception) {
            return new Response($exception->getMessage(), 400);
        }
        
        return new Response("Operação Concluída com Sucesso!");

    }


    /**
     * @Route("opotunidade/listar")
     */
    public function getOportunidadeAction(){
        $oportunidadeService = $this->get('app.oportunidade.service');
        $serializerService = $this->get('infra.serializer.service');

        try{
            $oportunidades = $oportunidadeService->listarTudo();
            #return new Response($oportunidadeService->listarTudo(), 200);
        } catch (\Exception $exception){
            return new Response($exception->getMessage(), 400);
        }

        return new Response($serializerService->toJsonByGroups($oportunidades, ['grupoTeste']));
    }
}