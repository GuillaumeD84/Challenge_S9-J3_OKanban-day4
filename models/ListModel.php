<?php

class ListModel
{
  private $id;
  private $name;

  // Active record
  public function save()
  {
    $db = Database::getDB();

    // On créé la requête d'ajout/modification
    $sql = 'REPLACE INTO `lists` (id, name) VALUES (:id, :name)';

    // On prépare la requête
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $this->id, PDO::PARAM_INT);
    $statement->bindValue(':name', $this->name, PDO::PARAM_STR);

    // On éxécute la requête
    $statement->execute();
  }

  // Fonction qui retourne tous les enregistrements
  static function findAll()
  {
    // On établit la connexion avec la database
    $db = Database::getDB();

    // La requête à éxécuter
    $sql = 'SELECT * FROM `lists`';

    // On éxécute la requête
    $result = $db->query($sql);

    // On récupère les résultats sous forme d'un objet
    // L'objet en question aura la forme de notre classe 'ListModel'
    return $result->fetchAll(PDO::FETCH_CLASS, 'ListModel');
  }

  // Permet de mettre à jour le nom d'une liste
  public function updateListName($id, $newName)
  {
    // On établit la connexion avec la database
    $db = Database::getDB();

    // La requête à éxécuter
    $sql = 'UPDATE `lists` SET `name` = :newName WHERE `lists`.`id` = :id';

    // On prépare la requête
    $statement = $db->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':newName', $newName, PDO::PARAM_STR);

    // On éxécute la requête
    $statement->execute();
  }

  // GETTER $id
  public function getId()
  {
    return $this->id;
  }

  // GETTER $name
  public function getName()
  {
    return ucfirst($this->name);
  }

  // SETTER $id
  public function setId($id)
  {
    $this->id = $id;
  }

  // SETTER $name
  public function setName($name)
  {
    $this->name = $name;
  }



  // Permet de créer une nouvelle liste
  // public function create($name)
  // {
  //   $db = Database::getDB();
  //
  //   $sql = 'INSERT INTO `lists` (id, name) VALUES (NULL, :name)';
  //
  //   // On prépare la requête
  //   $statement = $db->prepare($sql);
  //   $statement->bindValue(':name', $name, PDO::PARAM_STR);
  //
  //   // On éxécute la requête
  //   $statement->execute();
  // }
}
