<?php
ire_once('entity/user.php');
class UserManager
{
    private $_db;


    public function __construct($db){
        $this->setDb($db);
    }
    public function __destruct(){
        unset($this->$db);
    }
    public function setDb(PDO $db){
        $this->_db = $db;
        return $this;
    }
    public function add(User $user):bool
    {
        $query = $this->_db->prepare('');
        
    }
    public function delete(User $perso){
        
    }
    public function getOne(int $id){
        
    }
    public function update(User $perso){
        
    }
    public function getList(){
        
    }
}