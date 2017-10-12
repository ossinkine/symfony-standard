<?php

namespace AppBundle\Entity;

/**
 * Father
 */
class Father
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sons;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sons = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Add son
     *
     * @param \AppBundle\Entity\Son $son
     *
     * @return Father
     */
    public function addSon(\AppBundle\Entity\Son $son)
    {
        $this->sons[] = $son;

        return $this;
    }

    /**
     * Remove son
     *
     * @param \AppBundle\Entity\Son $son
     */
    public function removeSon(\AppBundle\Entity\Son $son)
    {
        $this->sons->removeElement($son);
    }

    /**
     * Get sons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSons()
    {
        return $this->sons;
    }
}

