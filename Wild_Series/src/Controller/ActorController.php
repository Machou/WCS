<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Form\ActorType;
use App\Service\Slugify;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


/**
 * @Route("/actor", name="actor_")
 */
class ActorController extends AbstractController
{
	/**
	 * @Route("/", name="index")
	 */
	public function index(): Response
	{
		$actors = $this->getDoctrine()
			->getRepository(Actor::class)
			->findAll();

		return $this->render('actor/index.html.twig', [
			'actors' => $actors,
		]);
	}

	/**
	 * @Route("/new", name="new", methods={"GET","POST"})
	 * @IsGranted("ROLE_ADMIN")
	 */
	public function new(Request $request, Slugify $slugify,): Response
	{
		$actor = new Actor();
		$form = $this->createForm(ActorType::class, $actor);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$entityManager = $this->getDoctrine()->getManager();

			// Slug le nom de l'acteur
			$slug = $slugify->generate($actor->getName());
			$actor->setSlug($slug);

			$entityManager->persist($actor);
			$entityManager->flush();

			return $this->redirectToRoute('actor_index');
		}

		return $this->render('actor/new.html.twig', [
			'actor' => $actor,
			'form' => $form->createView(),
		]);
	}

	/**
	 * @Route("/{slug}", name="show", methods={"GET"})
	 * @ParamConverter("actor", class="App\Entity\Actor", options={"mapping": {"slug": "slug"}})
	 */
	public function show(Actor $actor): Response
	{
		return $this->render('actor/show.html.twig', [
			'actor' => $actor,
		]);
	}

	/**
	 * @Route("/{slug}/edit", name="edit", methods={"GET","POST"})
	 * @ParamConverter("actor", class="App\Entity\Actor", options={"mapping": {"slug": "slug"}})
	 * @IsGranted("ROLE_ADMIN")
	 */
	public function edit(Request $request, Actor $actor): Response
	{
		$form = $this->createForm(ActorType::class, $actor);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			$actor->setUpdatedAt(new \DateTime('now'));

			$this->getDoctrine()->getManager()->flush();

			return $this->redirectToRoute('actor_index');
		}

		return $this->render('actor/edit.html.twig', [
			'actor' => $actor,
			'form' => $form->createView(),
		]);
	}

	/**
	 * @Route("/delete/{slug}", name="delete", methods={"DELETE"})
	 * @ParamConverter("actor", class="App\Entity\Actor", options={"mapping": {"slug": "slug"}})
	 * @IsGranted("ROLE_ADMIN")
	 */
	public function delete(Request $request, Actor $actor): Response
	{
		if ($this->isCsrfTokenValid('delete' . $actor->getSlug(), $request->request->get('_token'))) {
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->remove($actor);
			$entityManager->flush();
		}

		$this->addFlash('danger', 'L\'acteur a été supprimé.');

		return $this->redirectToRoute('actor_index');
	}
}
