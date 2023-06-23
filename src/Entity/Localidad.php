<?php

namespace App\Entity;

use App\Repository\LocalidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocalidadRepository::class)]
class Localidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $cod_postal = null;

    #[ORM\OneToMany(mappedBy: 'localidad', targetEntity: Instituto::class)]
    private Collection $institutos;

    public function __construct()
    {
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

    public function getCodPostal(): ?string
    {
        return $this->cod_postal;
    }

    public function setCodPostal(string $cod_postal): self
    {
        $this->cod_postal = $cod_postal;

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
            $instituto->setLocalidad($this);
        }

        return $this;
    }

    public function removeInstituto(Instituto $instituto): self
    {
        if ($this->institutos->removeElement($instituto)) {
            // set the owning side to null (unless already changed)
            if ($instituto->getLocalidad() === $this) {
                $instituto->setLocalidad(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nombre;
    }

    
}
