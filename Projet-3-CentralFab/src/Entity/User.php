<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity=Fablab::class, mappedBy="reservation")
     */
    private $reservations;

    /**
     * @ORM\ManyToMany(targetEntity=Fablab::class, mappedBy="creation")
     */
    private $creations;

    /**
     * @ORM\OneToMany(targetEntity=Fablab::class, mappedBy="user")
     */
    private $fablabs;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->creations = new ArrayCollection();
        $this->fablabs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection|Fablab[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Fablab $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->addReservation($this);
        }

        return $this;
    }

    public function removeReservation(Fablab $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeReservation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Fablab[]
     */
    public function getCreations(): Collection
    {
        return $this->creations;
    }

    public function addCreation(Fablab $creation): self
    {
        if (!$this->creations->contains($creation)) {
            $this->creations[] = $creation;
            $creation->addCreation($this);
        }

        return $this;
    }

    public function removeCreation(Fablab $creation): self
    {
        if ($this->creations->removeElement($creation)) {
            $creation->removeCreation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Fablab[]
     */
    public function getFablabs(): Collection
    {
        return $this->fablabs;
    }

    public function addFablab(Fablab $fablab): self
    {
        if (!$this->fablabs->contains($fablab)) {
            $this->fablabs[] = $fablab;
            $fablab->setUser($this);
        }

        return $this;
    }

    public function removeFablab(Fablab $fablab): self
    {
        if ($this->fablabs->removeElement($fablab)) {
            // set the owning side to null (unless already changed)
            if ($fablab->getUser() === $this) {
                $fablab->setUser(null);
            }
        }

        return $this;
    }
}
