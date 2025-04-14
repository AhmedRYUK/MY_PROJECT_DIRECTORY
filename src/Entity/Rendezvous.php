<?php

namespace App\Entity;

use App\Repository\RendezvousRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezvousRepository::class)]
class Rendezvous{  #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Startup $startup = null;

    #[ORM\ManyToOne]
    private ?Expert $expert = null;

    #[ORM\Column]
    private \DateTimeInterface $dateRdv;

    #[ORM\Column]
    private string $statut;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;
}

