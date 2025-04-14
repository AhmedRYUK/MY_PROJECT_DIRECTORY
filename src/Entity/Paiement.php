<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaiementRepository::class)]
class Paiement {
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?User $payeur = null;

    #[ORM\ManyToOne]
    private ?Facture $facture = null;

    #[ORM\Column]
    private string $methode;

    #[ORM\Column]
    private string $statut;

    #[ORM\Column]
    private \DateTimeInterface $payeLe;

    #[ORM\Column]
    private float $montant;
}

