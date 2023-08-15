<?php

namespace App\Entity;

use App\Repository\OfertaEducativaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfertaEducativaRepository::class)]
class OfertaEducativa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ciclo = null;

    #[ORM\Column]
    private ?int $vacantes = null;

    #[ORM\ManyToOne(inversedBy: 'ofertaEducativas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Instituto $instituto = null;

    #[ORM\ManyToMany(targetEntity: Carrera::class, inversedBy: 'ofertaEducativas')]
    private Collection $carreras;

    public function __construct()
    {
        $this->carreras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiclo(): ?string
    {
        return $this->ciclo;
    }

    public function setCiclo(string $ciclo): self
    {
        $this->ciclo = $ciclo;

        return $this;
    }

    public function getVacantes(): ?int
    {
        return $this->vacantes;
    }

    public function setVacantes(int $vacantes): self
    {
        $this->vacantes = $vacantes;

        return $this;
    }

    public function getInstituto(): ?Instituto
    {
        return $this->instituto;
    }

    public function setInstituto(?Instituto $instituto): self
    {
        $this->instituto = $instituto;

        return $this;
    }

    /**
     * @return Collection<int, Carrera>
     */
    public function getCarreras(): Collection
    {
        return $this->carreras;
    }

    public function addCarrera(Carrera $carrera): self
    {
        if (!$this->carreras->contains($carrera)) {
            $this->carreras->add($carrera);
        }

        return $this;
    }

    public function removeCarrera(Carrera $carrera): self
    {
        $this->carreras->removeElement($carrera);

        return $this;
    }
}
