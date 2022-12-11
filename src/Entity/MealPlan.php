<?php

namespace App\Entity;

use App\Repository\MealPlanRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MealPlanRepository::class)]
class MealPlan
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $meal_plan_id = null;

    #[ORM\Column]
    private ?int $fk_user_id = null;

    #[ORM\Column]
    private ?int $fk_recipe_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?int $fk_recipe_manager_id = null;

    public function getId(): ?int
    {
        return $this->meal_plan_id;
    }

    public function getFkUserId(): ?int
    {
        return $this->fk_user_id;
    }

    public function setFkUserId(int $fk_user_id): self
    {
        $this->fk_user_id = $fk_user_id;

        return $this;
    }

    public function getFkRecipeId(): ?int
    {
        return $this->fk_recipe_id;
    }

    public function setFkRecipeId(int $fk_recipe_id): self
    {
        $this->fk_recipe_id = $fk_recipe_id;

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

    public function getFkRecipeManagerId(): ?int
    {
        return $this->fk_recipe_manager_id;
    }

    public function setFkRecipeManagerId(int $fk_recipe_manager_id): self
    {
        $this->fk_recipe_manager_id = $fk_recipe_manager_id;

        return $this;
    }
}
