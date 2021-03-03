<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


class RechercheBien
{
    /**
     * @var int|null
     */
    private $prixMax;

    /**
     * @var int|null
     * @Assert\Range(min=10, max=400)   
     */
    private $surfaceMin;

    /**
     * @var ArrayCollection
     */
    private $options;
    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    /**
     * @return int|null     
     */
    public function getPrixMax(): ?int
    {
        return $this->prixMax;
    }


    /**
     * @param int|null $prixMax    
     * @return RechercheBien
     */
    public function setPrixMax(int $prixMax): RechercheBien
    {
        $this->prixMax = $prixMax;
        return $this;
    }

    /**
     * @param int|null $surfaceMin    
     */
    public function getSurfaceMin(): ?int
    {
        return $this->surfaceMin;
    }

    /**
     * @param int|null $surfaceMin    
     * @return RechercheBien
     */
    public function setSurfaceMin(int $surfaceMin): RechercheBien
    {
        $this->surfaceMin = $surfaceMin;
        return $this;
    }








    /**
     * @return ArrayCollection    
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @return ArrayCollection
     */
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;
    }


}
