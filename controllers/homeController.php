<?php
class homeController extends controller{

    public function __construct(){

        $u = new User();
        if($u->isLogged() == false)
        {          
            header("Location: ".BASE_URL."login");
        }
    }

    public function index(){

        $pedidoVenda = New PedidoVenda();

        $dados = array(
           'totalVendaDia' => $pedidoVenda->getTotalVendaDia(),
           'totalVendaMes' => $pedidoVenda->getTotalVendaMes(),
           'totalReceberDia' => $pedidoVenda->getTotalReceberDia(),
           'totalPagarDia' => $pedidoVenda->getTotalPagarDia(),
        );

        $this->loadTemplate('home', $dados);
    }

}