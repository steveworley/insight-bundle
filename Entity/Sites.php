<?php

namespace Alfred\InsightBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sites
 */
class Sites
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $databaseName;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Sites
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Sites
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set databaseName
     *
     * @param string $databaseName
     * @return Sites
     */
    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;

        return $this;
    }

    /**
     * Get databaseName
     *
     * @return string 
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }
}
