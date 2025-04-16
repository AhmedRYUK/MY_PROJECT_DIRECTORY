<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
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

    #[ORM\Column]
    private bool $isVerified = false;

    // 🔐 Méthodes requises par Symfony Security

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->motDePasse;
    }

    public function eraseCredentials(): void
    {
        // Si tu stockes des données temporaires sensibles, vide-les ici
    }

    public function getRoles(): array
    {
        return ['ROLE_' . strtoupper($this->type ?? 'USER')];
    }

    public function setRoles(array $roles): self
    {
        // Ce projet ne stocke pas de rôles séparément, donc on ignore cette méthode
        return $this;
    }

    // ✅ Getters & Setters

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

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }
}
