<?php

namespace App\Entity;

use App\Repository\SedeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SedeRepository::class)]
class Sede
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

    #[ORM\ManyToOne(inversedBy: 'sedes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Instituto $instituto = null;


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

    public function getInstituto(): ?Instituto
    {
        return $this->instituto;
    }

    public function setInstituto(?Instituto $instituto): self
    {
        $this->instituto = $instituto;

        return $this;
    }

    public function __toString() {
        return $this->nombre;
    }


}
