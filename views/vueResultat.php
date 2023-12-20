
     <h2 class="text-center">Edition résultats match</h2>

     <?php if(empty($rencontres)): ?>
          <div class="text-center bg-secondary p-2 h3">Pas de scores à saisir</div>     
     <?php endif; ?>

     <div id="equipe" class="row justify-content-around mt-2">
          <?php foreach($rencontres as $equipe): ?>
              
               <div class="equipe card col-xs-12 col-sm-6 col-md-3 mb-4" style="width: 18rem;">
                    <div class="card-img-top"><i class="fa-solid fa-futbol"></i></div>
                    <div class="card-body">
                         <form action="" method="post">
                              <input type="hidden" value="<?= $equipe['id_rencontre'] ?>" name="id_rencontre">
                              <h5 class="card-title">
                                   <?= $equipe['equipe_a'] ?>
                                   <input type="number" min="0" max="300" name="score_a">
                              </h5>
                              <i> vs </i>
                              <h5 class="card-title">
                                   <?= $equipe['equipe_b'] ?>
                                   <input type="number" min="0" max="300" name="score_b">
                              </h5>
                              <p class="card-text">
                              à <?= $equipe['lieu'] ?> le  <?= $equipe['date_rencontre'] ?>
                              </p>
                              <input type="submit" class="btn btn-success mt-1" value="OK">
                         </form>
                    </div>
               </div>
          <?php endforeach; ?>
     </div>