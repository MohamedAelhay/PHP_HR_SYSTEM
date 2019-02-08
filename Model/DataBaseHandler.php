<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 31/01/19
 * Time: 20:35
 */

class DataBaseHandler
{
    protected $_Table;
    protected $_DataBase;

    //Methods 1- insert 2- update 3- delete 4-read

    function __construct($tableName)
    {
        $this->_Table = $tableName;
        $this->connect();
    }

    function connect()
    {
        $link = MYSQLI_CONNECT(__HOST__,__USER__, __PASS__, __DB__);
        if($link){
            $this->_DataBase = $link;
        }else{
            return false;
        }
    }

    function set_New_User($fName, $lName, $job, $email, $passWord, $image, $cv)
    {
        $sql_Statement = "INSERT INTO $this->_Table (fName, lName, job, email, password, image, cv) VALUES ($fName, $lName, $job, $email, $passWord, $image, $cv)";
        $dataIntoDB = MYSQLI_QUERY($this->_DataBase, $sql_Statement);
        if($dataIntoDB){
            echo "success insert";
        }else{
            echo "Error insert";
        }
    }

    function update_User_By_Id($id, $fName, $lName, $job, $email, $passWord, $image, $cv)
    {
        $sql_Statement = "UPDATE $this->_Table SET fName= $fName, lName=$lName, job=$job, email=$email, password=$passWord, image=$image, cv=$cv WHERE id=$id";
        $updateDataInDB = MYSQLI_QUERY($this->_DataBase, $sql_Statement);
        if($updateDataInDB){
            echo "success update";
        }else{
            echo "Error update";
        }
    }

    function delete_User_By_Id($id)
    {
        $sql_Statement = "DELETE FROM $this->_Table WHERE id=$id";
        $deleteDataFromDB = MYSQLI_QUERY($this->_DataBase, $sql_Statement);
        if($deleteDataFromDB){
            echo "success Delete";
        }else{
            echo "Error Delete";
        }
    }

    function get_Data_By_Id($id)
    {
        $sql_Statement = "SELECT * FROM $this->_Table WHERE id = $id";
        $dataById = MYSQLI_QUERY($this->_DataBase, $sql_Statement);
        if($dataById){
            $da = MYSQLI_FETCH_ASSOC($dataById);
            return $da;
        }else{
            echo "Error Get";
        }
    }

    function get_Data_By_Email($email)
    {
        $sql_Statement = "SELECT * FROM $this->_Table WHERE email = '$email'";
        $dataById = MYSQLI_QUERY($this->_DataBase, $sql_Statement);
        if($dataById){
            $da = MYSQLI_FETCH_ASSOC($dataById);
            return $da;
        }else{
            echo "Error Get";
        }
    }

    function disconnect()
    {
        if($this->_DataBase){
            MYSQLI_CLOSE($this->_DataBase);
            echo "data base Closed";
        }
    }
}