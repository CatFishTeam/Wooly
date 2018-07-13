<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LevelRepository")
 */
class Level
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="json")
     */
    private $data;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $best;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $played;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $won;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId()
    {
        return $this->id;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getBest()
    {
        return $this->best;
    }

    public function setBest($best): self
    {
        $this->best = $best;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getPlayed(): ?int
    {
        return $this->played;
    }

    public function setPlayed(int $played): self
    {
        $this->played = $played;

        return $this;
    }

    public function getWon(): ?int
    {
        return $this->won;
    }

    public function setWon(?int $won): self
    {
        $this->won = $won;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUserId(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
