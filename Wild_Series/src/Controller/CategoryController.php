<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Program;
use App\Entity\Category;
use App\Form\CategoryType;

/**
* @Route("/categories", name="category_")
*/
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->findAll(
                ['name' => 'desc']
            );

        if (!$category) {
            throw $this->createNotFoundException(
                'No category found in category\'s table.'
            );
        }

        return $this->render('category/index.html.twig', [
            'categories' => $category
        ]);
    }

    /**
     * @Route("/new", name="new")
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request) : Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($category);
            $entityManager->flush();

            $this->addFlash('success', 'La catégorie a été ajoutée.');

            return $this->redirectToRoute('category_index');
        }

        return $this->render('category/new.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/{categoryName}", requirements={"id"="\d+"}, methods={"GET"}, name="show")
     */
    public function show(string $categoryName):Response
    {
        if (!$categoryName) {
            throw $this
                ->createNotFoundException('No '.$categoryName.' has been sent to find a category in category\'s table.');
        }

        $category = $this->getDoctrine()
        ->getRepository(Category::class)
        ->findOneBy(
            ['name' => $categoryName]
        );

        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findBy(
                ['category' => $category],
                ['id' => 'desc'],
                3
            );

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'programs' => $programs,
        ]);
    }
}