    <?php
include 'conn.php';
abstract class Books {
    protected $Name;
    protected $Writer;
    protected $Year;
    protected $Type;
    protected $user_id;
  
    public function __construct($Name, $Writer,$Year, $Type, $user_id) {
      $this->Name = $Name;
      $this->Writer = $Writer;
      $this->Year = $Year;
      $this->Type = $Type;
      $this->user_id = $user_id;
    }
  
    public function set_Name($Name)
    {
        $this->Name = $Name;
    }
    public function set_Writer($Writer)
    {
        $this->Writer = $Writer;
    }
    public function set_Year($Year)
    {
        $this->Year = $Year;
    }
    public function set_Type($Type)
    {
        $this->Type = $Type;
    }
    

    public function get_Name()
    {
        return $this->Name ;
    }
    public function get_Writer()
    {
        return $this->Writer ;
    }
    public function get_Year()
    {
        return $this->Year ;
    }
    public function get_Type()
    {
        return $this->Type ;
    }


    abstract static public function show_bokss();
  
    abstract public function add_boks();
  
    abstract static public function update_boks($boks_id, $new_Name,$new_Writer,$new_Year  ,$new_Type,$new_file);
  
    abstract static public function delete_boks($boks_id);

    abstract static public function get_boks($boks_id);

// Get a user by their ID
public static function get_user($user_id) {
    $db = DBL4::getInstance();
    $connection = $db->getConnection();
    $query = "SELECT * FROM managers WHERE id = '$user_id' ";
    $stmt = mysqli_query($connection,$query);
      $result = mysqli_fetch_assoc($stmt);
    return $result;
}

  }
  
class Manager_Usar2 extends Books
{
    private $file;
    
    public function __construct($Name, $Writer,$Year, $Type, $file, $user_id)
    {
        parent::__construct($Name, $Writer,$Year,$Type, $user_id,);
        $this->file = $file;
    }

    public function set_file($file)
    {
        $this->file = $file;
    }
    public function get_file()
    {
        return $this->file;
    }
    public function add_boks()
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "INSERT INTO `books`(`Name`, `Writer`, `Year`, `Type`, `file`, `user_id`) VALUES ('$this->Name','$this->Writer','$this->Year','$this->Type','$this->file','$this->user_id')";
        $stmt = mysqli_query($connection,$query);
    }
    
    public static function update_boks($boks_id, $new_Name,$new_Writer,$new_Year  ,$new_Type,$new_file)
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "UPDATE books SET Name = '$new_Name', Writer = '$new_Writer' , Year = '$new_Year' ,Type = '$new_Type' , file = '$new_file' WHERE id ='$boks_id' ";
        $stmt = mysqli_query($connection,$query);
    }
    
    public static function delete_boks($boks_id)
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "DELETE from books WHERE id ='$boks_id' ";
        $stmt = mysqli_query($connection,$query);
    }
    public static function get_boks($boks_id) {
        $db = DBL4::getInstance();
            $connection = $db->getConnection();
        $query = "SELECT * FROM books WHERE id = '$boks_id' ";
        $stmt = mysqli_query($connection,$query);
          $result = mysqli_fetch_assoc($stmt);
        return $result;
    }
    public static function show_bokss() {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "SELECT * FROM books";
        $stmt = mysqli_query($connection,$query);
        $bokss = mysqli_fetch_all($stmt,MYSQLI_ASSOC);
        return $bokss;
    }
}



class Normal_Usar2 extends Books
{
    private $file;
    
    public function __construct($Name, $Writer,$Year, $Type, $file, $user_id)
    {
        parent::__construct($Name, $Writer,$Year,$Type, $user_id,);
        $this->file = $file;
    }

    public function set_file($file)
    {
        $this->file = $file;
    }
    public function get_file()
    {
        return $this->file;
    }
    public function add_boks()
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "INSERT INTO `books`(`Name`, `Writer`, `Year`, `Type`, `file`, `user_id`) VALUES ('$this->Name','$this->Writer','$this->Year','$this->Type','$this->file','$this->user_id')";
        $stmt = mysqli_query($connection,$query);
    }
    
    public static function update_boks($boks_id, $new_Name,$new_Writer,$new_Year  ,$new_Type,$new_file)
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "UPDATE books SET Name = '$new_Name', Writer = '$new_Writer' , Year = '$new_Year' ,Type = '$new_Type' , file = '$new_file' WHERE id ='$boks_id' ";
        $stmt = mysqli_query($connection,$query);
    }
    
    public static function delete_boks($boks_id)
    {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "DELETE from books WHERE id ='$boks_id' ";
        $stmt = mysqli_query($connection,$query);
    }
    public static function get_boks($boks_id) {
        $db = DBL4::getInstance();
            $connection = $db->getConnection();
        $query = "SELECT * FROM books WHERE id = '$boks_id' ";
        $stmt = mysqli_query($connection,$query);
          $result = mysqli_fetch_assoc($stmt);
        return $result;
    }
    public static function show_bokss() {
        $db = DBL4::getInstance();
        $connection = $db->getConnection();
        $query = "SELECT * FROM books";
        $stmt = mysqli_query($connection,$query);
        $bokss = mysqli_fetch_all($stmt,MYSQLI_ASSOC);
        return $bokss;
    }
}


