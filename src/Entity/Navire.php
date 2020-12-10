<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;

/**
 * @ORM\Entity(repositoryClass=NavireRepository::class)
 * @ORM\Table(  name="navire" ,
 *            uniqueConstraints={@ORM\UniqueConstraint(name="mmsi_unique",columns={"mmsi"})}
 * )
 */
class Navire {

  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=7, unique=true)
   * @Assert\Regex(
   *     pattern="/[1-9]{7}/",
   *     message="Le numéro IMO doit comporter 7 chiffres"
   * )
   */
  private $imo;

  /**
   * @ORM\Column(type="string", length=100)
   * @Assert\Length(
   *                  min=3,
   *                  max=100
   *                  )
   */
  private $nom;

  /**
   * @ORM\Column(type="string", length=9)
   * @Assert\Regex(
   *     pattern="/[1-9]{9}/",
   *     message="Le numéro IMO doit comporter 9 chiffres"
   * )
   */
  private $mmsi;

  /**
   * @ORM\Column(type="string", length=10)
   */
  private $indicatifAppel;

  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $eta;

  /**
   * @ORM\ManyToOne(targetEntity=Pays::class)
   * @ORM\JoinColumn(name="idpays", nullable=false)
   */
  private $lePavillon;

  public function getId(): ?int {
    return $this->id;
  }

  public function getImo(): ?string {
    return $this->imo;
  }

  public function setImo(string $imo): self {
    $this->imo = $imo;

    return $this;
  }

  public function getNom(): ?string {
    return $this->nom;
  }

  public function setNom(string $nom): self {
    $this->nom = $nom;

    return $this;
  }

  public function getMmsi(): ?string {
    return $this->mmsi;
  }

  public function setMmsi(string $mmsi): self {
    $this->mmsi = $mmsi;

    return $this;
  }

  public function getIndicatifAppel(): ?string {
    return $this->indicatifAppel;
  }

  public function setIndicatifAppel(string $indicatifAppel): self {
    $this->indicatifAppel = $indicatifAppel;

    return $this;
  }

  public function getEta(): ?\DateTimeInterface {
    return $this->eta;
  }

  public function setEta(?\DateTimeInterface $eta): self {
    $this->eta = $eta;

    return $this;
  }

  public function getLePavillon(): ?Pays
  {
      return $this->lePavillon;
  }

  public function setLePavillon(?Pays $lePavillon): self
  {
      $this->lePavillon = $lePavillon;

      return $this;
  }

}
