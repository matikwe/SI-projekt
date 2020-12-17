<?php
class Article
{
    private $id_artykulu;
    private $tresc;
    private $autor;
    private $zdjecie;
    private $akceptacjaAdmina;

    /**
     * Article constructor.
     * @param $id_artykulu
     * @param $tresc
     * @param $autor
     * @param $zdjecie
     * @param $akceptacjaAdmina
     */
    public function __construct($id_artykulu, $tresc, $autor, $zdjecie, $akceptacjaAdmina)
    {
        $this->id_artykulu = $id_artykulu;
        $this->tresc = $tresc;
        $this->autor = $autor;
        $this->zdjecie = $zdjecie;
        $this->akceptacjaAdmina = $akceptacjaAdmina;
    }

    /**
     * @return mixed
     */
    public function getIdArtykulu()
    {
        return $this->id_artykulu;
    }

    /**
     * @param mixed $id_artykulu
     */
    public function setIdArtykulu($id_artykulu)
    {
        $this->id_artykulu = $id_artykulu;
    }

    /**
     * @return mixed
     */
    public function getTresc()
    {
        return $this->tresc;
    }

    /**
     * @param mixed $tresc
     */
    public function setTresc($tresc)
    {
        $this->tresc = $tresc;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getZdjecie()
    {
        return $this->zdjecie;
    }

    /**
     * @param mixed $zdjecie
     */
    public function setZdjecie($zdjecie)
    {
        $this->zdjecie = $zdjecie;
    }

    /**
     * @return mixed
     */
    public function getAkceptacjaAdmina()
    {
        return $this->akceptacjaAdmina;
    }

    /**
     * @param mixed $akceptacjaAdmina
     */
    public function setAkceptacjaAdmina($akceptacjaAdmina)
    {
        $this->akceptacjaAdmina = $akceptacjaAdmina;
    }



}