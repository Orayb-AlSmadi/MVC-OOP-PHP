<?php


class Category
{
    private $name;
    private $created;

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


    function create($conn)
    {

        $date = new DateTime();
        $created_time = $date->format('Y-m-d H:i:s');
        $this->created = $created_time;

        $sql = "INSERT INTO categories (name, created) VALUES ('$this->name', '$this->created')";
        var_dump($sql);
        if ($conn->exec($sql)) {
            echo "success";
        } else
            echo "failed";
        header("Location: index.php");
    }


    function getData($connection)
    {
        $sql = "SELECT * from categories";
        $result = $connection->query($sql);
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return ($res);
    }

    function deleteProd ($conn, $id){
        $sql1 = "DELETE FROM products WHERE category_id=$id";
        $conn->exec($sql1);
        $sql2 = "DELETE FROM categories WHERE id=$id";
        $conn->exec($sql2);
    }

    function updatePro ($conn, $id){

        $sql = "UPDATE categories SET name='$this->name'WHERE id=$id";
        var_dump($sql);

        $stmt = $conn->prepare($sql);

        $stmt->execute();
        header("Location: index.php");

    }


}