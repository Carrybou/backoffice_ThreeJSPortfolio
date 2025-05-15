<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;

#[ORM\Entity]
#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/scores/add',
            description: 'Add a new score',
            security: "is_granted('ROLE_USER')"
        ),
        new GetCollection(
            uriTemplate: '/scores',
            description: 'Get all scores',
            security: "is_granted('ROLE_USER')"
        )
    ]
)]
#[ApiFilter(OrderFilter::class, properties: ['score' => 'DESC'])]
#[ApiFilter(SearchFilter::class, properties: ['user.uid' => 'exact'])]
class GameScore
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['game:read'])]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups(['game:read', 'game:write'])]
    private ?int $score = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[Groups(['game:read', 'game:write'])]
    private ?User $user = null;

    #[ORM\Column]
    #[Groups(['game:read', 'game:write'])]
    private ?\DateTimeImmutable $createdAt = null;
    #[ORM\Column]
    #[Groups(['game:read', 'game:write'])]
    private ?\DateTimeImmutable $updatedAt = null;
    #[ORM\Column]
    #[Groups(['game:read', 'game:write'])]
    private ?string $game = null;
    #[ORM\Column]
    #[Groups(['game:read', 'game:write'])]
    private ?string $uid = null;


    //getter an setter
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getScore(): ?int
    {
        return $this->score;
    }
    public function setScore(int $score): static
    {
        $this->score = $score;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }
    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }
    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
    public function getGame(): ?string
    {
        return $this->game;
    }
    public function setGame(string $game): static
    {
        $this->game = $game;

        return $this;
    }
    public function getUid(): ?string
    {
        return $this->uid;
    }
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }

}