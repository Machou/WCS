<?php

namespace App\Entity;

use DateTime;
use App\Entity\Season;
use App\Entity\Category;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProgramRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ProgramRepository::class)
 * @UniqueEntity(fields="title", message="Ce titre existe déjà")
 * @Vich\Uploadable
 */
class Program
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Assert\NotBlank()
	 * @Assert\Length(max="255", maxMessage="Le titre ne peux pas contenir plus de {{ limit }} caractères.")
	 */
	private $title;

	/**
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank
	 * @Assert\Regex(pattern="/plus belle la vie/", match=false, message="On parle de vraies séries ici :P")
	 */
	private $summary;

	/**
	 * @Vich\UploadableField(mapping="poster_file", fileNameProperty="poster")
	 *
	 * @var File|null
	 */
	private $posterFile;

	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 *
	 * @var stirng
	 */
	private $poster;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $dateAdded;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 *
	 * @var Datetime
	 *
	 */
	private $updatedAt;

	/**
	 * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="programs")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $category;

	/**
	 * @ORM\OneToMany(targetEntity=Season::class, mappedBy="program")
	 * @ORM\OrderBy({"number" = "ASC"})
	 */
	private $seasons;

	/**
	 * @ORM\ManyToMany(targetEntity=Actor::class, mappedBy="programs")
	 */
	private $actors;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $slug;

	/**
	 * @ORM\ManyToOne(targetEntity=User::class, inversedBy="programs")
	 */
	private $owner;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $year;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $tmdb;

	public function __construct()
	{
		$this->seasons = new ArrayCollection();
		$this->actors = new ArrayCollection();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setTitle(string $title): self
	{
		$this->title = $title;

		return $this;
	}

	public function getSummary(): ?string
	{
		return $this->summary;
	}

	public function setSummary(string $summary): self
	{
		$this->summary = $summary;

		return $this;
	}

	public function getPoster()
	{
		return $this->poster;
	}

	public function setPoster(?string $poster): self
	{
		$this->poster = $poster;

		return $this;
	}

	public function setPosterFile(File $posterFile = null): Program
	{
		$this->posterFile = $posterFile;

		if ($posterFile) {
			$this->updatedAt = new DateTime('now');
		}

		return $this;
	}

	public function getPosterFile(): ?File
	{
		return $this->posterFile;
	}

	public function getCategory(): ?Category
	{
		return $this->category;
	}

	public function setCategory(?Category $category): self
	{
		$this->category = $category;

		return $this;
	}

	/**
	 * @return Collection|Season[]
	 */
	public function getSeasons(): Collection
	{
		return $this->seasons;
	}

	public function addSeason(Season $season): self
	{
		if (!$this->seasons->contains($season)) {
			$this->seasons[] = $season;
			$season->setProgram($this);
		}

		return $this;
	}

	public function removeSeason(Season $season): self
	{
		if ($this->seasons->removeElement($season)) {
			// set the owning side to null (unless already changed)
			if ($season->getProgram() === $this) {
				$season->setProgram(null);
			}
		}

		return $this;
	}

	/**
	 * @return Collection|Actor[]
	 */
	public function getActors(): Collection
	{
		return $this->actors;
	}

	public function addActor(Actor $actor): self
	{
		if (!$this->actors->contains($actor)) {
			$this->actors[] = $actor;
			$actor->addProgram($this);
		}

		return $this;
	}

	public function removeActor(Actor $actor): self
	{
		if ($this->actors->removeElement($actor)) {
			$actor->removeProgram($this);
		}

		return $this;
	}

	public function getSlug(): ?string
	{
		return $this->slug;
	}

	public function setSlug(string $slug): self
	{
		$this->slug = $slug;

		return $this;
	}

	public function getOwner(): ?User
	{
		return $this->owner;
	}

	public function setOwner(?User $owner): self
	{
		$this->owner = $owner;

		return $this;
	}

	public function getYear(): ?int
	{
		return $this->year;
	}

	public function setYear(int $year): self
	{
		$this->year = $year;

		return $this;
	}

	public function getTmdb(): ?string
	{
		return $this->tmdb;
	}

	public function setTmdb(string $tmdb): self
	{
		$this->tmdb = $tmdb;

		return $this;
	}

	public function getUpdatedAt(): ?\DateTimeInterface
	{
		return $this->updatedAt;
	}

	public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
	{
		$this->updatedAt = $updatedAt;
		$this->updatedAt = new DateTime('now');

		return $this;
	}

	public function getDateAdded(): ?\DateTimeInterface
	{
		return $this->dateAdded;
	}

	public function setDateAdded(\DateTimeInterface $dateAdded): self
	{
		$this->dateAdded = $dateAdded;

		return $this;
	}
}
