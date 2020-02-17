<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LightRepository")
 */
class Light
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /** @ORM\Column(type="integer") */
    private $brightness;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrightness(): ?int
    {
        return $this->brightness;
    }

    public function setBrightness(int $brightness): self
    {
        $this->brightness = $brightness;

        return $this;
    }
}
