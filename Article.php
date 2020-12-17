<?php
class Article
{
    private $id_article;
    private $contents;
    private $author;
    private $img;
    private $adminAccept;

    /**
     * Article constructor.
     * @param $id_article
     * @param $contents
     * @param $author
     * @param $img
     * @param $adminAccept
     */
    public function __construct($id_article, $contents, $author, $img, $adminAccept)
    {
        $this->id_article = $id_article;
        $this->contents = $contents;
        $this->author = $author;
        $this->img = $img;
        $this->adminAccept = $adminAccept;
    }

    /**
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->id_article;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdArticle($id_article)
    {
        $this->id_article = $id_article;
    }

    /**
     * @return mixed
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * @param mixed $contents
     */
    public function setContents($contents)
    {
        $this->contents = $contents;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getAdminAccept()
    {
        return $this->adminAccept;
    }

    /**
     * @param mixed $adminAccept
     */
    public function setAdminAccept($adminAccept)
    {
        $this->adminAccept = $adminAccept;
    }






}