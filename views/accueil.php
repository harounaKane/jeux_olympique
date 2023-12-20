
     
          <h2 class="text-center">Matchs à venir</h2>

          <table class="table">
               <tr>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Equipe A</th>
                    <th>Equipe B</th>
               </tr>
               <?php foreach($rencontres as $ren): ?>
                    <?php if($ren['date_rencontre'] >= date("Y-m-d H:i:s")): ?>
                         <tr>
                              <td> <?= $ren['type'] ?> </td>
                              <td> <?= $ren['date_rencontre'] ?> </td>
                              <td> <?= $ren['lieu'] ?> </td>
                              <td> <?= $ren['equipe_a'] ?> </td>
                              <td> <?= $ren['equipe_b'] ?> </td>
                         </tr>
                    <?php endif; ?>
               <?php endforeach; ?>
          </table>

          <hr class="my-5">

          <h2 class="text-center">Résultat des Matchs</h2>

          <table class="table">
               <tr>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Lieu</th>
                    <th>Equipe A</th>
                    <th>Score</th>
                    <th>Equipe B</th>
               </tr>
               <?php foreach($rencontres as $ren): ?>
                    <?php if($ren['date_rencontre'] < date("Y-m-d H:i:s")): ?>
                         <tr>
                              <td> <?= $ren['type'] ?> </td>
                              <td> <?= $ren['date_rencontre'] ?> </td>
                              <td> <?= $ren['lieu'] ?> </td>
                              <td> <?= $ren['equipe_a'] ?> </td>
                              <td>
                                   <?= $ren['score_e_a'] ?>
                                    - 
                                   <?= $ren['score_e_b'] ?>
                              </td>
                              <td> <?= $ren['equipe_b'] ?> </td>
                         </tr>
                    <?php endif; ?>
               <?php endforeach; ?>
          </table>
   