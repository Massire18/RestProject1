<?php

namespace App\Controller;


use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\MonImc;

class ImcController extends Controller
{
    /**
     * @Route("/", name="imc")
     */
    public function index()
    {
        return $this->render('imc/index.html.twig', [
            'controller_name' => 'ImcController',
        ]);
    }

    /**
     * Lists all Imc.
     * @FOSRest\Get("/imc")
     *
     * @return array
     */
    public function getImcAction()
    {
        $repository = $this->getDoctrine()->getRepository(MonImc::class);
        
        // query for a single Product by its primary key (usually "id")
        $imc = $repository->findall();
        
        return View::create($imc, Response::HTTP_OK , []);
    }

    /**
     * Create MonImc.
     * @FOSRest\Post("/imc_rest")
     *
     * @return array
     */
    public function postImcAction(Request $request)
    {
        $data = new MonImc();
        $data->setGender($request->get('gender'));
        $data->setName($request->get('name'));
        $data->setSurname($request->get('surname'));
        $data->setEmail($request->get('email'));
        $data->setAge($request->get('age'));
        $data->setWeight($request->get('weight'));
        $data->setHeight($request->get('height'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($data);
        $em->flush();
        return View::create($data, Response::HTTP_CREATED , []);
        
    }
}
