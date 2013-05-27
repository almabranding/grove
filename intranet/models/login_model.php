<?php

class Login_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        $sth = $this->db->prepare("SELECT * FROM intra_users WHERE 
                username = :username AND password = :password");
        $sth->execute(array(
            ':username' => $_POST['login'],
            ':password' => Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY)
        ));
        $data = $sth->fetch();
        $count =  $sth->rowCount();
        if ($count > 0) {
            // login
            echo 2;
            Session::init();
            Session::set('role', $data['role']);
            Session::set('loggedIn', true);
            Session::set('userid', $data['userid']);
            header('location: '.URL.LANG.'/page');
        } else {
            header('location: '.URL.LANG.'/page');
        }
        
    }
    
}