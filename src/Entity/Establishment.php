<?php

namespace App\Entity;

use App\Repository\EstablishmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EstablishmentRepository::class)]
class Establishment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private string $name;

    #[ORM\Column(type: 'integer')]
    #[Assert\NotBlank()]
    #[Assert\Range(min: 180000000, max: 459999999 )]
    private int $finess;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 255)]
    private string $address;

    #[ORM\Column(type: 'string', length: 3)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 3)]
    private string $department;

    #[ORM\Column(type: 'string', length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min: 2, max: 50)]
    private string $region;

    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank()]
    private float $geolocX;

    #[ORM\Column(type: 'float')]
    #[Assert\NotBlank()]
    private float $geolocY;

    /**
     * @var Collection<int, Map>
     */
    #[ORM\ManyToMany(targetEntity: Map::class)]
    private Collection $map;

    public function __construct()
    {
        $this->map = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getFiness(): ?int
    {
        return $this->finess;
    }
    public function setFiness(int $finess): static
    {
        $this->finess = $finess;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }
    public function setAddress(string $address): static
    {
        $this->address = $address;
        return $this;
    }

    public function getDepartment(): ?int
    {
        return $this->department;
    }
    public function setDepartment(int $department): static
    {
        $this->department = $department;
        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }
    public function setRegion(string $region): static
    {
        $this->region = $region;
        return $this;
    }

    public function getGeolocX(): ?float
    {
        return $this->geolocX;
    }
    public function setGeolocX(float $geolocX): static
    {
        $this->geolocX = $geolocX;
        return $this;
    }

    public function getGeolocY(): ?float
    {
        return $this->geolocY;
    }
    public function setGeolocY(float $geolocY): static
    {
        $this->geolocY = $geolocY;
        return $this;
    }

    /**
     * @return Collection<int, Map>
     */
    public function getMap(): Collection
    {
        return $this->map;
    }

    public function addMap(Map $map): static
    {
        if (!$this->map->contains($map)) {
            $this->map->add($map);
        }

        return $this;
    }

    public function removeMap(Map $map): static
    {
        $this->map->removeElement($map);
        return $this;
    }
}
