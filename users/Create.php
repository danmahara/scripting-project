<?php
class Create
{
    private $conn;
    public function __construct()
    {
        $conn = mysqli_connect('localhost', 'root', '', 'collegeproject');
        if (!$this->conn) {
            die('Can not connect');
        }

    }

    function createUser($name, $email, $password, $role, $status)
    {



    }


}

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $status = ['status'];

    $createObject = new Create();
    $createObject->createUser($name, $email, $password, $role, $status);
}

?>


