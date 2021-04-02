<?php

namespace App\Entity;

use App\Repository\ModulesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModulesRepository::class)
 */
class Modules
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
    private $titre;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nb_pages;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="modules")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=PageModule::class, mappedBy="modules", orphanRemoval=true)
     */
    private $pageModules;

    /**
     * @ORM\OneToOne(targetEntity=Quizz::class, mappedBy="modules", cascade={"persist", "remove"})
     */
    private $quizz;

    public function __construct()
    {
        $this->pageModules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNbPages(): ?int
    {
        return $this->nb_pages;
    }

    public function setNbPages(int $nb_pages): self
    {
        $this->nb_pages = $nb_pages;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection|PageModule[]
     */
    public function getPageModules(): Collection
    {
        return $this->pageModules;
    }

    public function addPageModule(PageModule $pageModule): self
    {
        if (!$this->pageModules->contains($pageModule)) {
            $this->pageModules[] = $pageModule;
            $pageModule->setModules($this);
        }

        return $this;
    }

    public function removePageModule(PageModule $pageModule): self
    {
        if ($this->pageModules->removeElement($pageModule)) {
            // set the owning side to null (unless already changed)
            if ($pageModule->getModules() === $this) {
                $pageModule->setModules(null);
            }
        }

        return $this;
    }

    public function getQuizz(): ?Quizz
    {
        return $this->quizz;
    }

    public function setQuizz(Quizz $quizz): self
    {
        // set the owning side of the relation if necessary
        if ($quizz->getModules() !== $this) {
            $quizz->setModules($this);
        }

        $this->quizz = $quizz;

        return $this;
    }
}
