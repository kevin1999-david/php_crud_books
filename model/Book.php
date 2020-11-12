<?php
class Book
{
    private $code;
    private $title;
    private $author;
    private $year;
    private $pages;



    public function __construct($code, $title, $author, $year, $pages)
    {
        
        $this->code = $code;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->pages = $pages;
    }


  

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of pages
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Set the value of pages
     *
     * @return  self
     */
    public function setPages($pages)
    {
        $this->pages = $pages;

        return $this;
    }
}
