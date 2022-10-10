<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\ApiProperty;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ],
    paginationEnabled: false
)]
class Dependency {
    #[ApiProperty(
        identifier: true
    )]
    private string $uuid;
    #[ApiProperty(
        description: 'Nom de la dépendance'
    )]
    private string $name;
    #[ApiProperty(
        description: 'Version de la dépendance'
    )]
    private string $version;


    public function __constructor(
        string $uuid,
        string $name,
        string $version,
    ) 
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->version = $version;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}