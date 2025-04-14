<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Startup $startup = null;

    #[ORM\ManyToOne]
    private ?Service $service = null;

    #[ORM\ManyToOne]
    private ?Contrat $contrat = null;

    #[ORM\Column]
    private \DateTimeInterface $dateEmission;

    #[ORM\Column]
    private float $total;

    #[ORM\Column]
    private string $lienPdf;
}

