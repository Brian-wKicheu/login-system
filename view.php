<?php include"includes/header.php"; ?>
<?php
include_once 'db/dbh.php';
$view = $_GET['view'];
$sql = "SELECT * FROM ps4 WHERE id=?;";
$stmt = $dbconn->prepare($sql);
$stmt -> bind_param("i", $view);
$stmt -> execute();
$result = $stmt -> get_result();
while($row = $result -> fetch_assoc()){
?>

<div class="container">

<div class="row text-center">

    <div class="col-10 mx-auto my-2 col-md-4">

             <div class="list-group">
    <a href="index.php" class="list-group-item list-group-item-action active">

        USER  DETAILS
        </a>

    <p class="list-group-item list-group-item-action"><strong>Name: </strong><?= $row['name']; ?></p>
    <p class="list-group-item list-group-item-action"><strong>Email: </strong><?= $row['email']; ?></p>
       <p class="list-group-item list-group-item-action"><strong>Mobile: </strong><?= $row['mobile']; ?></p>

    </div>



    </div>


    </div>

</div>



<?php } ?>


<?php include"includes/footer.php"; ?>
