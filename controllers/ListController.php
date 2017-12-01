<?php

class ListController
{

  // Création d'une nouvelle liste
  public function create()
  {
    echo 'LIST/CREATE';
  }

  // Modification d'une liste existante
  public function update()
  {
    // Sans active record
    // $list = new ListModel();
    // $list->updateListName($_POST['id'], $_POST['name']);

    // Avec active record
    $list = new ListModel();
    $list->setId($_POST['id']);
    $list->setName($_POST['name']);

    $list->save();

    echo 'Liste : '.$_POST['id'].' update ===> new name : '.$_POST['name'];
  }

  // Suppression d'une liste existante
  public function delete($params)
  {
    // Id de la liste à supprimer = $params['id']
    echo $params['id'].' : LIST/DELETE';
  }
}
