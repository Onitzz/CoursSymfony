<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Tag
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TagRepository")
 */
class Tag
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
     */
    private $articles;

    public function __construct()
    {
      $this->articles = new ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Tag
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Tag
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
    * addArticle
    * @param Article $article
    * @return Tag
    */
    public function addArticle(Article $article)
    {
      $this->articles[] = $article;

      return $this;
    }

    /**
     * removeArticle
     *
     * @param Article $article
     *
     * @return Tag
     */
    public function removeArticle(Article $article)
    {
      $this->articles->removeElement($article);

      return $this;
    }

    /**
     * Get Article
     *
     * @return ArrayCollection
     */
    public function getArticles()
    {
      return $this->articles;
    }

    /**
     * Set Articles
     *
     * @param ArrayCollection $articles cette liste doit impérativement contenir des objets de type Article
     * @return Tag
     */
    public function setArticles(ArrayCollection $articles)
    {
      $this->articles = $articles;

      return $this;
    }
}
