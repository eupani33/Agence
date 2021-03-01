<?php

namespace App\Entity;
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
}
