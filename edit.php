<?php include "includes/header.php"; ?>
<?php
include_once 'db/dbh.php';
$edit = $_GET['edit'];
$sql = "SELECT * FROM ps4 WHERE id=?;";
$stmt = $dbconn->prepare($sql);
$stmt -> bind_param("i", $edit);
$stmt -> execute();
$result = $stmt -> get_result();
while($row = $result -> fetch_assoc() ){
?>

<div class="container">

<div class="row text-center">




        <div class="col-10 mx-auto my-2 col-md-5 card">
        <h5 class="bg-info text-white p-2">Update  user</h5>
        <form action="db/action.php" method = "POST">
        <div class="form-group">
          <input type="hidden" name="fid" value = "<?= $row['id']; ?>">
            <label>Name</label>
            <input type="text" class="form-control" name = "fname" required value = "<?= $row['name']; ?>">
            </div>
<!--        end of form group-->
      <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name = "femail" required value = "<?= $row['email']; ?>">
            </div>
<!--        end of form group-->
      <div class="form-group">
            <label>Mobile</label>
            <input type="tel" class="form-control" name = "fmobile" required value = "<?= $row['mobile']; ?>">
            </div>
<!--        end of form group-->

            <input type="submit" value="Update" class="btn btn-info btn-block  " name = "fupdate">
        </form>


        </div>
   <!--    end of col    -->

    </div>

</div>
<?php } ?>

<?php include"includes/footer.php"; ?>
