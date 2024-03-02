<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{id}', name: 'category_page')]
    public function index(EntityManagerInterface $entityManager, string $id = ''): Response
    {
        /** @var Category $category */
        $category = $entityManager->getRepository(Category::class)->find($id);

        $services = $category->getServices()->getValues();

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'category' => $category,
            'services' => $services,
        ]);
    }

}
