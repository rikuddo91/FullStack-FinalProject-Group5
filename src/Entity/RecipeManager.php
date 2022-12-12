<?php

namespace App\Entity;

use App\Repository\RecipeManagerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeManagerRepository::class)]
class RecipeManager
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $recipe_manager_id = null;

    #[ORM\Column]
    private ?int $fk_recipes_id = null;

    #[ORM\Column]
    private ?int $fk_users_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->recipe_manager_id;
    }

    public function getFkRecipeId(): ?int
    {
        return $this->fk_recipes_id;
    }

    public function setFkRecipeId(int $fk_recipes_id): self
    {
        $this->fk_recipes_id = $fk_recipes_id;

        return $this;
    }

    public function getFkUserId(): ?int
    {
        return $this->fk_users_id;
    }

    public function setFkUserId(int $fk_users_id): self
    {
        $this->fk_users_id = $fk_users_id;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}
