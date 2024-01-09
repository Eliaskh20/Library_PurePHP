<?php

include 'conn.php'; 
abstract class Orders{
    protected $user_id;
    protected $book_id;

    public function __construct($user_id,$book_id)
    {
        $this->user_id = $user_id;
        $this->book_id=$book_id;
    }

    public function setuserid($user_id){
        $this->user_id = $user_id;
    }
    public function setbookid($book_id){
        $this->book_id = $book_id;
    }

    public function getuserid()
    {
        return $this->user_id ;
    }
    public function getbookid()
    {
        return $this->book_id ;
    }


    abstract public function addorder();
    public static  function show_order($user_id){
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "SELECT order.ID,users.Name, books.Name, books.Writer, books.Year, books.Type, books.file FROM ((`order` INNER JOIN `users` ON order.user_id = users.ID) INNER JOIN `books` ON order.book_id = books.ID) WHERE users.ID = '$user_id'  ";
        $stmt = mysqli_query($connection,$query);
        $result = mysqli_fetch_all($stmt,MYSQLI_ASSOC);
        return $result;
    }
    public static  function getorder($user_id,$book_id)
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "SELECT * FROM `order` WHERE user_id ='$user_id' AND book_id='$book_id' ";
        $stmt = mysqli_query($connection,$query);
          $result = mysqli_fetch_assoc($stmt);
        return $result;
    }
}

class neworder extends Orders
{

    public function __construct($user_id, $book_id)
    {
        parent::__construct($user_id, $book_id);
    }

    public function addorder()
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "INSERT INTO `order`(`user_id`, `book_id`) VALUES ('$this->user_id','$this->book_id')";
        $stmt = mysqli_query($connection,$query);
    }
    public static function getorder($user_id, $book_id)
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "SELECT * FROM order WHERE user_id = '$user_id' AND book_id = '$book_id'";
        $stmt = mysqli_query($connection,$query);
        $result = mysqli_fetch_assoc($stmt);
         return $result;
    }



}



?>