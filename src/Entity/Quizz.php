<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QuizzRepository::class)
 */
class Quizz
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre_quizz;

    /**
     * @ORM\OneToOne(targetEntity=Modules::class, inversedBy="quizz", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $modules;

    /**
     * @ORM\OneToMany(targetEntity=LigneQuizz::class, mappedBy="quizz", orphanRemoval=true)
     */
    private $ligneQuizzs;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="quizzs")
     */
    private $users;

    public function __construct()
    {
        $this->ligneQuizzs = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitreQuizz(): ?string
    {
        return $this->titre_quizz;
    }

    public function setTitreQuizz(string $titre_quizz): self
    {
        $this->titre_quizz = $titre_quizz;

        return $this;
    }

    public function getModules(): ?Modules
    {
        return $this->modules;
    }

    public function setModules(Modules $modules): self
    {
        $this->modules = $modules;

        return $this;
    }

    /**
     * @return Collection|LigneQuizz[]
     */
    public function getLigneQuizzs(): Collection
    {
        return $this->ligneQuizzs;
    }

    public function addLigneQuizz(LigneQuizz $ligneQuizz): self
    {
        if (!$this->ligneQuizzs->contains($ligneQuizz)) {
            $this->ligneQuizzs[] = $ligneQuizz;
            $ligneQuizz->setQuizz($this);
        }

        return $this;
    }

    public function removeLigneQuizz(LigneQuizz $ligneQuizz): self
    {
        if ($this->ligneQuizzs->removeElement($ligneQuizz)) {
            // set the owning side to null (unless already changed)
            if ($ligneQuizz->getQuizz() === $this) {
                $ligneQuizz->setQuizz(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        $this->users->removeElement($user);

        return $this;
    }
}
