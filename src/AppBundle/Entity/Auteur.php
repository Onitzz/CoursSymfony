<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Article;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * Auteur
 *
 * @ORM\Table(name="auteur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AuteurRepository")
 */
class Auteur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="coupeDeCheveux", type="string", length=255, nullable=true)
     */
    private $coupeDeCheveux;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Article", mappedBy="auteur")
     */
    private $articles;

    public function __construct() {
        parent::__construct();
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
     * @return Auteur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Auteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set coupeDeCheveux
     *
     * @param string $coupeDeCheveux
     *
     * @return Auteur
     */
    public function setCoupeDeCheveux($coupeDeCheveux)
    {
        $this->coupeDeCheveux = $coupeDeCheveux;

        return $this;
    }

    /**
     * Get coupeDeCheveux
     *
     * @return string
     */
    public function getCoupeDeCheveux()
    {
        return $this->coupeDeCheveux;
    }

    /**
    * addArticle
    * @param Article $article
    * @return Auteur
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
     * @return Auteur
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
     * @return Auteur
     */
    public function setArticles(ArrayCollection $articles)
    {
      $this->articles = $articles;

      return $this;
    }
}
