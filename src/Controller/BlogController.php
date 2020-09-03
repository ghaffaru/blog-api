<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    public const POSTS = [
      [
          "id" => 1,
          "title" => "Title 1",
          "body" => "Body 1"
      ],
      [
          "id" => 2,
          "title" => "Title 2",
          "body" => "Body 3"
      ]
    ];
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->json([
            'posts' => self::POSTS
        ], 200);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id"="\d+"})
     */
    public function show($id)
    {
        return new JsonResponse([
            "post" => self::POSTS[array_search($id, array_column(self::POSTS, 'id'))]
        ]);
    }
}

