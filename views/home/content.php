<div class="row">
  <main id="board">
    <div id="lists" class="d-flex flex-row">

      <?php foreach($params as $list): ?>
      <div class="list">

        <div id="listName" class="d-flex flex-row">
          <h2><?= $list->getName(); ?></h2>
          <input id="inputList<?= $list->getId(); ?>" class="inputListName" type="text" name="listName" placeholder="<?= $list->getName(); ?>">
          <div class="editListName ml-auto">
            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
          </div>
        </div>

        <div class="cards">

          <div class="card">
            <div class="title">Post-it</div>
            <div class="d-flex flex-row actions">
              <div class="edit">Edit</div>
              <div class="trash">Delete</div>
            </div>
          </div>

        </div>

      </div>
      <?php endforeach; ?>

    </div>
  </main>
</div>
