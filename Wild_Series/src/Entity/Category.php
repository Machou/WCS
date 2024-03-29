<?php

namespace App\Entity;

use App\Entity\Program;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\OrderBy({"name" = "ASC"})
     * @Assert\NotBlank(message="Champ vide")
     * @Assert\Length(max="255", maxMessage="La catégorie saisie {{ value }} est trop longue, elle ne devrait pas dépasser {{ limit }} caractères")
    */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Program", mappedBy="category")
     * @ORM\OrderBy({"title" = "ASC"})
     */
    private $programs;

    public function __construct()
    {
        $this->programs = new ArrayCollection();
    }

    /**
     * @return Collection|Program[]
     */
    public function getPrograms(): Collection
    {
        return $this->programs;
    }

    /**
    * param Program $program
    * @return Category
    */
    public function addProgram(Program $program): self
    {
        if (!$this->programs->contains($program)) {
            $this->programs[] = $program;
            $program->setCategory($this);
        }

        return $this;
    }

    /**
     * @param Program $program
     * @return Category
     */
    public function removeProgram(Program $program): self
    {
        if ($this->programs->contains($program)) {
			$this->programs->removeElement($program);
			// set the owning side to null (unless already changed)
			if ($program->getCategory() === $this) {
				$program->setCategory(null);
			}
		}

         return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
