<?php

namespace App\Entity;

use App\Repository\StartupRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StartupRepository::class)]
class Startup
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'startups')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_entreprise = null;

    #[ORM\Column(length: 14)]
    private ?string $siret = null;

    #[ORM\Column(length: 100)]
    private ?string $secteur = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    // Getters et Setters...
}
