<?php

namespace App\Entity;

use App\Repository\UserAcountRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserAcountRepository::class)]
class UserAcount
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $firstName = null;

    #[ORM\Column(length: 45)]
    private ?string $lastName = null;

    #[ORM\Column(length: 45)]
    private ?string $telephone = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $companyName = null;

    #[ORM\Column(length: 45, nullable: true)]
    private ?string $companyTelephone = null;

    #[ORM\Column(length: 45)]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updateDate = null;

    #[ORM\ManyToOne(inversedBy: 'userAcounts')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $city = null;

    #[ORM\OneToMany(mappedBy: 'userAcount', targetEntity: PropertyOwner::class)]
    private Collection $propertyOwners;

    #[ORM\OneToMany(mappedBy: 'userAccount', targetEntity: PropertyGroup::class)]
    private Collection $propertyGroups;

    public function __construct()
    {
        $this->propertyOwners = new ArrayCollection();
        $this->propertyGroups = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanyTelephone(): ?string
    {
        return $this->companyTelephone;
    }

    public function setCompanyTelephone(?string $companyTelephone): static
    {
        $this->companyTelephone = $companyTelephone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getCreateDate(): ?\DateTimeInterface
    {
        return $this->createDate;
    }

    public function setCreateDate(\DateTimeInterface $createDate): static
    {
        $this->createDate = $createDate;

        return $this;
    }

    public function getUpdateDate(): ?\DateTimeInterface
    {
        return $this->updateDate;
    }

    public function setUpdateDate(\DateTimeInterface $updateDate): static
    {
        $this->updateDate = $updateDate;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): static
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection<int, PropertyOwner>
     */
    public function getPropertyOwners(): Collection
    {
        return $this->propertyOwners;
    }

    public function addPropertyOwner(PropertyOwner $propertyOwner): static
    {
        if (!$this->propertyOwners->contains($propertyOwner)) {
            $this->propertyOwners->add($propertyOwner);
            $propertyOwner->setUserAcount($this);
        }

        return $this;
    }

    public function removePropertyOwner(PropertyOwner $propertyOwner): static
    {
        if ($this->propertyOwners->removeElement($propertyOwner)) {
            // set the owning side to null (unless already changed)
            if ($propertyOwner->getUserAcount() === $this) {
                $propertyOwner->setUserAcount(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PropertyGroup>
     */
    public function getPropertyGroups(): Collection
    {
        return $this->propertyGroups;
    }

    public function addPropertyGroup(PropertyGroup $propertyGroup): static
    {
        if (!$this->propertyGroups->contains($propertyGroup)) {
            $this->propertyGroups->add($propertyGroup);
            $propertyGroup->setUserAccount($this);
        }

        return $this;
    }

    public function removePropertyGroup(PropertyGroup $propertyGroup): static
    {
        if ($this->propertyGroups->removeElement($propertyGroup)) {
            // set the owning side to null (unless already changed)
            if ($propertyGroup->getUserAccount() === $this) {
                $propertyGroup->setUserAccount(null);
            }
        }

        return $this;
    }
}
