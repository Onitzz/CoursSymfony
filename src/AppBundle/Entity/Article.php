<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Auteur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="T'as pas donné de titre")
     * @Assert\Length(
     *      min = 10,
     *      max = 255,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="corps", type="text")
     */
    private $corps;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publication", type="datetime")
     */
    private $publication;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Auteur", inversedBy="articles")
     * @ORM\JoinColumn(name="auteur_id", referencedColumnName="id")
     */
    private $auteur;

    /**
     * @Assert\Count(
     *      min = 1,
     *      minMessage = "Vous devez spécifier aux moins un tag"
     * )
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable(name="articles_tags")
     */
    private $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
        $this->publication = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set corps
     *
     * @param string $corps
     *
     * @return Article
     */
    public function setCorps($corps)
    {
        $this->corps = $corps;

        return $this;
    }

    /**
     * Get corps
     *
     * @return string
     */
    public function getCorps()
    {
        return $this->corps;
    }

    /**
     * Set publication
     *
     * @param \DateTime $publication
     *
     * @return Article
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;

        return $this;
    }

    /**
     * Get publication
     *
     * @return \DateTime
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * Set auteur
     *
     * @param Auteur $auteur
     *
     * @return Article
     */
    public function setAuteur(Auteur $auteur)
    {
      $this->auteur = $auteur;

      return $this;
    }

    /**
     * Get auteur
     *
     * @return Auteur
     */
    public function getAuteur()
    {
      return $this->auteur;
    }
    /**
    * addTag
    * @param Tag $tag
    * @return Article
    */
    public function addTag(Tag $tag)
    {
      $this->tags[] = $tag;

      return $this;
    }

    /**
     * removeTag
     *
     * @param Tag $tag
     *
     * @return Article
     */
    public function removeTag(Tag $tag)
    {
      $this->tags->removeElement($tag);

      return $this;
    }

    /**
     * Get Tags
     *
     * @return ArrayCollection
     */
    public function getTags()
    {
      return $this->tags;
    }

    /**
     * Set Tags
     *
     * @param ArrayCollection $tags cette liste doit impérativement contenir des objets de type Tag
     * @return Article
     */
    public function setTags(ArrayCollection $tags)
    {
      $this->tags = $tags;

      return $this;
    }
}
