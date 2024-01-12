
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

   <!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- Small box 1 -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $jumlah_transaksi ?></h3>
                    <p><b> Laporan Transaksi</b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <a href="<?php echo base_url('laporan');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Small box 2 -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $jumlah_customer ?><sup style="font-size: 20px"></sup></h3>
                    <p><b>Customer</b></p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="<?php echo base_url('Customer');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Small box 3 -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $jumlah_karyawan ?></h3>
                    <p><b>Karyawan</b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <a href="<?php echo base_url('Karyawan');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <!-- Small box 4 -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $jumlah_category ?></h3>
                    <p><b>Categories</b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-folder"></i>
                </div>
                <a href="<?= base_url('Category');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <!-- Additional content with a welcome message using marquee -->
    <div class="row">
        <div class="col-lg-12">
            <div class="marquee-container">
                <h2 class="marquee-text">Welcome <?= $username ?> to Your Dashboard</h2>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<style>
    .marquee-container {
        width: 100%;
        overflow: hidden;
    }

    .marquee-text {
        white-space: nowrap;
        animation: marquee 15s linear infinite;
    }

    @keyframes marquee {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(-100%);
        }
    }
</style>
