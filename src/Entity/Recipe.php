<?php

namespace App\Entity;

use App\Repository\RecipeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecipeRepository::class)]
class Recipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $recipe_id = null;

    #[ORM\Column(length: 55)]
    private ?string $name = null;

    #[ORM\Column(length: 650)]
    private ?string $ingredients = null;

    #[ORM\Column(length: 650)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $prep_time = null;

    #[ORM\Column]
    private ?int $calories = null;

    #[ORM\Column(type: Types::BINARY)]
    private $diet = null;

    #[ORM\Column(length: 150)]
    private ?string $url = null;

    #[ORM\Column(length: 200)]
    private ?string $picture = null;

    #[ORM\Column(length: 100)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $type_index = null;

    public function getId(): ?int
    {
        return $this->recipe_id;
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

    public function getIngredients(): ?string
    {
        return $this->ingredients;
    }

    public function setIngredients(string $ingredients): self
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrepTime(): ?int
    {
        return $this->prep_time;
    }

    public function setPrepTime(int $prep_time): self
    {
        $this->prep_time = $prep_time;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    public function getDiet()
    {
        return $this->diet;
    }

    public function setDiet($diet): self
    {
        $this->diet = $diet;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getTypeIndex(): ?int
    {
        return $this->type_index;
    }

    public function setTypeIndex(int $type_index): self
    {
        $this->type_index = $type_index;

        return $this;
    }
}
