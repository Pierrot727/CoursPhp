<?php
class Personnage
{
    // attributs
    private $_nom;
    private $_power;
    private $_degat = 0;
    private $_experience = 0;
    private $_niveau = 0;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->_nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPower()
    {
        return $this->_power;
    }

    /**
     * @param mixed $power
     */
    public function setPower($power)
    {
        $this->_power = $power;
    }

    /**
     * @return mixed
     */
    public function getDegat()
    {
        return $this->_degat;
    }

    /**
     * @param mixed $degat
     */
    public function setDegat($degat)
    {
        $this->_degat = $degat;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($experience)
    {
        $this->_experience = $experience;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->_niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->_niveau = $niveau;
    }




    //methode

}