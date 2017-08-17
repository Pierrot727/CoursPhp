<?php

// Classe servant à la gestion de la base de donnée du projet

class PersonnageManager extends Manager
{

    public function add(Personnage $perso)
    {
        $q = $this->_db->prepare('INSERT INTO personnage(nom, power, degat, niveau, experience) VALUES(:nom, :power, :degat, :niveau, :experience)');

        $q->bindValue(':nom', $perso->getNom(), PDO::PARAM_STR);
        $q->bindValue(':power', $perso->getPower(), PDO::PARAM_INT);
        $q->bindValue(':degat', $perso->getDegat(), PDO::PARAM_INT);
        $q->bindValue(':niveau', $perso->getNiveau(), PDO::PARAM_INT);
        $q->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(Personnage $perso)
    {
        $this->_db->exec('DELETE FROM personnage WHERE id = '.$perso->id());
    }

    public function get($id)
    {
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, nom, power  FROM personnage WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new Personnage($donnees);
    }

    public function getList()
    {
        $persos = [];

        $q = $this->_db->query('SELECT id, nom, power FROM personnage ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            $persos[] = new Personnage($donnees);
        }

        return $persos;
    }

    public function update(Personnage $perso)
    {
        $q = $this->_db->prepare('UPDATE personnage SET power = :power, degat = :degat, niveau = :niveau, experience = :experience WHERE id = :id');

        $q->bindValue(':power', $perso->power(), PDO::PARAM_INT);
        $q->bindValue(':degat', $perso->degat(), PDO::PARAM_INT);
        $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

        $q->execute();
    }

}