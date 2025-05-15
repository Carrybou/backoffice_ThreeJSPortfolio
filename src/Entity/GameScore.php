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

    // Getters and setters...
}