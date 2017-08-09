<?php
class Personnage
{
    // attributs
    private $_nom;
    private $_power;
    private $_degat = 0;
    private $_experience = 0;
    private $_niveau = 0;
public function __construct($nom)
{
    $this->_nom = $nom;
    echo "nouveau personnage";


}

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
        if (strlen ($nom) >3) {
            $this->_nom = $nom;
        } else {
            die("un nom doit faire plus de 3 caractéres");
        }

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