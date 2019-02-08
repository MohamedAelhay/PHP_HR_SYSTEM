<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 02/02/19
 * Time: 17:56
 */

class UserEntry
{
    protected $_DataBaseObj;
    protected $_userData;
    protected $_errors;
    function __construct($db)
    {
        $this->_DataBaseObj = $db;
        $this->_errors = array();
    }

    function login($email, $passWord){
        $this->_userData = $this->_DataBaseObj->get_Data_By_Email($email);
        if($this->_userData){
//            $this->validEmail($email);
            $this->validPass($passWord);}
        else {
            $this->_errors[] = "Not Valid E-mail";
        }
        if(!$this->_errors)
            $this->isAdmin();
            $this->assignSession();

        return $this->_errors;
    }

//    function validEmail($email){
//        if($this->_userData["email"] == $email)
//            $_SESSION["user_email"] = $this->_userData["email"];
//        else
//            $this->_errors[] = "E-mail required";
//    }

    function validPass($passWord){
        if($this->_userData["password"] !== $passWord)
            $this->_errors[] = "incorrect password";
        elseif(empty($passWord))
            $this->_errors[] = "password required";
    }

    function isAdmin(){
        if($this->_userData["id"] == 1)
            $_SESSION["is_admin"] = true;
        else
            $_SESSION["is_admin"] = false;
    }

    function assignSession(){
        $_SESSION["user_id"] = $this->_userData["id"];
        $_SESSION["user_cv"] = $this->_userData["cv"];
        $_SESSION["user_job"] = $this->_userData["job"];
        $_SESSION["user_email"] = $this->_userData["email"];
        $_SESSION["user_fName"] = $this->_userData["fName"];
        $_SESSION["user_lName"] = $this->_userData["lName"];
        $_SESSION["user_image"] = $this->_userData["image"];
    }

    function signUp(){

    }
}