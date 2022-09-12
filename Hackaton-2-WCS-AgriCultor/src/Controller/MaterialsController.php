<?php

namespace App\Controller;

use App\Entity\Materials;
use App\Form\MaterialsType;
use App\Repository\MaterialsRepository;
use App\Service\CalculService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/materials")
 */
class MaterialsController extends AbstractController
{
    /**
     * @Route("/", name="materials_index", methods={"GET"})
     */
    public function index(MaterialsRepository $materialsRepository): Response
    {
        return $this->render('materials/index.html.twig', [
            'materials' => $materialsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="materials_new", methods={"GET","POST"})
     */
    public function new(Request $request, CalculService $calculService): Response
    {
        $materials = new Materials();
        $form = $this->createForm(MaterialsType::class, $materials);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $materials->setOwner($this->getUser());
            $entityManager->persist($materials);
            $entityManager->flush();

            return $this->redirectToRoute('profile');
        }

        return $this->render('user/_addMaterial.html.twig', [
            'materials' => $materials,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="materials_show", methods={"GET"})
     */
    public function show(Materials $material): Response
    {
        return $this->render('materials/show.html.twig', [
            'material' => $material,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="materials_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Materials $material): Response
    {
        $form = $this->createForm(MaterialsType::class, $material);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('materials_index');
        }

        return $this->render('materials/edit.html.twig', [
            'material' => $material,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="materials_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Materials $material): Response
    {
        if ($this->isCsrfTokenValid('delete' . $material->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($material);
            $entityManager->flush();
        }

        return $this->redirectToRoute('materials_index');
    }
}
