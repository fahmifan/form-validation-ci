<?php
class UserModel extends CI_Model {

    /**
     * Check authentication
     */
    public function auth($email = "", $password = "") {
        if($email === "" || $password === "") {
            return false;
        }

        if($email === "test@email.com" && $password == "1234") {
            return true;
        }

        // if not match any data record
        return false;
    }
}