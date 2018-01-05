<?php

class UsersModel {
    /**
     * Check database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all data from users
     */
    public function getAll()
    {
        $sql = "select * from users";
        $result = mysqli_query($this->db, $sql);
        $count = 1;
        while($array = mysqli_fetch_object($result)){
            $row->{$count} = $array;
            $count++;
        }
        return $row;
    }

    /**
     * Insert record in users table
     */
    public function addUser($first_name, $last_name, $email, $telephone)
    {
        // clean the input from javascript code for example
        $first_name = strip_tags($first_name);
        $last_name = strip_tags($last_name);
        $email = strip_tags($email);
        $telephone = strip_tags($telephone);

        $sql = "INSERT INTO users (first_name, last_name, email, telephone) VALUES ('".$first_name."','".$last_name."','".$email."','".$telephone."')";

        return mysqli_query($this->db, $sql);
    }

    /**
     * Delete record from users table
     */
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE id = ".$id;

        return mysqli_query($this->db, $sql);
    }

    /**
     * Where query for users table
     */
    public function whereUser($array)
    {
        $cond_string = '';
        foreach($array as $key => $value) {
          $cond_string .= $key.'= "'.$value.'"';
        }
        $sql = "SELECT * FROM users WHERE ".$cond_string;

        $result = mysqli_query($this->db, $sql);

        return mysqli_fetch_object($result);
    }
}
