<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Expert $expert = null;

    #[ORM\Column]
    private string $titre;

    #[ORM\Column(type: 'text')]
    private string $description;

    #[ORM\Column]
    private float $prix;
}


