

     <h2 class="text-center">Liste des équipes</h2>

     <a href="#ajouter" class="btn_ajouter btn btn-outline-success">Ajouter</a>

     <div id="equipe" class="row justify-content-around mt-2">
          <?php foreach($equipes as $equipe): ?>
               <div class="equipe card col-xs-12 col-sm-6 col-md-3 mb-4" style="width: 18rem;">
                    <div class="card-img-top"><i class="fa-solid fa-futbol"></i></div>
                    <div class="card-body">
                         <h5 class="card-title"><?= $equipe['nom_equipe'] ?></h5>
                         <p class="card-text"></p>
                         <a href="?action=delete&id=<?= $equipe['id_equipe'] ?>" class="btn btn-primary">
                              <i class="fa-solid fa-trash"></i>
                         </a>
                         <a href="?action=update&id=<?= $equipe['id_equipe'] ?>" class="btn btn-primary">
                              <i class="fa-solid fa-pen"></i>
                         </a>
                    </div>
               </div>
          <?php endforeach; ?>
     </div>
     
     <a href="#ajouter" class="btn_ajouter btn btn-outline-success">Ajouter</a>

     <div class="d-none" id="ajouter">
          <h3 class="text-center">Ajouter une équipe</h3>

          <form action="" method="post" class="row align-items-center">
               <input type="hidden" value="<?= $equipeToUp['id_equipe'] ?? '' ?>" name="id_equipe" value="">
               <div class="form-group col-4">
                    <label for="">Equipe</label>
                    <input type="text" name="nom_equipe" value="<?= $equipeToUp['nom_equipe'] ?? '' ?>" class="form-control">
               </div>
               <div class="col-3 mt-4">
                    <input type="submit">
               </div>
          </form>

     </div>

