<?php

// namespace App\Entity;

// use App\Repository\RegionRepository;
// use Doctrine\Common\Collections\ArrayCollection;
// use Doctrine\Common\Collections\Collection;
// use Doctrine\ORM\Mapping as ORM;

// #[ORM\Entity(repositoryClass: RegionRepository::class)]
// class Region
// {
//     #[ORM\Id]
//     #[ORM\GeneratedValue]
//     #[ORM\Column]
//     private ?int $id = null;

//     #[ORM\Column(length: 255)]
//     private ?string $name = null;


//     #[ORM\OneToMany(mappedBy: 'region', targetEntity: self::class)]
//     private Collection $city;

//     public function __construct()
//     {
//         $this->city = new ArrayCollection();
//     }

//     public function __toString()
//     {
//         return $this->getName();
//     }

//     public function getId(): ?int
//     {
//         return $this->id;
//     }

//     public function getName(): ?string
//     {
//         return $this->name;
//     }

//     public function setName(string $name): self
//     {
//         $this->name = $name;

//         return $this;
//     }

//     public function getRegion(): ?self
//     {
//         return $this->region;
//     }

//     public function setRegion(?self $region): self
//     {
//         $this->region = $region;

//         return $this;
//     }

// /**
//  * @return Collection<int, self>
//  */
// public function getCity(): Collection
// {
//     return $this->city;
// }

// public function addCity(self $city): self
// {
//     if (!$this->city->contains($city)) {
//         $this->city->add($city);
//         $city->setRegion($this);
//     }

//     return $this;
// }

//     public function removeCity(self $city): self
//     {
//         if ($this->city->removeElement($city)) {
//             // set the owning side to null (unless already changed)
//             if ($city->getRegion() === $this) {
//                 $city->setRegion(null);
//             }
//         }

//         return $this;
//     }
// }





namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegionRepository::class)]
class Region
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'region', targetEntity: Product::class)]
    private Collection $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
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

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setRegion($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getRegion() === $this) {
                $product->setRegion(null);
            }
        }

        return $this;
    }
}
