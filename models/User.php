<?php
class User extends model{
    
    public function isLogged(){

        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser']))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function doLogin($email, $pass){

        $sql = $this->db->prepare("SELECT email, senhabi FROM tcadusu WHERE email = :email AND senhabi = :pass");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':pass', md5($pass));
        $sql->execute();

        if($sql->rowCount() > 0)
        {
            $row = $sql->fetch();

            $_SESSION['ccUser'] = $email;

            return true;
        }
        else
        {
            return false;
        }
    }

}