var app = {
  init: function() {

    // setTimeout(app.loadPage, 1000, 'http://localhost/Projets/S8-OKanban/test');
    // app.loadPage('http://localhost/Projets/S8-OKanban/test');
    $('#ajaxTestButton').on('click', app.loadPageTest);

    $('.editListName').on('click', app.editListName);

  },
  loadPage: function(url) {

    $.ajax(url, {
      success: function(data) {
        console.log(data);
        $('#ajaxTest').html(data);
        var data = JSON.parse(data);
        console.log(data);
      }
    })

  },
  editListName: function(evt) {
    // On cible le h2 et l'input concernés par l'édition
    var listNameH2 = $(evt.target).parent().siblings('h2');
    var listNameInput = $(evt.target).parent().siblings('input');

    // On récupère l'id (inscrit dans la database) du nom de la liste à modifier
    // grâce à l'id de l'input (inputList1, inputList2, etc ...)
    var listId = listNameInput.attr('id').replace(/\D/g,'');

    // On affiche/masque les champs
    listNameH2.toggle();
    listNameInput.toggle();

    // Si l'utilisateur à modifié le nom de la liste on effectue des actions
    if (listNameInput.val() !== '') {
      // On récupère le nouveau nom depuis l'input
      var newName = listNameInput.val();

      // On remplace le nom de la liste dans h2 par le nouveau
      // et on met en majuscule la première lettre
      listNameH2.text(newName.charAt(0).toUpperCase() + newName.slice(1));
      // On supprime le nom inscrit par l'utilisateur dans l'input
      listNameInput.val('');
      // On remplace l'ancien placeholder par le nouveau nom
      listNameInput.attr('placeholder', listNameH2.text());

      // On éxécute une requête ajax pour mettre à jour la bd
      app.sendNewListNameToDB(listId, newName);
    }
  },
  sendNewListNameToDB: function(listId, listNewName) {
    // On effectue une requête ajax en POST
    // avec comme valeurs : id et name
    $.ajax({
      type: 'POST',
      url: '/Challenges/Challenge_S9-J3_OKanban-j4/list/update',
      data: 'id=' + listId + '&name=' + listNewName,
      success: function(title) {
        console.log(title);
      }
    });
  }
};

$(app.init);
