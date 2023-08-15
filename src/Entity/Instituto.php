<?php

namespace App\Entity;

use App\Repository\InstitutoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InstitutoRepository::class)]
class Instituto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $url_campus = null;

    #[ORM\Column(length: 255)]
    private ?string $url_instituto = null;

    #[ORM\ManyToOne(inversedBy: 'institutos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Localidad $localidad = null;

    #[ORM\OneToMany(mappedBy: 'instituto', targetEntity: Sede::class)]
    private Collection $sedes;

    #[ORM\OneToMany(mappedBy: 'instituto', targetEntity: Telefono::class)]
    private Collection $telefonos;

    #[ORM\ManyToMany(targetEntity: Carrera::class, mappedBy: 'institutos')]
    private Collection $carreras;

    #[ORM\OneToMany(mappedBy: 'instituto', targetEntity: OfertaEducativa::class)]
    private Collection $ofertaEducativas;


    public function __construct()
    {
        $this->telefonos = new ArrayCollection();
        $this->sedes = new ArrayCollection();
        $this->carreras = new ArrayCollection();
        $this->ofertaEducativas = new ArrayCollection();
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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getUrlCampus(): ?string
    {
        return $this->url_campus;
    }

    public function setUrlCampus(string $url_campus): self
    {
        $this->url_campus = $url_campus;

        return $this;
    }

    public function getUrlInstituto(): ?string
    {
        return $this->url_instituto;
    }

    public function setUrlInstituto(string $url_instituto): self
    {
        $this->url_instituto = $url_instituto;

        return $this;
    }

    public function getLocalidad(): ?Localidad
    {
        return $this->localidad;
    }

    public function setLocalidad(?Localidad $localidad): self
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * @return Collection<int, Sede>
     */
    public function getSedes(): Collection
    {
        return $this->sedes;
    }

    public function addSede(Sede $sede): self
    {
        if (!$this->sedes->contains($sede)) {
            $this->sedes->add($sede);
            $sede->setInstituto($this);
        }

        return $this;
    }

    public function removeSede(Sede $sede): self
    {
        if ($this->sedes->removeElement($sede)) {
            // set the owning side to null (unless already changed)
            if ($sede->getInstituto() === $this) {
                $sede->setInstituto(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nombre;
    }

    /**
     * @return Collection<int, Telefono>
     */
    public function getTelefonos(): Collection
    {
        return $this->telefonos;
    }

    public function addTelefono(Telefono $telefono): self
    {
        if (!$this->telefonos->contains($telefono)) {
            $this->telefonos->add($telefono);
            $telefono->setInstituto($this);
        }

        return $this;
    }

    public function removeTelefono(Telefono $telefono): self
    {
        if ($this->telefonos->removeElement($telefono)) {
            // set the owning side to null (unless already changed)
            if ($telefono->getInstituto() === $this) {
                $telefono->setInstituto(null);
            }
        }

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
            $carrera->addInstituto($this);
        }

        return $this;
    }

    public function removeCarrera(Carrera $carrera): self
    {
        if ($this->carreras->removeElement($carrera)) {
            $carrera->removeInstituto($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, OfertaEducativa>
     */
    public function getOfertaEducativas(): Collection
    {
        return $this->ofertaEducativas;
    }

    public function addOfertaEducativa(OfertaEducativa $ofertaEducativa): self
    {
        if (!$this->ofertaEducativas->contains($ofertaEducativa)) {
            $this->ofertaEducativas->add($ofertaEducativa);
            $ofertaEducativa->setInstituto($this);
        }

        return $this;
    }

    public function removeOfertaEducativa(OfertaEducativa $ofertaEducativa): self
    {
        if ($this->ofertaEducativas->removeElement($ofertaEducativa)) {
            // set the owning side to null (unless already changed)
            if ($ofertaEducativa->getInstituto() === $this) {
                $ofertaEducativa->setInstituto(null);
            }
        }

        return $this;
    }

    

    
}
