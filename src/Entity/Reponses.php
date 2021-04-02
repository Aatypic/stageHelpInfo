<?php

namespace App\Entity;

use App\Repository\ReponsesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReponsesRepository::class)
 */
class Reponses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $ligne_reponse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $est_correct;

    /**
     * @ORM\ManyToOne(targetEntity=LigneQuizz::class, inversedBy="reponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ligne_quizz;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigneReponse(): ?string
    {
        return $this->ligne_reponse;
    }

    public function setLigneReponse(string $ligne_reponse): self
    {
        $this->ligne_reponse = $ligne_reponse;

        return $this;
    }

    public function getEstCorrect(): ?bool
    {
        return $this->est_correct;
    }

    public function setEstCorrect(bool $est_correct): self
    {
        $this->est_correct = $est_correct;

        return $this;
    }

    public function getLigneQuizz(): ?LigneQuizz
    {
        return $this->ligne_quizz;
    }

    public function setLigneQuizz(?LigneQuizz $ligne_quizz): self
    {
        $this->ligne_quizz = $ligne_quizz;

        return $this;
    }
}
