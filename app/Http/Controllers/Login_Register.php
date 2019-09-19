
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class Connexion extends Controller
{
    public function dbConnect($serverName="localhost",
            $dbName    ="ChatBoxTest",
            $userName  ="webiiChatBox",
            $password  ="123456") {
            $conn = new PDO( "mysql:host=$serverName;dbname=$dbName;charset=utf8", 
        $userName, $password);
        return $conn;
    }


    #Creation d'un user donc on insert dans la DB.
    public function register() {
        session_start();
        $login = $_POST["login"];
        $name = $_POST["name"];
        $conn = $this->dbConnect();
        $sql = "INSERT INTO chatusers (login,displayName) VALUES ('$login','$name')";
        $request = $conn->prepare($sql);
        $request->execute();
        $request->fetchAll();
        $conn - null;
        $_SESSION["login"] = $login;
        return $login;
    }

    public function doesLoginExist($login) {
        $conn = $this->dbConnect();
        $sql = "SELECT login FROM chatusers c WHERE c.login = '$login' ";
        $request = $conn->prepare($sql);
        $request->execute();
        $conn = null;
        return !$request->fetch();
    }
}