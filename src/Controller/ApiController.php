<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\KernelInterface;
use FOS\RestBundle\Controller\Annotations as Rest;

class ApiController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api")
    */
    public function updateTree(KernelInterface $kernel): JsonResponse
    {
        $list = file_get_contents($kernel->getProjectDir().'\list.json');

        return $this->json(json_decode($list, true));
    }
}
