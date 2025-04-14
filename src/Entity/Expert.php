<?php

namespace App\Entity;

use App\Repository\ExpertRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpertRepository::class)]
class Expert {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column]
    private string $specialite;

    #[ORM\Column(type: 'text')]
    private string $biographie;

    #[ORM\Column]
    private string $disponibilite;
}

