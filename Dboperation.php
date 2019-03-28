 
<?php
 ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/Dbconnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
public function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

    public function mailit($email,$rollno,$pass)
    {
$to = $email;
$subject = "Password for Mindbuzz";
$txt = "This is your last step for registration with your rollno".$rollno."and password ".$pass;
$headers = "From: innovationcell@mmmut.ac.in" . "\r\n";

mail($to,$subject,$txt,$headers);
    }
    //storing token in database 
    public function registerUser($name,$last,$email,$phone,$univ,$roll,$branch,$year,$course,$pass1){
        if(!$this->isUserexist($roll)){
            $stmt = $this->con->prepare("INSERT INTO user (Name,Last,email,phone,university,rollno,branch,year,course) VALUES (?,?,?,?,?,?,?,?,?) ");
            $stmt->bind_param("sssssssss",$name,$last,$email,$phone,$univ,$roll,$branch,$year,$course);
            
            if($stmt->execute())
            {
                $pass = $pass1;
                $this->mailit($email,$roll,$pass);
                 $stmt = $this->con->prepare("INSERT INTO leader (rollno,email,password) VALUES (?,?,?) ");
            $stmt->bind_param("sss",$roll,$email,$pass);
              if($stmt->execute())
                  return 0;
              return 1;

            }

                
            return 1; //return 1 means failure
        }else{
           
            return 2; //retur

        }
    }
 
    //the method will check if email already exist 
    private function isUserexist($username){
        $stmt = $this->con->prepare("SELECT rollno FROM user WHERE rollno = ?");
       
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        
        return $num_rows > 0;
    }
 
    //getting all tokens to send push to all devices
    public function login($roll,$email,$pass){
        if($this->isUserexist($roll)){
        $stmt = $this->con->prepare("SELECT * FROM leader WHERE rollno= ? and password=?");
        $stmt->bind_param("ss",$roll,$pass);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->store_result();
         $num_rows = $stmt->num_rows;
        
        
        return $result; 
    }
     return 1;
    }
 
    //getting a specified token to send push to selected device
    public function updatelevel($roll,$level,$point){
        $stmt = $this->con->prepare("UPDATE leader set level=?,points = ? WHERE rollno = ?");
        $stmt->bind_param("iis",$level,$point,$roll);
           $v = $stmt->execute(); 
        
       
        return $v;;        
    }
 
    //getting all the registered devices from database 
    public function getquestion($level){
        $stmt = $this->con->prepare("SELECT * FROM question WHERE level= ?");
        $stmt->bind_param("i",$level);
          
        $stmt->execute();
         $result = $stmt->get_result();
        $stmt->store_result();
       
       
        

        return $result; 
    }
    public function leaderboard()
    { $stmt = $this->con->prepare("SELECT user.Name, user.course, user.year, leader.level FROM leader INNER JOIN user ON leader.rollno=user.rollno ORDER BY leader.level DESC ");
           $stmt->execute();
            $result = $stmt->get_result();
        $stmt->store_result();

        return $result;
        
    }
}