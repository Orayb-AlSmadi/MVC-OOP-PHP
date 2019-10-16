<?php include "../layout/Header.php" ?>

<?php
session_start();
$id= $_SESSION["id"];

include "../../database/DB.php";
include "../../model/Category.php";

$DB = new DB();
$conn = $DB->connect();

$cat = new Category();
$arr= $cat->getData($conn);

for ($i=0; $i<count($arr); $i++){
    if($arr[$i]['id']== $_SESSION["id"]){
        $category= $arr[$i];
    }
}


if(isset($_POST['update'])){
    $cat->setName($_POST['name']);
    $cat->updatePro($conn, $id);
}
?>


<div class="container w-75">
    <form action=<?php echo $_SERVER['PHP_SELF']?>  method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $category['name'];
            ?>">
        </div>


        <button type="submit" name="update"  class="btn btn-primary">Update Category</button>
    </form>
</div>