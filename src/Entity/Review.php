<?php

namespace App\Entity;

use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
#[ORM\Table(name: '`reviews`')]
class Review
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private ?string $clientName = null;

    #[ORM\Column(type: 'date')]
    private ?\DateTime $visitDate = null;

    #[ORM\Column(type: 'string')]
    private ?string $car = null;

    #[ORM\Column(type: 'string')]
    private ?string $service = null;

    #[ORM\Column(type: 'text')]
    private ?string $text = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientName(): ?string
    {
        return $this->clientName;
    }

    public function setClientName(string $clientName): void
    {
        $this->clientName = $clientName;
    }

    public function getVisitDate(): ?string
    {
        return $this->visitDate->format('d.m.Y');
    }

    public function setVisitDate(\DateTime $visitDate): void
    {
        $this->visitDate = $visitDate;
    }

    public function getCar(): ?string
    {
        return $this->car;
    }

    public function setCar(string $car): void
    {
        $this->car = $car;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): void
    {
        $this->service = $service;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

}
