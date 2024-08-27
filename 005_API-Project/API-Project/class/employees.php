<?php

class Eployee
{
    private $connect;

    public $id;

    public $name;

    public $email;

    public $age;

    public $designation;

    public $created;

    public function __construct($db)
    {
        $this->connect = $db;
    }

    //GET ALL

    public function getEmployees()
    {
        $sql = "SELECT * FROM employee";

        $query = $this->connect->prepare($sql);

        $query->execute();

        return $query;
    }

    //CREATE

    public function createEmployee()
    {
        // $sql = "INSERT INTO employee(name, email, age, designation) VALUES($this->name, $this->email, $this->age, $this->designation)";

        $sql = "INSERT INTO employee SET name= :name, email= :email, age= :age, designation= :designation";

        $this->name = htmlspecialchars($this->name);

        $this->email = htmlspecialchars($this->email);

        $this->age = htmlspecialchars($this->age);

        $this->designation = htmlspecialchars($this->designation);

        $query = $this->connect->prepare($sql);

        $query->bindParam(":name", $this->name);

        $query->bindParam(":email", $this->email);

        $query->bindParam(":age", $this->age);

        $query->bindParam(":designation", $this->designation);

        if($query->execute()) {
            return true;
        }else {
            return false;
        }
    }

    //READ SINGLE

    public function getSingleEmployee()
    {
        $sql = "SELECT id, name, email, age, designation, created FROM employee WHERE id = ? LIMIT 0,1";

        $query = $this->connect->prepare($sql);

        $query->bindParam(1, $this->id);

        $query->execute();

        $dataRow = $query->fetch(PDO::FETCH_ASSOC);

        $this->name = $dataRow['name'];

        $this->email = $dataRow['email'];

        $this->age = $dataRow['age'];

        $this->designation = $dataRow['designation'];

        $this->created = $dataRow['created'];
    }

    //UPDATE

    public function updateEmployee()
    {
        $sql = "UPDATE employee SET id= :id, name= :name, email= :email, age= :age, designation= :designation, created= :created WHERE id= :id";

        $this->id = htmlspecialchars($this->id);

        $this->name = htmlspecialchars($this->name);

        $this->email = htmlspecialchars($this->email);

        $this->age = htmlspecialchars($this->age);

        $this->designation = htmlspecialchars($this->designation);

        $this->created = htmlspecialchars($this->created);

        $query = $this->connect->prepare($sql);

        $query->bindParam(":id", $this->id);

        $query->bindParam(":name", $this->name);

        $query->bindParam(":email", $this->email);

        $query->bindParam(":age", $this->age);

        $query->bindParam(":designation", $this->designation);

        $query->bindParam(":created", $this->created);

        if($query->execute()) {
            return true;
        }else {
            return false;
        }
    }

    //DELETE

    public function deleteEmployee()
    {
        $sql = "DELETE FROM employee WHERE id= ?";

        $query = $this->connect->prepare($sql);

        $query->bindParam(1, $this->id);

        if($query->execute()) {
            return true;
        }else {
            return false;
        }
    }
}

?>