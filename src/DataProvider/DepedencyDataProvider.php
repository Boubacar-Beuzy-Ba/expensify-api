<?php

namespace App\DataProvider;

use ApiPlatform\State\ProviderInterface;
use ApiPlatform\State\RestrictedProviderInterface;
use App\Entity\Depedency;
use Ramsey\Uuid\Uuid;


class DependencyDataProvider implements ProviderInterface, RestrictedProviderInterface {

    public function __construct(private string $rootPath) {}


    public function getCollection(string $resourceClass, string $operationName = null, array $context = [])
    {
        $path = $this->rootPath . '/composer.json';
        $json = json_decode(file_get_contents($path), true);
        $items = [];
        foreach($json['require'] as $name => $version) {
            $items = new Dependency(Uuid::uuid5(Uuid::NAMESPACE_URL, $name)->toString(), $name, $version);
        }
        return $items;

    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool 
    {
        return $resourceClass === Dependency::class;
    }
}