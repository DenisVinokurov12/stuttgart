<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
#[ORM\Table(name: '`categories`')]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private ?string $name = null;

    #[ORM\Column(type: 'string')]
    private ?string $label = null;

    #[ORM\Column(type: 'float')]
    private ?string $minPrice = null;

    #[ORM\Column(type: 'string')]
    private ?string $minDuration = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: Group::class, inversedBy: 'categories')]
    private Group $group;

    #[ORM\OneToMany(targetEntity: WorkPhoto::class, mappedBy: 'category')]
    private Collection $workphotos;

    #[ORM\OneToMany(targetEntity: Service::class, mappedBy: 'category')]
    private Collection $services;

    public function __construct()
    {
        $this->workphotos = new ArrayCollection();
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getMinPrice(): ?float
    {
        return $this->minPrice;
    }

    public function setMinPrice(string $minPrice): void
    {
        $this->minPrice = $minPrice;
    }

    public function getMinDuration(): ?string
    {
        return $this->minDuration;
    }

    public function setMinDuration(string $minDuration): void
    {
        $this->minDuration = $minDuration;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getGroup(): ?Group
    {
        return $this->group;
    }

    public function setGroup(?Group $group): self
    {
        $this->group = $group;

        return $this;
    }

    public function getWorkPhotos(): Collection
    {
        return $this->workphotos;
    }

    public function getServices(): Collection
    {
        return $this->services;
    }

}
