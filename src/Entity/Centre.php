<?php

namespace App\Entity;

use App\Repository\CentreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CentreRepository::class)]
class Centre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'centres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 100)]
    private ?string $ville = null;

    #[ORM\Column(type: "integer")]
    private ?int $capacité = null;

    #[ORM\Column(type: "float")]
    private ?float $tarification = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    // Getters et Setters...
}
