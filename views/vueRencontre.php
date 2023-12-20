
<h2 class="text-center">Ajouter une rencontre équipe A vs équipe B</h2>


<a href="#ajouter" class="btn_ajouter btn btn-outline-success">Ajouter</a>

<div id="equipe" class="row justify-content-around mt-2">
          <?php foreach($rencontres as $equipe): ?>
               <?php if($equipe['date_rencontre'] >= date("Y-m-d h:i:s")): ?>
               <div class="equipe card col-xs-12 col-sm-6 col-md-3 mb-4" style="width: 18rem;">
                    <div class="card-img-top"><i class="fa-solid fa-futbol"></i></div>
                    <div class="card-body">
                         <h5 class="card-title"><?= $equipe['equipe_a'] ?></h5>
                         <i> vs </i>
                         <h5 class="card-title"><?= $equipe['equipe_b'] ?></h5>
                         <p class="card-text">
                             à <?= $equipe['lieu'] ?> le  <?= $equipe['date_rencontre'] ?>
                         </p>

                         <a href="?action=delete&id=<?= $equipe['id_rencontre'] ?>" class="btn btn-primary">
                              <i class="fa-solid fa-trash"></i>
                         </a>
                         <a href="?action=update&id=<?= $equipe['id_rencontre'] ?>#ajouter" class="btn btn-primary">
                              <i class="fa-solid fa-pen"></i>
                         </a>

                    </div>
               </div>
          <?php endif; ?>
          <?php endforeach; ?>
     </div>

     
<a href="#ajouter" class="btn_ajouter btn btn-outline-success">Ajouter</a>

<!-- AJOUTER -->
<div class="<?= (isset($rencontreToUp)) ? '' : 'd-none' ?> mt-3" id="ajouter">
     <h3>Ajouter une rencontre</h3>
     <form action="" method="post">
          <input value="<?= $rencontreToUp['id_rencontre'] ?? '' ?>" type="hidden" name="id_rencontre" value="">
          <div class="row">
               <div class="col-6">
                    <label for="">Equipe A</label>
                    <select id="equipe_a" class="form-select" name="equipe_a">
                         <option value=""> -- Equipe --</option>
                         <?php foreach($equipes as $equipe): ?>
                              <option <?= isset($rencontreToUp) && $rencontreToUp['id_equipe_a'] == $equipe['id_equipe'] ? 'selected' : '' ?> value="<?= $equipe['id_equipe'] ?>">
                                   <?= $equipe['nom_equipe'] ?>
                              </option>
                         <?php endforeach; ?> 
                    </select>
               </div>
               <div class="col-6">
                    <label for="">Equipe B</label>
                    <select id="equipe_b" class="form-select" name="equipe_b">
                         <option <?php if(isset($rencontreToUp)): ?>  value="<?= $rencontreToUp['id_equipe_b'] ?>" <?php endif; ?> >
                                   <?= isset($rencontreToUp)  ? $rencontreToUp["equipe_b"] : '' ?>
                              </option>
                    </select>
               </div>
               <div class="col-6">
                    <div class="form-group">
                         <label for="">Leiu</label>
                         <input value="<?= $rencontreToUp['lieu'] ?? '' ?>" type="text" name="lieu" class="form-control">
                    </div>
               </div>
               <div class="col-6">
                    <label for="">Type discipline</label>
                    <select class="form-select" name="type">
                         <?php foreach($types as $type): ?>
                              <option <?= isset($rencontreToUp) && $rencontreToUp['type'] == $type['type'] ? 'selected' : '' ?> value="<?= $type['type'] ?>">
                                   <?= $type['type'] ?>
                              </option>
                         <?php endforeach; ?> 
                    </select>
               </div>

               <div class="col-6 mb-3">
                    <div class="form-group">
                         <label for="">Date rencontre</label>
                         <input value="<?= $rencontreToUp['date_rencontre'] ?? '' ?>" type="datetime" name="date_rencontre" class="form-control">
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

     
     console.log(equipe_b)

     equipe_a.addEventListener('change', (even) => {
          //value equipe selectionnee
          let id_equipeChecked = equipe_a[equipe_a.selectedIndex].value;

          //vide le select equipe b
          equipe_b.innerHTML = "";

          for (let i = 0; i < equipe_a.length; i++) {
             //value equipe à chaque tour de boucle
             id_equipeToCopy = equipe_a[i].value;

               
                if( id_equipeChecked != id_equipeToCopy ){
                    let option = document.createElement("option");
                    option.value = id_equipeToCopy;
                    option.text = equipe_a[i].text;

                    equipe_b.appendChild(option)
                }
          }
     });
     
     
</script>