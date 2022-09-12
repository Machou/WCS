<?php

namespace App\Controller;

use App\Entity\Episode;
use App\Service\Slugify;
use App\Form\EpisodeType;
use Symfony\Component\Mime\Email;
use App\Repository\EpisodeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @Route("/episode")
 */
class EpisodeController extends AbstractController
{
    /**
     * @Route("/", name="episode_index", methods={"GET"})
     */
    public function index(EpisodeRepository $episodeRepository): Response
    {
        return $this->render('episode/index.html.twig', [
            'episodes' => $episodeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="episode_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request, Slugify $slugify, MailerInterface $mailer): Response
    {
        $episode = new Episode();
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            // Slug le titre de l'épisode
            $slug = $slugify->generate($episode->getTitle());
            $episode->setSlug($slug);

            $entityManager->persist($episode);
            $entityManager->flush();

            // Envoie d'email
            /*
            $email = (new Email())
            ->from($this->getParameter('mailer_from'))
            ->to('your_email@example.com')
            ->subject('Un nouvel épisode vient d\'être publié !')
            ->html($this->renderView('episode/newEpisodeEmail.html.twig', ['episode' => $episode]));

            $mailer->send($email);
            */

            $this->addFlash('success', 'L\'épisode a été ajouté.');

            return $this->redirectToRoute('episode_index');
        }

        return $this->render('episode/new.html.twig', [
            'episode' => $episode,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="episode_show", methods={"GET"})
     * @ParamConverter("episode", class="App\Entity\Episode", options={"mapping": {"slug": "slug"}})
     */
    public function show(Episode $episode, Slugify $slugify): Response
    {
        return $this->render('episode/show.html.twig', [
            'episode' => $episode,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="episode_edit", methods={"GET","POST"})
     * @ParamConverter("episode", class="App\Entity\Episode", options={"mapping": {"slug": "slug"}})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Episode $episode, Slugify $slugify): Response
    {
        $form = $this->createForm(EpisodeType::class, $episode);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On slug le titre de l'épisode
            $slug = $slugify->generate($episode->getTitle());
            $episode->setSlug($slug);

            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('success', 'L\'épisode a été modifié.');

            return $this->redirectToRoute('episode_index');
        }

        return $this->render('episode/edit.html.twig', [
            'episode' => $episode,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="episode_delete", methods={"DELETE"}, requirements={"id":"\d+"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Episode $episode): Response
    {
        if ($this->isCsrfTokenValid('delete'.$episode->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($episode);
            $entityManager->flush();
        }

        $this->addFlash('success', 'L\'épisode a été supprimé.');

        return $this->redirectToRoute('episode_index');
    }
}