<?php include "../layout/Header.php" ?>


<div class="container w-75">
    <form action=<?php echo $_SERVER['PHP_SELF']?>  method="POST">
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>

        <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
    </form>
</div>



<?php //include "../layout/footer.php"; ?>


<?php
include "../../database/DB.php";

$conn = new DB();
$connection= $conn->connect();

include "../../model/Category.php";

if (isset($_POST['submit']))
{
    $cat= new Category();
    $cat->setName($_POST['name']);
    $cat->create($connection);
}

?>
