<?php

    $grafTotalVenda = array();

    $p = new PedidoVenda();

    $grafTotalVenda = $p->getGraficoTotalMes();

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Total de vendas do dia -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total vendas do dia</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">R$ <?php echo number_format($totalVendaDia, 2,',', '.'); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- total de vendas do mes -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total vendas do mês</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">R$ <?php echo number_format($totalVendaMes, 2,',', '.'); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Total a receber do dia -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total a receber do dia</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">R$ <?php echo number_format($totalReceberDia, 2,',', '.'); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Total a pagar do dia -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total a pagar do dia</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">R$ <?php echo number_format($totalPagarDia, 2,',', '.'); ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Grafico total vendido mes -->
        <div class="col-xl-6 col-lg-6 ">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total vendas do ano</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="grafTotalVenda"></canvas>
                  </div>
                </div>
            </div>
        </div>

        <!-- Grafico # -->
        <div class="col-xl-6 col-lg-6 ">
            <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total #</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="grafTotalVenda"></canvas>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/Chart.min.js"></script>
<script>
    var ctx = document.getElementById("grafTotalVenda").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: 'Total Vendas Mês',
                backgroundColor: '#FF0000',
                borderColor: '#FF0000',
                data: [
                    <?php echo implode(',', $grafTotalVenda); ?>
                ],
                fill: false,
                borderWidth: 3
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
</script>