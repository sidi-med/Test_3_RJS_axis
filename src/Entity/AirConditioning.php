<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AirConditioningRepository")
 */
class AirConditioning
{
    public const MODE_SUMMER = 'MODE ÉTÉ';
    public const MODE_WINTER = 'MODE HIVER';

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $mode;

    /**
     * @ORM\Column(type="integer")
     */
    private $limitMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $limitMax;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getLimitMin(): ?int
    {
        return $this->limitMin;
    }

    public function setLimitMin(int $limitMin): self
    {
        $this->limitMin = $limitMin;

        return $this;
    }

    public function getLimitMax(): ?int
    {
        return $this->limitMax;
    }

    public function setLimitMax(int $limitMax): self
    {
        $this->limitMax = $limitMax;

        return $this;
    }
}
