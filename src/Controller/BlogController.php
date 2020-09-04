<?php
namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Serializer;

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

    /**
     * @Route("/add", name="post_add", methods={"POST"})
     */
    public function store(Request $request)
    {
        /** @var Serializer $serializer */
        $serializer = $this->get('serializer');

        $post = $serializer->deserialize($request->getContent(), Post::class, 'json');

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($post);

        $entityManager->flush();

        return $this->json([
            'message' => 'Post Added',
            'post' => $post
        ]);
    }
}



