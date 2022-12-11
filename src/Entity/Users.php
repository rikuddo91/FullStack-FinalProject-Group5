<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $users_id = null;

    #[ORM\Column(length: 30)]
    private ?string $first_name = null;

    #[ORM\Column(length: 30)]
    private ?string $last_name = null;

    #[ORM\Column(length: 60)]
    private ?string $email = null;

    #[ORM\Column(length: 60)]
    private ?string $password = null;

    #[ORM\Column(length: 150)]
    private ?string $profile_pic = null;

    #[ORM\Column(length: 10)]
    private ?string $user_status = null;

    public function getId(): ?int
    {
        return $this->users_id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getProfilePic(): ?string
    {
        return $this->profile_pic;
    }

    public function setProfilePic(string $profile_pic): self
    {
        $this->profile_pic = $profile_pic;

        return $this;
    }

    public function getUserStatus(): ?string
    {
        return $this->user_status;
    }

    public function setUserStatus(string $user_status): self
    {
        $this->user_status = $user_status;

        return $this;
    }
}
