      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Pelanggan</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                    $itungpelanggan = mysqli_query($conn,"SELECT COUNT(idpelanggan) as jumlahpelanggan FROM pelanggan");
                    $cekrow1 = mysqli_num_rows($itungpelanggan);
                    $itungpelanggan1 = mysqli_fetch_assoc($itungpelanggan);
                    $itungpelanggan2 = $itungpelanggan1['jumlahpelanggan'];
                    if($cekrow1 > 0){
                        echo  $itungpelanggan2;
                        } 
                        ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Product Terjual</h4>
                  </div>
                  <div class="card-body">
                    <?php $itungpeterjual = mysqli_query($conn,"SELECT SUM(quantity) as jumlahterjual FROM nota");
                    $cekrow = mysqli_num_rows($itungpeterjual);
                    $itungpeterjual1 = mysqli_fetch_assoc($itungpeterjual);
                    $itungpeterjual2 = $itungpeterjual1['jumlahterjual'];
                    if($cekrow > 0){
                        echo $itungpeterjual2;
                        } 
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fa fa-dollar-sign text-light"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Hasil yang didapat</h4>
                  </div>
                  <h6 class="card-body">
                    <h6 class="text-small"></h6>
                    <p class="font-weight-bold">
                    Rp.<?php 
                    $data_produk=mysqli_query($conn,"SELECT * FROM nota t, produk p
                    WHERE p.idproduk=t.idproduk ORDER BY idnota ASC");
                    $subtotaldiskon = 0;
                    $x = mysqli_num_rows($data_produk);
                    if($x>0){
                    while($b=mysqli_fetch_array($data_produk)){
                        $totalharga += $b['harga_jual'] * $b['quantity'];
                        $totaldiskon += $b['harga_modal'] * $b['quantity'];
                        $subtotaldiskon = $totalharga - $totaldiskon;
                          }
                      } 
                      echo ribuan($subtotaldiskon)?></p>
                  </h6>
                </div>
              </div> 
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Penjualan</h4>
                  </div>
                  <h6 class="card-body">
                    <h6 class="text-small"></h6>
                    <p class="font-weight-bold">
                    Rp.<?php 
                    $itungtotal = mysqli_query($conn,"SELECT SUM(totalbeli) as jumlahtotal FROM laporan");
                    $cekrow3 = mysqli_num_rows($itungtotal);
                    $itungtotal1 = mysqli_fetch_assoc($itungtotal);
                    $itungtotal2 = $itungtotal1['jumlahtotal'];
                    if($cekrow3 > 0){
                        echo ribuan($itungtotal2);
                        } ?></p>
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="mx-auto"> Data Pembelian dari Pelanggan</h4>
                    <button class="btn btn-info" id="downloadButton" onclick="downloadPDF()">PDF</button>
                  </div>
                  <div class="card-body">
                    <div class="col-lg-10 mx-auto align-items-center">
                        <canvas id="myBarChart" height="60" width="100"></canvas>
                    </div>
                    <p class="text-small font-weight-bold" style="margin-left: 20rem;">(#Data yang di tampilkan dalam bentuk rupiah#)</p>
                  </div>
                </div>
            </div>
          </div>
      </section>
    </div>

<?php
$hitungtotal = mysqli_query($conn,"SELECT * FROM laporan l, pelanggan e
                                    WHERE  e.idpelanggan=l.idpelanggan ORDER BY idlaporan ASC"); 
$pelanggan = array();
$total = array();
while ($data = mysqli_fetch_array($hitungtotal)) {
  $pelanggan[] = $data['nama_pelanggan'];
  $total[] = $data['totalbeli'];
}
?>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ctx = document.getElementById("myBarChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($pelanggan) ?>,
                datasets: [{
                    label: 'Rupiah',
                    data: <?= json_encode($total) ?>,
                    borderWidth: 2,
                    backgroundColor: '#6777ef',
                    borderColor: '#6777ef',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: true,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: 50000,
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
        
      });
        function downloadPDF() {
            var canvas = document.getElementById("myBarChart");
            var imgData = canvas.toDataURL('image/JPG',1.0);
            
            var pdf = new jsPDF();
            pdf.setFontSize(18); 
            pdf.text('Data Pembelian Pelanggan', 20, 10);
            pdf.addImage(imgData, 'JPG', 15, 15, 180, 105);
            pdf.save('chart.pdf');
        }

        document.getElementById('downloadButton').addEventListener('click', downloadPDF);
</script>