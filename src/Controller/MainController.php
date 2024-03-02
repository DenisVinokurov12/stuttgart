<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Review;
use App\Entity\Special;
use App\Entity\WorkPhoto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'groups' => $entityManager->getRepository(Group::class)->findAll(),
            'specials' => $entityManager->getRepository(Special::class)->findAll(),
            'reviews' => $entityManager->getRepository(Review::class)->findAll(),
            'worksPhotosByGroups' => $this->getPhonotsByGroups($entityManager),
        ]);
    }

    protected function getPhonotsByGroups(EntityManagerInterface $entityManager)
    {
        $workPhotosByCategory = [];
        $groups = $entityManager->getRepository(Group::class)->findAll();

        foreach ($groups as $group) {
            $workPhotosByCategory[$group->getName()]['group'] = $group;

            $categories = $group->getCategories()->getValues();

            foreach ($categories as $category) {
                $photos = $category->getWorkPhotos()->getValues();

                if (empty($photos)) {
                    continue;
                }

                $workPhotosByCategory[$group->getName()]['categories'][$category->getName()] = [
                    'category' => $category,
                    'photos' => array_filter($category->getWorkPhotos()->getValues(), function (WorkPhoto $photo) {
                        return file_exists('images/main/works/' . $photo->getPath());
                    }),
                ];
            }

            if (empty($workPhotosByCategory[$group->getName()]['categories'])) {
                unset($workPhotosByCategory[$group->getName()]);
            }
        }

        return $workPhotosByCategory;
    }

}
