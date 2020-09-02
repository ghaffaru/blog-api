<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class BlogController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return new JsonResponse([
            'message' => 'Blog API is running'
        ]);
    }
}

