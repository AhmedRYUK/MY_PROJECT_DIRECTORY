<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]       
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column(name: "mot_de_passe", length: 255)]
    private ?string $motDePasse = null;

    #[ORM\Column(name: "nom_complet", length: 255)]
    private ?string $nomComplet = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(name: "cree_le")]
    private ?\DateTimeImmutable $creeLe = null;

    #[ORM\Column]
    private bool $verifie = false;

    // Getters and setters

    public function getId(): ?int { return $this->id; }

    public function getEmail(): ?string { return $this->email; }
    public function setEmail(string $email): self { $this->email = $email; return $this; }

    public function getMotDePasse(): ?string { return $this->motDePasse; }
    public function setMotDePasse(string $mdp): self { $this->motDePasse = $mdp; return $this; }

    public function getNomComplet(): ?string { return $this->nomComplet; }
    public function setNomComplet(string $nom): self { $this->nomComplet = $nom; return $this; }

    public function getTelephone(): ?string { return $this->telephone; }
    public function setTelephone(?string $tel): self { $this->telephone = $tel; return $this; }

    public function getType(): ?string { return $this->type; }
    public function setType(string $type): self { $this->type = $type; return $this; }

    public function getCreeLe(): ?\DateTimeImmutable { return $this->creeLe; }
    public function setCreeLe(\DateTimeImmutable $date): self { $this->creeLe = $date; return $this; }

    public function isVerifie(): bool { return $this->verifie; }
    public function setVerifie(bool $v): self { $this->verifie = $v; return $this; }
}
