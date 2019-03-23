<?php

namespace App\Controller;

use App\Entity\MaTable;
use App\Form\MaTableType;
use App\Repository\MaTableRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;

/**
 * @Route("/ma/table")
 */
class MaTableController extends Controller
{
    /**
     * @Route("/", name="ma_table_index", methods="GET")
     */
    public function index(MaTableRepository $maTableRepository): Response
    {
        return $this->render('ma_table/index.html.twig', ['ma_tables' => $maTableRepository->findAll()]);
    }

    /**
     * @Route("/new", name="ma_table_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $maTable = new MaTable();
        $form = $this->createForm(MaTableType::class, $maTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($maTable);
            $em->flush();

            return $this->redirectToRoute('ma_table_index');
        }

        return $this->render('ma_table/new.html.twig', [
            'ma_table' => $maTable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ma_table_show", methods="GET")
     */
    public function show(MaTable $maTable): Response
    {
        return $this->render('ma_table/show.html.twig', ['ma_table' => $maTable]);
    }

    /**
     * @Route("/{id}/edit", name="ma_table_edit", methods="GET|POST")
     */
    public function edit(Request $request, MaTable $maTable): Response
    {
        $form = $this->createForm(MaTableType::class, $maTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ma_table_edit', ['id' => $maTable->getId()]);
        }

        return $this->render('ma_table/edit.html.twig', [
            'ma_table' => $maTable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ma_table_delete", methods="DELETE")
     */
    public function delete(Request $request, MaTable $maTable): Response
    {
        if ($this->isCsrfTokenValid('delete'.$maTable->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($maTable);
            $em->flush();
        }

        return $this->redirectToRoute('ma_table_index');
    }
}
