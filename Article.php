<?php
class Article
{
    private $id_article;
    private $contents;
    private $title;
    private $author;
    private $img;
    private $adminAccept;

    /**
     * Article constructor.
     * @param $id_article
     * @param $contents
     * @param $title
     * @param $author
     * @param $img
     * @param $adminAccept
     */
    public function __construct($id_article, $title,$contents, $author, $img, $adminAccept)
    {
        $this->id_article = $id_article;
        $this->contents = $contents;
        $this->title = $title;
        $this->author = $author;
        $this->img = $img;
        $this->adminAccept = $adminAccept;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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