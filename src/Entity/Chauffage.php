<?php

namespace App\Entity;

use App\Repository\ChauffageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChauffageRepository::class)
 */
class Chauffage
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
    private $type;

    /**
     * @ORM\OneToOne(targetEntity=Bien::class, mappedBy="chauffage", cascade={"persist", "remove"})
     */
    private $identifiant;

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getIdentifiant(): ?Bien
    {
        return $this->identifiant;
    }

    public function setIdentifiant(?Bien $identifiant): self
    {
        // unset the owning side of the relation if necessary
        if ($identifiant === null && $this->identifiant !== null) {
            $this->identifiant->setChauffage(null);
        }

        // set the owning side of the relation if necessary
        if ($identifiant !== null && $identifiant->getChauffage() !== $this) {
            $identifiant->setChauffage($this);
        }

        $this->identifiant = $identifiant;

        return $this;
    }
}
