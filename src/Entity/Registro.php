<?php

namespace App\Entity;

use App\Repository\RegistroRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RegistroRepository::class)
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 */
class Registro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * @Gedmo\Slug(fields={"nombre", "paterno", "materno"}, updatable=false)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
      */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $paterno;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $materno;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $sexo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.")
     * @Assert\NotBlank()
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $procedencia;

    /**
     * @ORM\Column(name="status", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\NotBlank()
     */
    private $contribucion;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\NotBlank()
     */
    private $titulo;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $resumen;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $profesor;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $univprofesor;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.")
     * @Assert\NotBlank()
     */
    private $mailprofesor;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $confirmado;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $restricciones;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $infoadicional;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $beca;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aceptado;

    /**
     * @ORM\Column(type="text", length=6000, nullable=true)
     */
    private $comentarios;

    /**
     * @ORM\Column(type="text", length=6000, nullable=true)
     */
    private $recomendacion;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="registro_carta", fileNameProperty="cartaName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $cartaFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cartaName;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="registro_credencial", fileNameProperty="credencialName")
     *
     * @Assert\File(
     *     maxSize = "3M",
     * uploadFormSizeErrorMessage = "El archivo debe ser menor a 2 MB",
     *     mimeTypes = {"application/pdf", "application/x-pdf"},
     *     mimeTypesMessage = "Favor de subir un archivo PDF válido"
     * )
     *
     * @var File
     */
    public $credencialFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $credencialName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $modified;

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

    public function getPaterno(): ?string
    {
        return $this->paterno;
    }

    public function setPaterno(string $paterno): self
    {
        $this->paterno = $paterno;

        return $this;
    }

    public function getMaterno(): ?string
    {
        return $this->materno;
    }

    public function setMaterno(?string $materno): self
    {
        $this->materno = $materno;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;

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

    public function getProcedencia(): ?string
    {
        return $this->procedencia;
    }

    public function setProcedencia(string $procedencia): self
    {
        $this->procedencia = $procedencia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getContribucion()
    {
        return $this->contribucion;
    }

    /**
     * @param mixed $contribucion
     */
    public function setContribucion($contribucion): void
    {
        $this->contribucion = $contribucion;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * @param mixed $resumen
     */
    public function setResumen($resumen): void
    {
        $this->resumen = $resumen;
    }

    public function getProfesor(): ?string
    {
        return $this->profesor;
    }

    public function setProfesor(string $profesor): self
    {
        $this->profesor = $profesor;

        return $this;
    }

    public function getUnivprofesor(): ?string
    {
        return $this->univprofesor;
    }

    public function setUnivprofesor(string $univprofesor): self
    {
        $this->univprofesor = $univprofesor;

        return $this;
    }

    public function getMailprofesor(): ?string
    {
        return $this->mailprofesor;
    }

    public function setMailprofesor(string $mailprofesor): self
    {
        $this->mailprofesor = $mailprofesor;

        return $this;
    }

    public function isConfirmado(): ?bool
    {
        return $this->confirmado;
    }

    public function setConfirmado(?bool $confirmado): self
    {
        $this->confirmado = $confirmado;

        return $this;
    }

    public function getRestricciones(): ?string
    {
        return $this->restricciones;
    }

    public function setRestricciones(string $restricciones): self
    {
        $this->restricciones = $restricciones;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfoadicional()
    {
        return $this->infoadicional;
    }

    /**
     * @param mixed $infoadicional
     */
    public function setInfoadicional($infoadicional): void
    {
        $this->infoadicional = $infoadicional;
    }

    public function getBeca(): ?string
    {
        return $this->beca;
    }

    public function setBeca(?string $beca): self
    {
        $this->beca = $beca;

        return $this;
    }

    public function isAceptado(): ?bool
    {
        return $this->aceptado;
    }

    public function setAceptado(?bool $aceptado): self
    {
        $this->aceptado = $aceptado;

        return $this;
    }

    public function getComentarios(): ?string
    {
        return $this->comentarios;
    }

    public function setComentarios(?string $comentarios): self
    {
        $this->comentarios = $comentarios;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecomendacion()
    {
        return $this->recomendacion;
    }

    /**
     * @param mixed $recomendacion
     */
    public function setRecomendacion($recomendacion): void
    {
        $this->recomendacion = $recomendacion;
    }

    /**
     * Set cartaFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $carta
     */
    public function setCartaFile(?File $carta = null): void
    {
        $this->cartaFile = $carta;

        if (null !== $carta) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getCartaFile(): ?File
    {
        return $this->cartaFile;
    }

    public function getCartaName(): ?string
    {
        return $this->cartaName;
    }

    public function setCartaName($cartaName): void
    {
        $this->cartaName = $cartaName;
    }

    /**
     * Set credencialFile
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $credencial
     */
    public function setCredencialFile(?File $credencial = null): void
    {
        $this->credencialFile = $credencial;

        if (null !== $credencial) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }
    public function getCredencialFile(): ?File
    {
        return $this->credencialFile;
    }

    public function getCredencialName(): ?string
    {
        return $this->credencialName;
    }

    public function setCredencialName($credencialName): void
    {
        $this->credencialName = $credencialName;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created): void
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param mixed $modified
     */
    public function setModified($modified): void
    {
        $this->modified = $modified;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreated(new \DateTime());
        $this->setModified(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setModified(new \DateTime());
    }
}
