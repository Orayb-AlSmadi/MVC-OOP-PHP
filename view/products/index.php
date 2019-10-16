<?php include "../layout/Header.php" ?>

<?php
include "../../database/DB.php";
include "../../model/Product.php";
$conn = new DB();
$connection= $conn->connect();

$prods = new Product();


if(isset($_POST['delete'])){
//    echo "HERE DELETE";
//    var_dump($_POST['delete']);
//    echo "<br/>";
    $prods->deleteProd($connection, $_POST['delete']);
//    $arr= $prods->getData($connection);
}

if(isset($_POST['edit'])){
    session_start();
    $_SESSION["id"] = $_POST['edit'];
    header("Location: edit.php");
}

$arr= $prods->getData($connection);

?>

<a class="btn btn-info active" href="/MVC-OOP-PHP/view/products/create-product.php" style="margin: 20px">Create Products</a>


<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Created</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>

    </tr>
    </thead>
    <tbody>
    <?php
    for ($i=0; $i<count($arr);$i++) { ?>
    <tr>
        <th scope="row"><?php echo $arr[$i]['id'] ?></th>
        <td><?php echo $arr[$i]['name'] ?></td>
        <td><?php echo $arr[$i]['description'] ?></td>
        <td><?php echo $arr[$i]['price'] ?></td>
        <td><?php echo $arr[$i]['modified'] ?></td>
        <td>
            <form action=<?php echo $_SERVER['PHP_SELF']?>  method="POST">
            <button type="submit" name="edit"  class="btn btn-warning" value="<?php echo $arr[$i]['id'] ?>"> Edit </button>
            </form>
<!--            <a class="btn btn-warning active" href="/MVC-OOP-PHP/view/products/edit.php">Edit</a> </td>-->
        <td>
            <form action=<?php echo $_SERVER['PHP_SELF']?>  method="POST">
            <button type="submit" name="delete"  class="btn  btn-danger" value="<?php echo $arr[$i]['id'] ?>"> Delete </button>
            </form>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>

<?php include "../layout/footer.php" ?>



