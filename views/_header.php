<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="utils/css/style.css">
     <title>Jeux olympiques</title>
</head>
<body>

     <header class="bg-secondary p-4 mb-3">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a href="." class="btn">JO</a>

               <?php if( isset($_SESSION['ADMIN']) ): ?>
                    <a href="personnel.php" class="btn">Personnel</a>               
                    <a href="equipe.php" class="btn">Equipe</a>               
                    <a href="rencontre.php" class="btn">Matchs</a>  
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                         <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   Infos
                                   </a>
                                   <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li><a class="dropdown-item" href="#">Liste équipes</a></li>
                                        <li><a class="dropdown-item" href="#">Personnel</a></li>
                                   </ul>
                              </li>
                         </ul>
                    </div>
                    <a href="login.php?action=logout" class="btn">Déconnexion</a>
               <?php else: ?>
                    <a href="login.php" class="btn">Connexion</a>
               <?php endif; ?>
          </nav>
     </header>
     <main class="container-fluid">
          <?php if( isset($_SESSION['success']) ): ?>
               <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success']; ?>
               </div>
          <?php endif; ?>

          <?php if( isset($_SESSION['warning']) ): ?>
               <div class="alert alert-warning" role="alert">
                    <?= $_SESSION['warning']; ?>
               </div>
          <?php endif; ?>