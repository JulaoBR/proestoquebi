<?php 
class PedidoVenda extends model{

    public function getTotalVendaDia(){
        $sql = "SELECT SUM(total) AS total FROM tpedido WHERE DAY(dt_pedido) = DAY(CURRENT_TIME) AND  MONTH(dt_pedido) = MONTH(CURRENT_TIME) AND YEAR(dt_pedido) = YEAR(CURRENT_TIME) AND dt_cancela = '0000-00-00'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            return $sql['total'];
        }
        else
        {
            return 0;
        }
    }

    public function getTotalVendaMes(){
        $sql = "SELECT SUM(total) AS total FROM tpedido WHERE MONTH(dt_pedido) = MONTH(CURRENT_TIME) AND YEAR(dt_pedido) = YEAR(CURRENT_TIME) AND dt_cancela = '0000-00-00'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            return $sql['total'];
        }
        else
        {
            return 0;
        }
    }

    public function getTotalReceberDia(){
        $sql = "SELECT SUM(vlr_av) AS total FROM tparcped WHERE DAY(dt_parc) = DAY(CURRENT_TIME) AND MONTH(dt_parc) = MONTH(CURRENT_TIME) AND YEAR(dt_parc) = YEAR(CURRENT_TIME)";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            return $sql['total'];
        }
        else
        {
            return 0;
        }
    }

    public function getTotalPagarDia(){
        $sql = "SELECT SUM(vlr_doc) AS total FROM tctrdoc WHERE DAY(dt_venc) = DAY(CURRENT_TIME) AND MONTH(dt_venc) = MONTH(CURRENT_TIME) AND YEAR(dt_venc) = YEAR(CURRENT_TIME) AND dt_pagto = '0000-00-00'";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0)
        {
            $sql = $sql->fetch();
            return $sql['total'];
        }
        else
        {
            return 0;
        }
    }

    public function getGraficoTotalMes(){

        $array = array();

        $sql = "SELECT SUM(total) AS total FROM tpedido WHERE YEAR(dt_pedido) = YEAR(CURRENT_TIME) AND dt_cancela = '0000-00-00' GROUP BY MONTH(dt_pedido) ORDER BY dt_pedido";
        $sql = $this->db->query($sql);

        if($sql->rowCount() > 0)
        {

            foreach ($sql as $row)
            {
                $array[] = $row['total'];
            }

            return $array;
        }
        else
        {
            return 0;
        }
    }

}