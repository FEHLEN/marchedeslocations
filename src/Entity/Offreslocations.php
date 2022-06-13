<?php

namespace App\Entity;

use App\Repository\OffreslocationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffreslocationsRepository::class)
 */
class Offreslocations
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
     * @ORM\Column(type="string", length=255)
     */
    private $structure;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreChambres;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrePersonnes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifHorsSaison;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifPleineSaison;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $laveLinge;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $parking;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $douche;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $congelateur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $laveVaisselle;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $TV;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isBest = false;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departement;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity=Regions::class, inversedBy="offreslocations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $regions;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="offreslocations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $OneImage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TwoImage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel;

    

    

    public function __construct(){
        $this->createdAt = new \DateTime();
    }

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

    public function getStructure(): ?string
    {
        return $this->structure;
    }

    public function setStructure(string $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getNbreChambres(): ?int
    {
        return $this->nbreChambres;
    }

    public function setNbreChambres(int $nbreChambres): self
    {
        $this->nbreChambres = $nbreChambres;

        return $this;
    }

    public function getNbrePersonnes(): ?int
    {
        return $this->nbrePersonnes;
    }

    public function setNbrePersonnes(int $nbrePersonnes): self
    {
        $this->nbrePersonnes = $nbrePersonnes;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTarifHorsSaison(): ?float
    {
        return $this->tarifHorsSaison;
    }

    public function setTarifHorsSaison(float $tarifHorsSaison): self
    {
        $this->tarifHorsSaison = $tarifHorsSaison;

        return $this;
    }

    public function getTarifPleineSaison(): ?float
    {
        return $this->tarifPleineSaison;
    }

    public function setTarifPleineSaison(float $tarifPleineSaison): self
    {
        $this->tarifPleineSaison = $tarifPleineSaison;

        return $this;
    }

    public function getLaveLinge(): ?string
    {
        return $this->laveLinge;
    }

    public function setLaveLinge(string $laveLinge): self
    {
        $this->laveLinge = $laveLinge;

        return $this;
    }

    public function getParking(): ?string
    {
        return $this->parking;
    }

    public function setParking(string $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getDouche(): ?string
    {
        return $this->douche;
    }

    public function setDouche(string $douche): self
    {
        $this->douche = $douche;

        return $this;
    }

    public function getCongelateur(): ?string
    {
        return $this->congelateur;
    }

    public function setCongelateur(string $congelateur): self
    {
        $this->congelateur = $congelateur;

        return $this;
    }

    public function getLaveVaisselle(): ?string
    {
        return $this->laveVaisselle;
    }

    public function setLaveVaisselle(string $laveVaisselle): self
    {
        $this->laveVaisselle = $laveVaisselle;

        return $this;
    }

    public function getTV(): ?string
    {
        return $this->TV;
    }

    public function setTV(string $TV): self
    {
        $this->TV = $TV;

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

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function isIsBest(): ?bool
    {
        return $this->isBest;
    }

    public function setIsBest(bool $isBest): self
    {
        $this->isBest = $isBest;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRegions(): ?Regions
    {
        return $this->regions;
    }

    public function setRegions(?Regions $regions): self
    {
        $this->regions = $regions;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }


    public function getOneImage(): ?string
    {
        return $this->OneImage;
    }

    public function setOneImage(string $OneImage): self
    {
        $this->OneImage = $OneImage;

        return $this;
    }

    public function getTwoImage(): ?string
    {
        return $this->TwoImage;
    }

    public function setTwoImage(string $TwoImage): self
    {
        $this->TwoImage = $TwoImage;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

  

    
}
