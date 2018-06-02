<?php
/**
 * Created by PhpStorm.
 * User: ww
 * Date: 02/06/2018
 * Time: 14:11
 */

namespace AppBundle\Controller;


use Domain\Model\Inscricao;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscricaoController extends Controller
{
    /**
     * @Route ("/inscricao/inscrever")
     * @param Request $request
     */
    public function inscreverAction(Request $request)
    {
        $serializerService = $this->get('infra.serializer.service');
        /* {
            "candidato": {
                "nome": "Wermerson Washington Cavalcante Avelino",
                "email": "wermersonwca@gmail.com",
                "telefone": "83999118089",
                "habilidadesTecnicas": [{
                    "descricao": "PHP"
                }, {
                    "descricao": "Angular"
                } ],
                "experienciasProfissionais": [{
                    "cargo": "Programador",
                    "descricao": "Trabalho como programador full-stack.",
                    "periodoFinal": "01/07/2016",
                    "periodoFinal": "01/03/2022",
                    "trabalhoAtual": 1
                }]
            }
        } */

        try{
            $inscricao = $serializerService->converter($request->getContent(), Inscricao::class);
            dump($inscricao); die;
        }catch (\Exception $exception){
            return new Response($exception->getMessage(), 400);
        }

        return new Response('Inscrição realizada com sucesso.');
    }


}