
<h2 class="text-center">Ajouter une rencontre équipe A vs équipe B</h2>


<a href="#ajouter" id="btn_ajouter" class="btn btn-outline-success">Ajouter</a>

<div id="equipe" class="row justify-content-around mt-2">
          <?php foreach($rencontres as $equipe): ?>
               <?php if($equipe['date_rencontre'] >= date("d/m/Y")): ?>
               <div class="equipe card col-xs-12 col-sm-6 col-md-3 mb-4" style="width: 18rem;">
                    <div class="card-img-top"><i class="fa-solid fa-futbol"></i></div>
                    <div class="card-body">
                         <h5 class="card-title"><?= $equipe['nom_equipe_a'] ?></h5>
                         <i> vs </i>
                         <h5 class="card-title"><?= $equipe['nom_equipe_b'] ?></h5>
                         <p class="card-text">
                             à <?= $equipe['lieu'] ?> le  <?= $equipe['date_rencontre'] ?>
                         </p>

                         <a href="?action=delete&id=<?= $equipe['id_rencontre'] ?>" class="btn btn-primary">
                              <i class="fa-solid fa-trash"></i>
                         </a>
                         <a href="?action=update&id=<?= $equipe['id_rencontre'] ?>" class="btn btn-primary">
                              <i class="fa-solid fa-pen"></i>
                         </a>

                    </div>
               </div>
          <?php endif; ?>
          <?php endforeach; ?>
     </div>


<!-- AJOUTER -->
<div class="" id="ajouter">
     <form action="" method="post">
          <div class="row">
               <div class="col-6">
                    <label for="">Equipe A</label>
                    <select id="equipe_a" class="form-select" name="equipe_a">
                         <option value=""> -- Equipe --</option>
                         <?php foreach($equipes as $equipe): ?>
                              <option value="<?= $equipe['id_equipe'] ?>"><?= $equipe['nom_equipe'] ?></option>
                         <?php endforeach; ?> 
                    </select>
               </div>
               <div class="col-6">
                    <label for="">Equipe B</label>
                    <select id="equipe_b" class="form-select" name="equipe_b">
                         <?php foreach($equipes as $equipe): ?>
                              <option value="<?= $equipe['id_equipe'] ?>"><?= $equipe['nom_equipe'] ?></option>
                         <?php endforeach; ?> 
                    </select>
               </div>
               <div class="col-6">
                    <div class="form-group">
                         <label for="">Leiu</label>
                         <input type="text" name="lieu" class="form-control">
                    </div>
               </div>
               <div class="col-6">
                    <label for="">Type discipline</label>
                    <select class="form-select" name="equipe_b">
                         <?php foreach($types as $type): ?>
                              <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                         <?php endforeach; ?> 
                    </select>
               </div>

               <div class="col-6 mb-3">
                    <div class="form-group">
                         <label for="">Date rencontre</label>
                         <input type="date" name="date_rencontre" class="form-control">
                    </div>
               </div>
               <div>
                    <input type="submit">
               </div>
          </div>
     </form>
</div>

<script>
     let equipe_a = document.getElementById('equipe_a');
     let equipe_b = document.getElementById('equipe_b');


     equipe_a.addEventListener('change', (even) => {
          let id_ea = equipe_a[equipe_a.selectedIndex].value;
          for (let i = 0; i < equipe_b.length; i++) {
               let id_eb = equipe_b[i].value;
               
               if( id_ea == id_eb ){
                    console.log(equipe_b[i]);
                    equipe_b[i].text = "";
                    equipe_b.remove(i)
               }
               
          }
     });
     
     
</script>