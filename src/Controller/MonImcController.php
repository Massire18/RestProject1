<?php

namespace App\Controller;

use App\Entity\MonImc;
use App\Form\MonImc1Type;
use App\Repository\MonImcRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/mon/imc")
 */
class MonImcController extends Controller
{
    /**
     * @Route("/", name="mon_imc_index", methods="GET")
     */
    public function index(MonImcRepository $monImcRepository): Response
    {
        return $this->render('mon_imc/index.html.twig', ['mon_imcs' => $monImcRepository->findAll()]);
    }

    /**
     * @Route("/new", name="mon_imc_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $monImc = new MonImc();
        $form = $this->createForm(MonImc1Type::class, $monImc);
        $form->handleRequest($request);
        if ($request->getMethod() == 'POST') 
        {
            if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($monImc);
            $em->flush();

            return $this->redirectToRoute('mon_imc_index');
        }
       return $this->render('mon_imc/new.html.twig', [
            'mon_imc' => $monImc,
            'form' => $form->createView(),
        ]);
     }
       

        return $this->render('mon_imc/new.html.twig', [
            'mon_imc' => $monImc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mon_imc_show", methods="GET")
     */
    public function show(MonImc $monImc): Response
    {
        return $this->render('mon_imc/show.html.twig', ['mon_imc' => $monImc]);
    }

    /**
     * @Route("/{id}/edit", name="mon_imc_edit", methods="GET|POST")
     */
    public function edit(Request $request, MonImc $monImc): Response
    {
        $form = $this->createForm(MonImc1Type::class, $monImc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mon_imc_edit', ['id' => $monImc->getId()]);
        }

        return $this->render('mon_imc/edit.html.twig', [
            'mon_imc' => $monImc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mon_imc_delete", methods="DELETE")
     */
    public function delete(Request $request, MonImc $monImc): Response
    {
        if ($this->isCsrfTokenValid('delete'.$monImc->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($monImc);
            $em->flush();
        }

        return $this->redirectToRoute('mon_imc_index');
    }
}
