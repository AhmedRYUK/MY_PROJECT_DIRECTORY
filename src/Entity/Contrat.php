<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Startup $startup = null;

    #[ORM\ManyToOne]
    private ?Centre $centre = null;

    #[ORM\Column]
    private \DateTimeInterface $debut;

    #[ORM\Column]
    private \DateTimeInterface $fin;

    #[ORM\Column]
    private string $statut;

    #[ORM\Column]
    private \DateTimeInterface $signeLe;
}

