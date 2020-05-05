<?php
  include('db.php');
//Add
if (isset($_POST['ajouter'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $successMessage= 'Tache ajoutée avec succés';

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>PHP CRUD MYSQL</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">Todo avec PHP/MYSQL</a>
      </div>
    </nav><br>

<main class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
            <!-- MESSAGES -->
      <?php if(isset($successMessage)){ ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $successMessage; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
          </div>
    <div class="col-md-8 offset-md-2">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Déscription</th>
            <th>Date de création</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
             <td hidden="true"><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <button type="button" class="btn btn-secondary editbtn"><i class="fas fa-marker"></i></button>
              <a href="index.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-8 offset-md-2">
      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addPopUp" >
          <i class="fa fa-plus"></i> Ajouter une tâche
      </button>
    </div>
  </div>
</main>
<!-- add -->
<div class="modal fade" id="addPopUp" tabindex="-1" role="dialog" aria-labelledby="addPopUpTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajout d'une nouvelle tâche</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 mx-auto">
            <div class="card card-body">
            <form action="" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Titre de la tâche" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Déscription de la tâche"></textarea>
          </div>
          <input type="submit" name="ajouter" class="btn btn-success btn-block" value="Enregistrer">
        </form>
      </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BOOTSTRAP 4 SCRIPTS -->
<script src="jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    $('.editbtn').on('click',function(){
      $('#editPopUp').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children('td').map(function(){
          return $(this).text();
      }).get();
      console.log(data);
          $('#id').val(data[0]);
          $('#title').val(data[1]);
          $('#description').val(data[2]);
    });
  });
</script>
</body>
</html>
