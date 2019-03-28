class DbOperation
{
    //Database connection link
    private $con;
 
    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DBConnect.php';
 
        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();
 
        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }
 
    //storing token in database 
    public function registerDevice($username,$device){
        if(!$this->isUserexist($username)){
            $stmt = $this->con->prepare("INSERT INTO user (username, device) VALUES (?,?) ");
            $stmt->bind_param("ss",$username,$device);
            
            if($stmt->execute())
                return 0; //return 0 means success
            return 1; //return 1 means failure
        }else{
            $stmt = $this->con->prepare("UPDATE  user SET device = ? WHERE username = ?");
            $stmt->bind_param("ss",$device,$username);
            
            if($stmt->execute())
                return 0; //return 0 means success
            return 1; //retur

        }
    }
 
    //the method will check if email already exist 
    private function isUserexist($username){
        $stmt = $this->con->prepare("SELECT username FROM user WHERE username = ?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }
 
    //getting all tokens to send push to all devices
    public function getAllTokens(){
        $stmt = $this->con->prepare("SELECT device FROM user");
        $stmt->execute(); 
        $result = $stmt->get_result();
        $tokens = array(); 
        while($token = $result->fetch_assoc()){
            array_push($tokens, $token['device']);
        }
        return $tokens; 
    }