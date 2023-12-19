

     <h2 class="text-center">Liste des personnes</h2>

     <a href="#ajouter" class="btn_ajouter btn btn-outline-success">Ajouter</a>

     <div id="equipe" class="row justify-content-around mt-2">
          <?php foreach($personnels as $person): ?>
               <div class="equipe card col-xs-12 col-sm-6 col-md-3 mb-4" style="width: 18rem;">
                    <div class="card-img-top"><i class="fa-solid fa-user"></i></div>
                    <div class="card-body">
                         <h5 class="card-title"><?= $person['sexe']." ".$person['nom']." ".$person['prenom'] ?></h5>
                         <p class="card-text">
                              role : <?= $person['role']." pays: ".$person['nom_equipe'] ?>
                         </p>
                         <a href="?action=delete&id=<?= $person['id_personnel'] ?>" class="btn btn-primary">
                              <i class="fa-solid fa-trash"></i>
                         </a>
                         <a href="?action=update&id=<?= $person['id_personnel'] ?>&#ajouter" class="btn btn-primary">
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
               <input value="<?= $personnelToUp['id_personnel'] ?? '' ?>" type="hidden" name="id_personnel" value="">
               <div class="form-group col-6">
                    <label for="">Prénom</label>
                    <input value="<?= $personnelToUp['prenom'] ?? '' ?>" type="text" name="prenom" value="" class="form-control">
               </div>
               <div class="form-group col-6">
                    <label for="">Nom</label>
                    <input value="<?= $personnelToUp['nom'] ?? '' ?>" type="text" name="nom" value="" class="form-control">
               </div>
               
               <div class="col-6">
                    <label for="">Equipe</label>
                    <select id="equipe" class="form-select" name="id_equipe">
                         <option value=""> -- Equipe --</option>
                         <?php foreach($equipes as $equipe): ?>
                              <option value="<?= $equipe['id_equipe'] ?>"><?= $equipe['nom_equipe'] ?></option>
                         <?php endforeach; ?> 
                    </select>
               </div>
               <div class="col-6">
                    <label for="">Rôle</label>
                    <select class="form-select" name="role">
                         <option value=""> -- Rôle --</option>
                         <?php foreach($roles as $role): ?>
                              <option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
                         <?php endforeach; ?> 
                    </select>
               </div>
               <div class="col-6 mt-2">
                    <div class="form-check form-check-inline">
                         <input type="radio" name="sexe" value="femme" class="form-check-input" id="fm">
                         <label for="fm">Femme</label>
                    </div>
                    <div class="form-check form-check-inline">
                         <input type="radio" name="sexe" value="homme" class="form-check-input" id="hm">
                         <label for="hm">Homme</label>
                    </div>
               </div>
               <div class="d-block mt-3">
                    <input type="submit">
               </div>
          </form>

     </div>

