<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\Api\Card\BuyCardController;
use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: CardRepository::class)]
#[ApiResource(
    operations: [
        new Get(),
        new Put(),
        new Delete(),
        new GetCollection(),
        new Post(
            name: 'buy',
            uriTemplate: '/cards/{id}/buy',
            controller: BuyCardController::class
        ),
    ]
)]
#[ORM\HasLifecycleCallbacks]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['read:users:getCards'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:getCollection','read:users:getCards'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['read:getCollection','read:users:getCards'])]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    #[Groups(['read:getCollection','read:users:getCards'])]
    private ?string $image = null;

    #[ORM\Column]
    #[Groups(['read:getCollection','read:users:getCards'])]
    private ?bool $ifAvailable = null;

    #[ORM\ManyToOne(inversedBy: 'cards')]
    private ?CollectionCard $collection = null;

    #[ORM\ManyToOne(inversedBy: 'cards')]
    private ?User $user = null;


    public function __toString()
    {
        return $this->name;
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isIfAvailable(): ?bool
    {
        return $this->ifAvailable;
    }

    public function setIfAvailable(bool $ifAvailable): self
    {
        $this->ifAvailable = $ifAvailable;

        return $this;
    }

    public function getCollection(): ?CollectionCard
    {
        return $this->collection;
    }

    public function setCollection(?CollectionCard $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }



}
