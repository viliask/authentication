<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user", methods="GET")
     */
    public function index(UserRepository $userRepository, Request $request, PaginatorInterface $paginator): Response
    {
        $users = $userRepository->findAll();

        $result = $paginator->paginate(
            $users,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('user/index.html.twig', [
            'users' => $result,
        ]);
    }

    /**
     * @Route(
     *     "/{id}/activate",
     *     name="user_activate",
     *     requirements={"id" = "\d+"},
     *     methods="GET"
     * )
     */
    public function activate(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user->setDisabled(false));
        $entityManager->flush();

        return $this->redirectToRoute('user');
    }

    /**
     * @Route(
     *     "/{id}/deactivate",
     *     name="user_deactivate",
     *     requirements={"id" = "\d+"},
     *     methods="GET"
     * )
     */
    public function deactivate(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user->setDisabled(true));
        $entityManager->flush();

        return $this->redirectToRoute('user');
    }
}
