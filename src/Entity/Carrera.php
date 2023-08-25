<?php

namespace App\Entity;

use App\Repository\CarreraRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarreraRepository::class)]
class Carrera
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $duracion = null;

    #[ORM\Column]
    private ?int $cant_asignaturas = null;

    #[ORM\Column(length: 255)]
    private ?string $modo = null;

    #[ORM\Column(length: 255)]
    private ?string $resolucion = null;

    #[ORM\ManyToMany(targetEntity: Turno::class, inversedBy: 'carreras')]
    private Collection $turnos;

    #[ORM\ManyToMany(targetEntity: Instituto::class, inversedBy: 'carreras')]
    private Collection $institutos;

    public function __construct()
    {
        $this->turnos = new ArrayCollection();
        $this->institutos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDuracion(): ?string
    {
        return $this->duracion;
    }

    public function setDuracion(string $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getCantAsignaturas(): ?int
    {
        return $this->cant_asignaturas;
    }

    public function setCantAsignaturas(int $cant_asignaturas): self
    {
        $this->cant_asignaturas = $cant_asignaturas;

        return $this;
    }

    public function getModo(): ?string
    {
        return $this->modo;
    }

    public function setModo(string $modo): self
    {
        $this->modo = $modo;

        return $this;
    }

    public function getResolucion(): ?string
    {
        return $this->resolucion;
    }

    public function setResolucion(string $resolucion): self
    {
        $this->resolucion = $resolucion;

        return $this;
    }

    /**
     * @return Collection<int, Turno>
     */
    public function getTurnos(): Collection
    {
        return $this->turnos;
    }

    public function addTurno(Turno $turno): self
    {
        if (!$this->turnos->contains($turno)) {
            $this->turnos->add($turno);
        }

        return $this;
    }

    public function removeTurno(Turno $turno): self
    {
        $this->turnos->removeElement($turno);

        return $this;
    }

    /**
     * @return Collection<int, Instituto>
     */
    public function getInstitutos(): Collection
    {
        return $this->institutos;
    }

    public function addInstituto(Instituto $instituto): self
    {
        if (!$this->institutos->contains($instituto)) {
            $this->institutos->add($instituto);
        }

        return $this;
    }

    public function removeInstituto(Instituto $instituto): self
    {
        $this->institutos->removeElement($instituto);

        return $this;
    }

    public function __toString() {
        return $this->nombre;
    }

}
