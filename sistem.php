<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Struck Gaji</title>
</head>
<body>
<center>
    

    <?php
    
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama'];
        $no = $_POST['no'];
        $unitpendidikan = $_POST['pendidikan'];
        $tglgaji = $_POST['tgl'];
        $jabatan = $_POST['jabatan'];
        $bpjs = $_POST['bpjs'];
        $tabungan = $_POST['tabungan'];
        $pinjaman = $_POST['pinjaman'];
        $lainnya = $_POST['lainnya'];
        $status = $_POST['status'];
        $lama = $_POST['lama'];

 
        ?>

        <div class="mt-5"><br><br></div>
        <div class="card col-4 mt-5 text-primary border border-primary">
        <h5 class="card-header text-dark fw-bold "><center><?php echo $nama;?></center></h5>
        <div class="card-body">
        <center><h3>STRUCK</h3></center>
        <table>

        <?php

        class penggajihan{
        public function datadiri($no,$nama,$unit,$tanggal,$jabatan){

        echo"
           <tr>
           <td>No</td>
           <td>:</td>
           <td>$no</td>
           </tr>
           <tr>
           <td>Nama</td>
           <td>:</td>
           <td>$nama</td>
           </tr>
           <tr>
           <td>Unit</td>
           <td>:</td>
           <td>$unit</td>
           </tr>
           <tr>
           <td>Tanggal Gaji</td>
           <td>:</td>
           <td>$tanggal</td>
           </tr>
           <tr>
           <td>Jabatan</td>
           <td>:</td>
           <td>$jabatan</td>
           </tr>";
        }

        public function gaji(){

            $jabatan = $_POST['jabatan'];

            if ($jabatan == "Kepala Sekolah") {
                $gaji = 10000000;
                echo "
                <tr>
                <td>Gaji</td>
                <td>:</td>
                <td> Rp. " . number_format($gaji). "</td>
                </tr>";
            } elseif ($jabatan == "Wakasek") {
                $gaji = 7000000;
                echo "
                <tr>
                <td>Gaji</td>
                <td>:</td>
                <td> Rp. " . number_format($gaji). "</td>
                </tr>";
            } elseif ($jabatan == "Guru") {
               $gaji = 5000000;
               echo "
               <tr>
               <td>Gaji</td>
               <td>:</td>
               <td> Rp. " . number_format($gaji). "</td>
               </tr>";
            } elseif ($jabatan == "Karyawan") {
               $gaji = 2500000;
               echo "
               <tr>
               <td>Gaji</td>
               <td>:</td>
               <td> Rp. " . number_format($gaji). "</td>
               </tr>";
            } else {
                echo "
                <tr>
                <td>Gaji</td>
                <td>:</td>
                <td>0</td>
                </tr>";
                $gaji = 0;
            }


        }
        

        public function lamadanstatus($lama,$status){
           echo " <tr>
            <td>Lama Kerja</td>
            <td>:</td>
            <td>$lama</td>
            </tr>
             <tr>
            <td>Status Kerja</td>
            <td>:</td>
            <td>$status</td>
            </tr>";
        }

        public function total($bpjs,$pinjaman,$lainnya){

        $lama = $_POST['lama'];

        if ($lama >= 5) {
            $bonus = 1000000;
            echo "
            <tr>
            <td>Bonus</td>
            <td>:</td>
            <td> Rp. " . number_format($bonus). "</td>
            </tr>";

        } else {
            $bonus = 0;
            echo "
            <tr>
            <td>Bonus</td>
            <td>:</td>
            <td> Rp. " . number_format($bonus). "</td>
            </tr>";
        }


        echo "
        <tr>
        <td>Bpjs</td>
        <td>:</td>
        <td> Rp. " . number_format($bpjs). "</td>
        </tr> 
        <tr>
        <td>Pinjaman</td>
        <td>:</td>
        <td> Rp. " . number_format($pinjaman). "</td>
        </tr>
         <tr>
        <td>Infaq</td>
        <td>:</td>
        <td> Rp. " . number_format($lainnya). "</td>
        </tr>";


            $jabatan = $_POST['jabatan'];

            if ($jabatan == "Kepala Sekolah") {
                $gaji = 10000000;
            } elseif ($jabatan == "Wakasek") {
                $gaji = 7000000;
            } elseif ($jabatan == "Guru") {
               $gaji = 5000000;
            } elseif ($jabatan == "Karyawan") {
               $gaji = 2500000;
            } else {
                $gaji = 0;
            }

        $cicilan = $_POST['tabungan'];
        $gaji1 = $gaji + $bonus;
        $potongan = $bpjs + $cicilan + $pinjaman + $lainnya;
        $gajibersih = $gaji1 - $potongan;

        echo "
                <tr>
                <td>Gaji Bersih</td>
                <td>:</td>
                <td> Rp ." . number_format($gajibersih) . "</td>
                </tr>";




        }

    


    }
        


    $cetak = new  penggajihan();
    $cetak->datadiri($no, $nama,$unitpendidikan,$tglgaji,$jabatan);
    $cetak->gaji();
    $cetak->lamadanstatus($lama,$status);
    $cetak->total($bpjs,$pinjaman,$lainnya);
    }

    ?>
      </table>
  </div>
</div>


<!-- Optional JavaScript; choose one of the two! -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
