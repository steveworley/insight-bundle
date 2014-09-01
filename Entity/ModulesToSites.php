<?php

namespace Alfred\InsightBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ModulesToSites
 */
class ModulesToSites
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $siteId;

    /**
     * @var integer
     */
    private $moduleId;

    /**
     * @var string
     */
    private $status;


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
     * Set siteId
     *
     * @param integer $siteId
     * @return ModulesToSites
     */
    public function setSiteId($siteId)
    {
        $this->siteId = $siteId;

        return $this;
    }

    /**
     * Get siteId
     *
     * @return integer 
     */
    public function getSiteId()
    {
        return $this->siteId;
    }

    /**
     * Set moduleId
     *
     * @param integer $moduleId
     * @return ModulesToSites
     */
    public function setModuleId($moduleId)
    {
        $this->moduleId = $moduleId;

        return $this;
    }

    /**
     * Get moduleId
     *
     * @return integer 
     */
    public function getModuleId()
    {
        return $this->moduleId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return ModulesToSites
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
