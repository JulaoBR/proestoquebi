<?php 
class loginController extends controller{
    
    public function index(){
        $dados = array();

        if (isset($_POST['email']) && !empty($_POST['email'])) 
        {

            $email = addslashes(isset($_POST['email']) ? $_POST['email'] : '');
            $pass = addslashes(isset($_POST['password']) ? $_POST['password'] : '');

            $u = new User();

            if($u->doLogin($email, $pass))
            {
                header("Location: ".BASE_URL);
                exit;
            }
            else
            {
                $dados['error'] = 'E-mail e/ou senha errados.';
            }
        }


        $this->loadView('login', $dados);
    }

}