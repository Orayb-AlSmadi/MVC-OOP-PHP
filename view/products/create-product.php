
<?php include "../layout/Header.php" ;
?>


<?php
include "../../database/DB.php";
include "../../model/Product.php";
include "../../model/Category.php";
$conn = new DB();
$connection= $conn->connect();
$cat= new Category();
$category= $cat->getData($connection);
//print_r($category);

if (isset($_POST['submit']))
{
    $prod= new Product();
    $prod->setName($_POST['name']);
    $prod->setDescription($_POST['description']);
    $prod->setPrice($_POST['price']);

    $prod->setCategoryId($_POST['categoryId']);
    $prod->create($connection);
}

?>

<div class="container w-75">
<form action=<?php echo $_SERVER['PHP_SELF']?>  method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" >
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" class="form-control" id="description" >
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" name="price" class="form-control" id="price" >
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
        </div>

        <select class="custom-select" name="categoryId"  id="inputGroupSelect01">

            <option selected>Choose...</option>
            <?php for($i=0; $i<count($category); $i++) {?>
            <option value="<?php echo $category[$i]['id'] ?>"><?php echo $category[$i]['name'] ?></option>
            <?php } ?>
        </select>

    </div>

<!--    <div class="form-group">-->
<!--        <label for="created">Created</label>-->
<!--        <input type="date" name="created" class="form-control" id="created" >-->
<!--    </div>-->

    <button type="submit" name="submit"  class="btn btn-primary">Submit</button>
</form>
</div>



<?php //include "../layout/footer.php"; ?>


