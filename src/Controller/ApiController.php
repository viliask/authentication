<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
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
        $list = json_decode(file_get_contents($kernel->getProjectDir().'\list.json'), true);
        $tree = json_decode(file_get_contents($kernel->getProjectDir().'\tree.json'), true);

        $arrayIterator = new RecursiveArrayIterator($tree);
        $recursiveIterator = new RecursiveIteratorIterator($arrayIterator, \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($recursiveIterator as $key => $value) {
            if (is_array($value) && array_key_exists('id', $value)) {
                $value['name'] = 'Zdrowie i uroda';
                $currentDepth = $recursiveIterator->getDepth();
                for ($subDepth = $currentDepth; $subDepth >= 0; $subDepth--) {
                    $subIterator = $recursiveIterator->getSubIterator($subDepth);
                    $subIterator->offsetSet($subIterator->key(), ($subDepth === $currentDepth ? $value : $recursiveIterator->getSubIterator(($subDepth+1))->getArrayCopy()));
                }
            }
        }

        return $this->json($recursiveIterator->getArrayCopy());
    }
}
