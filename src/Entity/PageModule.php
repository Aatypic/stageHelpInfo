<?php

namespace App\Entity;

use App\Repository\PageModuleRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * @ORM\Entity(repositoryClass=PageModuleRepository::class)
 */
class PageModule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $sous_titre;

    /**
     * @Gedmo\Slug(fields={"sous_titre"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Modules::class, inversedBy="pageModules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $modules;

    /**
     * @ORM\Column(type="integer")
     */
    private $page;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSousTitre(): ?string
    {
        return $this->sous_titre;
    }

    public function setSousTitre(string $sous_titre): self
    {
        $this->sous_titre = $sous_titre;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    // public function setSlug(string $slug): self
    // {
    //     $this->slug = $slug;

    //     return $this;
    // }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getModules(): ?Modules
    {
        return $this->modules;
    }

    public function setModules(?Modules $modules): self
    {
        $this->modules = $modules;

        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;

        return $this;
    }

}
