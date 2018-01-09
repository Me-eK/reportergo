<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

class DB_Functions {

    public $conn;

    // constructor
    function __construct() {
        require_once 'include/DB_Connect_new.php';
        // connecting to database
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {
        
    }

    /**
     * Storing new user
     * returns user details
     */
    public function storeUser($name, $email, $password) {
        //$uuid = uniqid('', true);
        //$hash = $this->hashSSHA($password);
        //$encrypted_password = $hash["encrypted"]; // encrypted password
        //$salt = $hash["salt"]; // salt
		$sql = "UPDATE users SET event='peterparker_new@mail.com' WHERE id=1";
        $stmt = "INSERT INTO users( name, email, password,  created_at) VALUES( ?, ?, ?, NOW())";
        //$stmt = $this->conn->prepare("INSERT INTO users( name, email, password,  created_at) VALUES( ?, ?, ?, NOW())");
        $result = $this->conn->prepare($stmt)->execute([$name, $email, $password]);

        // check for successful store
        if ($result) {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            return $user;
        } else {
            return false;
        }
    }
    
      public function addevent($id, $event) {
        //$uuid = uniqid('', true);
        //$hash = $this->hashSSHA($password);
        //$encrypted_password = $hash["encrypted"]; // encrypted password
        //$salt = $hash["salt"]; // salt
		$sql = "UPDATE users SET event='$event' WHERE id=$id";
        
        //$stmt = $this->conn->prepare("INSERT INTO users( name, email, password,  created_at) VALUES( ?, ?, ?, NOW())");
        $result = $this->conn->prepare($sql)->execute();
        // check for successful store
      	return true;
    }

    /**
     * Get user by email and password
     */
    public function getUserByEmailAndPassword($email, $password) {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");

        $result = $stmt->execute([$email]);

        if ($result) {
            $user = $stmt->fetch();
            // verifying user password
            //$salt = $user['salt'];
            $db_password = $user['password'];
            //$hash = $this->checkhashSSHA($salt, $password);
            // check for password equality
            if ($password == $db_password) {
                // user authentication details are correct
                return $user;
            }
        } else {
            return NULL;
        }
    }

    /**
     * Check user is existed or not
     */
    public function isUserExisted($email) {
        $stmt = $this->conn->prepare("SELECT email from users WHERE email = ?");

        $result = $stmt->execute([$email]);
        $columns = $stmt->fetchColumn();
        if ($columns) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {

        $hash = base64_encode(sha1($password . $salt, true) . $salt);

        return $hash;
    }

}

?>
