<?php

namespace App\Entity;

use App\Repository\BienRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass=BienRepository::class)
 */
class Bien
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min =  9, max = 1000)
     */
    private $surface;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $chambre;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $piece;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $etage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\Regex("/^[0-9]{5}/")
     */
    private $cp;

    /**
     * @ORM\Column(type="boolean", options={"default":true})
     */
    private $actif;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAt;

    public function __construct()
    {
        $this->dateAt = new \DateTime();
        $this->actif = true;
        $this->relations = new ArrayCollection();
    }


    /**
     * @Gedmo\Slug(fields={"titre"})
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Chauffage::class, inversedBy="biens")
     * @ORM\JoinColumn(nullable=true)
     */
    private $chauffage;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\ManyToMany(targetEntity=Option::class, inversedBy="biens")
     */
    private $options;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(int $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getPiece(): ?int
    {
        return $this->piece;
    }

    public function setPiece(?int $piece): self
    {
        $this->piece = $piece;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): self
    {
        $this->etage = $etage;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getDateAt(): ?\DateTimeInterface
    {
        return $this->dateAt;
    }


    public function setDateAt(\DateTimeInterface $dateAt): self
    {

        $this->dateAt = $dateAt();

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

    public function getChauffage(): ?Chauffage
    {
        return $this->chauffage;
    }

    public function setChauffage(?Chauffage $chauffage): self
    {
        $this->chauffage = $chauffage;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function getprixFormat(): string
    {
        return number_format($this->prix, 0, ' ', ' ');
    }
    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(string $options): self
    {
        $this->relation = $options;

        return $this;
    }

    /**
     * @return Collection|Option[]
     */
    public function getRelations(): Collection
    {
        return $this->options;
    }

    public function addRelation(Option $options): self
    {
        if (!$this->options->contains($options)) {
            $this->options[] = $options;
        }

        return $this;
    }

    public function removeRelation(Option $options): self
    {
        $this->options->removeElement($options);

        return $this;
    }
}
