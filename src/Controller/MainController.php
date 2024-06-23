<?php

namespace App\Controller;

use App\Entity\Group;
use App\Entity\Review;
use App\Entity\Special;
use App\Entity\WorkPhoto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_page')]
    public function index(EntityManagerInterface $entityManager): Response
    {
//        $this->trySendFormData();

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'groups' => $entityManager->getRepository(Group::class)->findAll(),
            'specials' => $entityManager->getRepository(Special::class)->findAll(),
            'reviews' => $entityManager->getRepository(Review::class)->findAll(),
            'galleryCategories' => $this->getPhotosByGroups(),
        ]);
    }

    protected function getPhotosByGroups()
    {
        $galleryCategories = [
            'polishing' => [
                'label' => 'Полировка',
                'images' => [],
                'video' => [],
            ],
            'washing' => [
                'label' => 'Мойка',
                'images' => [],
                'video' => [],
            ],
            'okleika' => [
                'label' => 'Оклейка',
                'images' => [],
                'video' => [],
            ],
            'bronning' => [
                'label' => 'Бронирование',
                'images' => [],
                'video' => [],
            ],
            'shumka' => [
                'label' => 'Шумоизоляция',
                'images' => [],
                'video' => [],
            ],
        ];

        foreach ($galleryCategories as $category => $data) {
            foreach(['images', 'video'] as $type) {
                try {
                    $finder = Finder::create()
                        ->in($type . '\\main\\works\\' . $category);
                } catch (\Exception $ex) {
                    continue;
                }

                $files = iterator_to_array($finder);

                if (empty($files)) {
                    continue 2;
                }

                foreach ($files as $file) {
                    $galleryCategories[$category][$type][] = $file->getPathname();
                }
            }
        }

        return $galleryCategories;
    }

    protected function trySendFormData()
    {
        dump($_REQUEST);die;
        $formData = $_REQUEST;

        if (empty($formData['name']) || empty($formData['phone']) || empty($formData['category'])) {
            return;
        }


    }

}
