<?php

namespace App\Controller;

use App\Form\ChangeEmailType;
use App\Form\ChangePasswordType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     * @IsGranted("ROLE_USER")
     */
	public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, UserRepository $user): Response
	{
        if (!$this->getUser()) {
            return $this->redirectToRoute('index');
        }

        $user = $this->getUser();

        $formEmail = $this->createForm(ChangeEmailType::class, $user);
        $formEmail->handleRequest($request);

        if ($formEmail->isSubmitted() && $formEmail->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Votre courriel a été mis à jour.');
        }

        $formPassword = $this->createForm(ChangePasswordType::class, $user);
        $formPassword->handleRequest($request);

        if ($formPassword->isSubmitted() && $formPassword->isValid()) {
            if ($passwordEncoder->isPasswordValid($user, $formPassword->get('oldPassword')->getData())) {
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $formPassword->get('plainPassword')->getData()
                    )
                );
                $entityManager->flush();

                $this->addFlash('success', 'Votre mot de passe a été mis à jour.');

                return $this->redirectToRoute('profil');
            } else {
                $this->addFlash('warning', 'Votre mot de passe est incorrect.');
            }
        }

        return $this->render('profil/index.html.twig', [
            'emailForm' => $formEmail->createView(),
            'passwordForm' => $formPassword->createView(),
			'user' => $user,
		]);
    }
}