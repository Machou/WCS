<?php

namespace App\Controller;

use App\Entity\Projets;
use App\Form\ProjetsType;
use App\Repository\ProjetsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/projets")
 */
class ProjetsController extends AbstractController
{
    /**
     * @Route("/", name="projets_index", methods={"GET"})
     */
    public function index(ProjetsRepository $projetsRepository): Response
    {
        return $this->render('projets/index.html.twig', [
            'projets' => $projetsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="projets_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $projet = new Projets();
        $form = $this->createForm(ProjetsType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*
                Upload de la capture d'écran
            */
            $screenFile = $form->get('screen')->getData();

            if ($screenFile) {
                $originalFilename = pathinfo($screenFile->getClientOriginalName(), PATHINFO_FILENAME);

                // $safeFilename = $slugger->slug($originalFilename);
                $newFilename = uniqid().'.'.$screenFile->guessExtension();

                try {
                    $screenFile->move($this->getParameter('screens_directory'), $newFilename);
                } catch (FileException $e) {
                    $this->addFlash('danger', 'handle exception if something happens during file upload');
                }

                $projet->setScreen($newFilename);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($projet);
            $entityManager->flush();

            $this->addFlash('success', 'Le projet a été ajouté.');

            return $this->redirectToRoute('projets_index');
        }

        return $this->render('projets/new.html.twig', [
            'projet' => $projet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projets_show", methods={"GET"})
     */
    public function show(Projets $projet): Response
    {
        return $this->render('projets/show.html.twig', [
            'projet' => $projet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="projets_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Projets $projet, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ProjetsType::class, $projet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*
                Upload de la capture d'écran
            */
            $screenFile = $form->get('screen')->getData();

            if ($screenFile) {
                $originalFilename = pathinfo($screenFile->getClientOriginalName(), PATHINFO_FILENAME);

                // $safeFilename = $slugger->slug($originalFilename);
                $newFilename = uniqid().'.'.$screenFile->guessExtension();

                try {
                    $screenFile->move($this->getParameter('screens_directory'), $newFilename);
                } catch (FileException $e) {
                    $this->addFlash('danger', 'handle exception if something happens during file upload');
                }

                $projet->setScreen($newFilename);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('projets_index');
        }

        return $this->render('projets/edit.html.twig', [
            'projet' => $projet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="projets_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Projets $projet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$projet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($projet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('projets_index');
    }
}
