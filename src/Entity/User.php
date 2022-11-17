<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"nom is required")]
    private ?string $nom_user = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"prenom is required")]
    private ?string $prenom_user = null;


    #[ORM\Column]
    #[Assert\NotBlank(message:"role is required")]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank(message:"password is required")]
    private ?string $password = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message:"Email is required")]
    #[Assert\Email(message:"The email '{{ value }}' is not a valid email ")]
    private ?string $email = null;
    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"poste is required")]
    private ?string $poste = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"num carte banquaire is required")]
    private ?int $num_carte_bancaire = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"tel is required")]
    private ?int $tel = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"lieu de naissance is required")]
    private ?string $lieu_ns = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"civilité is required")]
    private ?string $civilite = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"date de naissance is required")]
    private ?string $date_ne = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"situation is required")]
    private ?string $situation = null;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNomUser(): ?string
    {
        return $this->nom_user;
    }

    public function setNomUser(string $nom_user): self
    {
        $this->nom_user = $nom_user;

        return $this;
    }

    public function getPrenomUser(): ?string
    {
        return $this->prenom_user;
    }

    public function setPrenomUser(string $prenom_user): self
    {
        $this->prenom_user = $prenom_user;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
   
 public function getRoles(): array
 {
     $roles = $this->roles;
     // guarantee every user at least has ROLE_USER
     $roles[] = 'ROLE_USER';

     return array_unique($roles);
 }

 public function setRoles(array $roles): self
 {
     $this->roles = $roles;

     return $this;
 }
    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getNumCarteBancaire(): ?int
    {
        return $this->num_carte_bancaire;
    }

    public function setNumCarteBancaire(int $num_carte_bancaire): self
    {
        $this->num_carte_bancaire = $num_carte_bancaire;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getLieuNs(): ?string
    {
        return $this->lieu_ns;
    }

    public function setLieuNs(string $lieu_ns): self
    {
        $this->lieu_ns = $lieu_ns;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getDateNe(): ?string
    {
        return $this->date_ne;
    }

    public function setDateNe(string $date_ne): self
    {
        $this->date_ne = $date_ne;

        return $this;
    }

    public function getSituation(): ?string
    {
        return $this->situation;
    }

    public function setSituation(string $situation): self
    {
        $this->situation = $situation;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
