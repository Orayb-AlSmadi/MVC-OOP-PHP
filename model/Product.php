<?php


class Product
{
    private $name;
    private $description;
    private $price;
    private $created;
    private $category_id;

    /**
     * Product constructor.
     * @param $created
     */

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;

    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }



    function create($conn)
    {

        $date = new DateTime();
        $created_time = $date->format('Y-m-d H:i:s');
        $this->created = $created_time;

        $sql = "INSERT INTO products (name, price, description, created, category_id) VALUES ('$this->name', $this->price, '$this->description', '$this->created', '$this->category_id')";
        var_dump($sql);
        if ($conn->exec($sql)) {
            echo "success";
        } else
            echo "failed";
        header("Location: index.php");
    }

    function getData($connection)
    {
        $sql = "SELECT * from products";
//        var_dump($connection);
//        echo "</br>";
//        var_dump($sql);
        $result = $connection->query($sql);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
//        print_r($res);
//        echo "</br>";
//        print_r($res[0]);
//        echo "</br>";
//        print_r(count($res));
        return ($res);
//        $q = $result->fetch(PDO::FETCH_ASSOC);
//        var_dump($q);
//        echo "</br>";
//
//
//        while ($q) {
//            $q = $result->fetch(PDO::FETCH_ASSOC);
//            var_dump($q);
//            echo "</br>";
//        }
    }

    function deleteProd ($conn, $id){
        $sql = "DELETE FROM products WHERE id=$id";
        var_dump($sql);
        $conn->exec($sql);
    }

    function updatePro ($conn, $id){

        $sql = "UPDATE products SET name='$this->name', price=$this->price, description='$this->description' WHERE id=$id";
        var_dump($sql);

        $stmt = $conn->prepare($sql);

        $stmt->execute();
        header("Location: index.php");

    }

}