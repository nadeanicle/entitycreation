<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CityRepository::class)]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'cities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Country $country = null;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: UserAcount::class)]
    private Collection $userAcounts;

    #[ORM\OneToMany(mappedBy: 'city', targetEntity: Property::class, orphanRemoval: true)]
    private Collection $properties;

    public function __construct()
    {
        $this->userAcounts = new ArrayCollection();
        $this->properties = new ArrayCollection();
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

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, UserAcount>
     */
    public function getUserAcounts(): Collection
    {
        return $this->userAcounts;
    }

    public function addUserAcount(UserAcount $userAcount): static
    {
        if (!$this->userAcounts->contains($userAcount)) {
            $this->userAcounts->add($userAcount);
            $userAcount->setCity($this);
        }

        return $this;
    }

    public function removeUserAcount(UserAcount $userAcount): static
    {
        if ($this->userAcounts->removeElement($userAcount)) {
            // set the owning side to null (unless already changed)
            if ($userAcount->getCity() === $this) {
                $userAcount->setCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Property>
     */
    public function getProperties(): Collection
    {
        return $this->properties;
    }

    public function addProperty(Property $property): static
    {
        if (!$this->properties->contains($property)) {
            $this->properties->add($property);
            $property->setCity($this);
        }

        return $this;
    }

    public function removeProperty(Property $property): static
    {
        if ($this->properties->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getCity() === $this) {
                $property->setCity(null);
            }
        }

        return $this;
    }
}
