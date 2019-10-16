<?php include "../layout/Header.php" ?>

<?php
session_start();
$id= $_SESSION["id"];

include "../../database/DB.php";
include "../../model/Product.php";

$DB = new DB();
$conn = $DB->connect();

$prod = new Product();
$arr= $prod->getData($conn);

for ($i=0; $i<count($arr); $i++){
    if($arr[$i]['id']== $_SESSION["id"]){
        $product= $arr[$i];
    }
}

print_r($product) ;
 echo $product['name'];

 if(isset($_POST['update'])){
     $prod->setName($_POST['name']);
     $prod->setDescription($_POST['description']);
     $prod->setPrice($_POST['price']);
     $prod->updatePro($conn, $id);
 }
?>


<div class="container w-75">
    <form action=<?php echo $_SERVER['PHP_SELF']?>  method="POST">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="<?php echo $product['name'];
            ?>">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" id="description" value="<?php echo $product['description'];
            ?>" >
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" class="form-control" id="price" value="<?php echo $product['price'];
            ?>">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>

        </div>

        <button type="submit" name="update"  class="btn btn-primary">Update Product</button>
    </form>
</div>