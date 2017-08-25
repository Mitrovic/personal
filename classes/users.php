<?php 
class Users {

    private $db;
    private $site_name = 'http://localhost/vezbe/quantox_login_system/';
    public function __construct($database) {
        $this->db = $database;
    }
    public function email_exists($email) {

        $query = $this->db->prepare("SELECT COUNT(id) FROM users WHERE email= ?");
        $query->bindValue(1, $email);

        try {

            $query->execute();
            $rows = $query->fetchColumn();

            if ($rows == 1) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function register($name, $password, $email){

        global $bcrypt; // making the $bcrypt variable global so we can use here
        $password   = $bcrypt->genHash($password);// generating a hash using the $bcrypt object
        $query      = $this->db->prepare("INSERT INTO users ( name,  password, email) VALUES (?, ?, ?) ");

        $query->bindValue(1, $name);
        $query->bindValue(2, $password);
        $query->bindValue(3, $email);

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }   
    }
    public function login($email, $password) {

        global $bcrypt;  // Again make the bcrypt variable global, which is defined in init.php, which is included in login.php where this function is called

        $query = $this->db->prepare("SELECT password, id FROM users WHERE email = ?");
        $query->bindValue(1, $email);

        try {

            $query->execute();
            $data = $query->fetch();
            $stored_password = $data['password']; // stored hashed password
            $id = $data['id'];

            if ($bcrypt->verify($password, $stored_password) === true) { // using the verify method to compare the password with the stored hashed password.
                return $id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    /*
     * // getting all the data about logged user.
     */
    public function userdata($id) {

        $query = $this->db->prepare("SELECT * FROM users WHERE id= ?");
        $query->bindValue(1, $id);

        try{

            $query->execute();

            return $query->fetch();

        } catch(PDOException $e){

            die($e->getMessage());
        }
    }
    /***
     * Creating the list of the registered users
     */
    public function get_users() {
        $query = $this->db->prepare("SELECT * FROM users ORDER BY name DESC");

        try{
            $query->execute();
        }catch(PDOException $e){
            die($e->getMessage());
        }
        return $query->fetchAll();
    }
    /*
     * Search results
     */
    public function search($search_term)
    {
        $stmt = $this->db->prepare("SELECT name,email FROM users WHERE name LIKE ? OR email LIKE ?  ORDER BY name DESC");

        // bind variable values
        $search_term = "%{$search_term}%";
        $stmt->bindParam(1, $search_term);
        $stmt->bindParam(2, $search_term);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt->fetchAll();
    }

}
