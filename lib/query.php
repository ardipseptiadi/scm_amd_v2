<?php
require(dirname(dirname(__FILE__)).'/config/koneksi.php');

function getAllKaryawan()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                id_karyawan,
                nip,
                nama_karyawan,
                kontak,
                jabatan,
                email,
                status
              FROM t_karyawan
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllAgen()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                id_agen,
                nama_agen,
                alamat_agen,
                kontak,
                email,
                status
              FROM t_agen
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllKendaraan()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                no_polisi,
                jenis_kendaraan,
                kendaraan,
                kapasitas,
                status
              FROM t_kendaraan
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllSupplier()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                id_supplier,
                nama_supplier,
                alamat_supplier,
                kontak,
                email,
                status
              FROM t_supplier
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllProduk()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                kode_produk,
                jenis,
                harga,
                is_deleted
              FROM t_produk
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function insertPengiriman($no_kirim,$tgl,$id_pesanan)
{
  $conn_open = open_conn();
  $tgl_pesan = date('Y-m-d',strtotime($tgl));
  if($conn_open){
    $query = "INSERT INTO t_pengiriman (no_pengiriman,tgl_kirim,id_pesanan) VALUES ('{$no_kirim}','{$tgl_pesan}','{$id_pesanan}')";
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      free_close_db($result,$conn_open);
      return true;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function getPengiriman()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                kr.id_kirim,
                kr.no_pengiriman,
                kr.tgl_kirim,
                kr.no_polisi,
                psn.no_pesanan,
                kr.status_kirim,
                skr.keterangan as keterangan_kirim,
                prod.jenis as nama_produk
              FROM t_pengiriman kr
              LEFT JOIN t_pesanan psn ON kr.id_pesanan = psn.id_pesanan
              LEFT JOIN t_pesanan_detail psd ON psn.id_detail_pesanan = psd.id_detail
              LEFT JOIN t_status_kirim skr ON kr.status_kirim = skr.id_status_kirim
              LEFT JOIN t_produk prod ON psd.kd_produk = prod.kode_produk
              WHERE psn.is_verifikasi>0
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getListTunggu()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT ppd.no_polisi FROM t_proses_pengiriman_detail ppd
              LEFT JOIN t_proses_pengiriman pp ON ppd.id_proses = pp.id_proses
              WHERE pp.status_proses = 0
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getListTersedia()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT t1.no_polisi,kdr.jenis_kendaraan,kdr.kapasitas
              FROM
              (SELECT no_polisi FROM t_kendaraan
                  UNION ALL
                  SELECT ppd.no_polisi FROM t_proses_pengiriman_detail ppd
                  LEFT JOIN t_proses_pengiriman pp ON ppd.id_proses = pp.id_proses
                  WHERE pp.status_proses < 3 OR pp.is_deleted = 1)
              AS t1
              INNER JOIN t_kendaraan kdr ON t1.no_polisi = kdr.no_polisi
              GROUP BY t1.no_polisi HAVING COUNT(*)<2
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getSupplierByMaterial($id)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "SELECT id_supplier,nama_supplier
              FROM t_supplier
              WHERE id_supplier IN (SELECT id_supplier FROM t_material WHERE id_material = {$id})
              LIMIT 1
              ";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getMaterialSafety($id,$bln,$thn)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "
            SELECT ms.jumlah,m.sisa
            FROM t_material_safety ms
            LEFT JOIN t_material m ON ms.id_material = m.id_material
            WHERE ms.id_material = {$id}
            AND ms.bulan = {$bln}
            AND ms.tahun = {$thn}
            ";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getPeramalanByProduk($kd,$date)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "SELECT hasil FROM t_peramalan WHERE peramalan = '{$date}' AND kode_produk = '{$kd}' ORDER BY id_peramalan DESC LIMIT 1
              ";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getLastPengadaan($kd)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "SELECT no_pengadaan
              FROM t_pengadaan
              WHERE kd_produk = '{$kd}'
              AND no_pengadaan IS NOT NULL
              ORDER BY created_at DESC LIMIT 1";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getLastPesanan()
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "SELECT no_pesanan
              FROM t_pesanan
              WHERE no_pesanan IS NOT NULL
              ORDER BY created_at DESC LIMIT 1";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data['no_pesanan'];
  }else{
    return false;
  }
}

function getLastPengiriman()
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "SELECT no_pengiriman
              FROM t_pengiriman
              WHERE no_pengiriman IS NOT NULL
              ORDER BY id_kirim DESC LIMIT 1";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data['no_pengiriman'];
  }else{
    return false;
  }
}

function getNameProduk($kd)
{
    $conn_open = open_conn();
    if($conn_open){
      $query = "SELECT jenis
                FROM t_produk
                WHERE kode_produk = '{$kd}'";
      $result = mysqli_query($conn_open,$query);
      $array_data = mysqli_fetch_assoc($result);
      free_close_db($result,$conn_open);
      return $array_data['jenis'];
    }else{
      return false;
    }
}

function getHargaProduk($kd)
{
    $conn_open = open_conn();
    if($conn_open){
      $query = "SELECT harga
                FROM t_produk
                WHERE kode_produk = '{$kd}'";
      $result = mysqli_query($conn_open,$query);
      $array_data = mysqli_fetch_assoc($result);
      free_close_db($result,$conn_open);
      return $array_data['harga'];
    }else{
      return false;
    }
}

function updateProduk($kode,$nama,$harga)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "UPDATE t_produk
              SET jenis = '{$nama}', harga = '{$harga}'
              WHERE kode_produk = '{$kode}'
            ";
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      free_close_db($result,$conn_open);
      return true;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function insertPengadaan($no_pengadaan,$kd,$jml,$total_harga)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              INSERT INTO t_pengadaan (no_pengadaan,tgl_pengadaan,kd_produk,jumlah,total_harga,created_at)
              VALUES('$no_pengadaan',NOW(),'$kd','$jml','$total_harga',NOW())
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      $id = mysqli_insert_id($conn_open);
      free_close_db($result,$conn_open);
      return $id;
    }
  }else{
    return false;
  }
}

function insertDetailPengadaan($detail)
{
  $conn_open = open_conn();
  $no_pengadaan = $detail['no_pengadaan'];
  $id_material = $detail['id_material'];
  $id_supplier = $detail['id_supplier'];
  $id_pengadaan = $detail['id_pengadaan'];
  $qty = $detail['qty'];
  $harga_pengadaan = $qty * $detail['harga'];
  if($conn_open){
    $result = mysqli_query($conn_open,"
              INSERT INTO t_pengadaan_detail (no_pengadaan,id_material,id_supplier,qty_pengadaan,id_pengadaan,harga_pengadaan,created_at)
              VALUES('$no_pengadaan','$id_material','$id_supplier','$qty','$id_pengadaan',$harga_pengadaan,NOW())
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      $id = mysqli_insert_id($conn_open);
      free_close_db($result,$conn_open);
      return $id;
    }
  }else{
    return false;
  }
}

function insertProsesPengiriman()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              INSERT INTO t_proses_pengiriman (status_proses,created_at)
              VALUES(0,NOW())
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      $id = mysqli_insert_id($conn_open);
      free_close_db($result,$conn_open);
      return $id;
    }
  }else{
    return false;
  }
}

function insertDetailProsesPengiriman($id_proses,$no,$id_kirim)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              INSERT INTO t_proses_pengiriman_detail (id_proses,no_polisi,id_kirim,created_at)
              VALUES('{$id_proses}','{$no}',{$id_kirim},NOW())
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      $id = mysqli_insert_id($conn_open);
      free_close_db($result,$conn_open);
      return $id;
    }
  }else{
    return false;
  }
}

function insertPesanan($data)
{
  $conn_open = open_conn();
  $id_detail = $data['id_detail'];
  $no_psn = $data['no_pesanan'];
  $id_agen = $data['id_agen'];
  $tgl_pesan = date('Y-m-d',strtotime($data['tgl_pesan']));
  if($conn_open){
    $result = mysqli_query($conn_open,"
              INSERT INTO t_pesanan (id_detail_pesanan,no_pesanan,tgl_pesan,id_agen,created_at)
              VALUES('$id_detail','$no_psn','$tgl_pesan','$id_agen',NOW())
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      $id = mysqli_insert_id($conn_open);
      free_close_db($result,$conn_open);
      return $id;
    }
  }else{
    return false;
  }
}

function insertDetailPesanan($data)
{
  $conn_open = open_conn();
  $kd_produk = $data['kd_produk'];
  $qty = $data['qty'];
  $harga = $data['harga'];
  if($conn_open){
    $result = mysqli_query($conn_open,"
              INSERT INTO t_pesanan_detail (kd_produk,qty_pesanan,harga_jual,created_at)
              VALUES('$kd_produk','$qty','$harga',NOW())
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      $id = mysqli_insert_id($conn_open);
      free_close_db($result,$conn_open);
      return $id;
    }
  }else{
    return false;
  }
}

function getPersediaan()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                nama_material,
                sisa,
                safety_stock,
                status
              FROM t_material
              ORDER BY nama_material
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllMaterial()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                mat.id_material,
                mat.nama_material,
                mat.kd_produk,
                prod.jenis,
                mat.harga
              FROM
                t_material mat
              LEFT JOIN t_produk prod ON mat.kd_produk = prod.kode_produk
              ORDER BY nama_material
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllMaterialByProduk($kode)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                id_material,
                nama_material,
                harga
              FROM
                t_material
              WHERE
                kd_produk = '{$kode}'
              ORDER BY nama_material
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function tambahPersediaan($jml,$id)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              UPDATE
                t_material
              SET sisa = sisa + '$jml'
              WHERE id_material = '$id'
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      free_close_db($result,$conn_open);
      return true;
    }
  }else{
    return false;
  }
}

function kurangPersediaan($jml,$id)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              UPDATE
                t_material
              SET sisa = sisa - '$jml'
              WHERE id_material = '$id'
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      free_close_db($result,$conn_open);
      return true;
    }
  }else{
    return false;
  }
}

function updateRiwayat($jml,$id)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              INSERT INTO t_riwayat_persediaan (id_material,jumlah,tgl_riwayat,created_at)
              VALUES('$id','$jml',NOW(),NOW())
            ");
    if(!$result){
      free_close_db($result,$conn_open);
      return false;
    }else{
      free_close_db($result,$conn_open);
      return true;
    }
  }else{
    return false;
  }
}

function updateSafety($bln,$thn)
{
  $conn_open = open_conn();
  if($conn_open)
  {
    $query1 = mysqli_query($conn_open,"
              SELECT *
              FROM t_material_safety
              WHERE bulan = '$bln' AND tahun = '$thn'
            ");
    if(!is_null(mysqli_fetch_array($query1))){
      $bln_sebelumnya = $bln-1;
      $query2 = mysqli_query($conn_open,"
                SELECT mt.id_material,jm.total
                FROM t_material mt
                LEFT JOIN
                  ( SELECT id_material,sum(jumlah) as total
                    FROM t_riwayat_persediaan
                    WHERE MONTH(tgl_riwayat) = '$bln_sebelumnya' AND YEAR(tgl_riwayat) = '$thn' AND jumlah<0
                    GROUP BY id_material)
                  jm
                  ON mt.id_material = jm.id_material
              ");
      $array_material = mysqli_fetch_all($query2,MYSQLI_ASSOC);
      foreach($array_material as $material)
      {
        $jumlah = $material['total']*-1*3;
        $id_material = $material['id_material'];
        $que = mysqli_query($conn_open,"
              UPDATE t_material_safety
              SET jumlah = '$jumlah'
              WHERE id_material = '$id_material' AND bulan = '$bln' AND tahun ='$thn'
        ");
      }
      return true;
    }else{
      $bln_sebelumnya = $bln-1;
      $query2 = mysqli_query($conn_open,"
                SELECT mt.id_material,jm.total
                FROM t_material mt
                LEFT JOIN
                  ( SELECT id_material,sum(jumlah) as total
                    FROM t_riwayat_persediaan
                    WHERE MONTH(tgl_riwayat) = '$bln_sebelumnya' AND YEAR(tgl_riwayat) = '$thn' AND jumlah<0
                    GROUP BY id_material)
                  jm
                  ON mt.id_material = jm.id_material
              ");
      $array_material = mysqli_fetch_all($query2,MYSQLI_ASSOC);
      foreach($array_material as $material)
      {
        $jumlah = $material['total']*-1*3;
        $id_material = $material['id_material'];
        $que = mysqli_query($conn_open,"
              INSERT INTO t_material_safety (id_material,jumlah,bulan,tahun)
              VALUES ('$id_material','$jumlah','$bln','$thn')
        ");
      }
      return true;
    }
    mysqli_free_result($query1);
    mysqli_free_result($query2);
    mysqli_free_result($que);
    mysqli_close($conn_open);
  }else{
    return false;
  }
}

function dataSafety($bln,$thn)
{
  $conn_open = open_conn();
  if($conn_open){
      $result = mysqli_query($conn_open,"
                SELECT
                  mt.id_material,
                  mt.nama_material,
                  mt.sisa,
                  ROUND((ms.jumlah/30),2) as safety_per_30,
                  IF(mt.sisa<(select safety_per_30),0,1) AS status_tersedia
                FROM
                  t_material mt
                LEFT JOIN
                  (SELECT id_material,jumlah FROM t_material_safety WHERE bulan = '$bln' AND tahun = '$thn') ms
                  ON mt.id_material = ms.id_material
                ORDER BY mt.nama_material
              ");
      $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
      free_close_db($result,$conn_open);
      return $array_data;
  }else{
    return false;
  }
}

function getAllPeramalan(){
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                prm.peramalan,
                prm.hasil,
                prm.kode_produk
              FROM
                t_peramalan prm
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllPengadaan()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                pgd.id_pengadaan,
                pgd.no_pengadaan,
                pgd.tgl_pengadaan,
                prd.jenis,
                pgd.is_verifikasi,
                pgd.total_harga
              FROM t_pengadaan pgd
              INNER JOIN t_produk prd ON pgd.kd_produk = prd.kode_produk
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getAllPesanan()
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                psn.id_pesanan,
                psn.id_detail_pesanan,
                psn.id_agen,
                psn.no_pesanan,
                psn.tgl_pesan,
                psn.is_verifikasi,
                psn.status,
                psd.kd_produk,
                prod.jenis as nama_produk,
                psd.qty_pesanan,
                psd.harga_jual,
                (psd.qty_pesanan * psd.harga_jual) AS tot_harga
              FROM t_pesanan psn
              LEFT JOIN t_pesanan_detail psd ON psn.id_detail_pesanan = psd.id_detail
              LEFT JOIN t_produk prod ON psd.kd_produk = prod.kode_produk
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getPesananDetailByID($id_detail)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                psd.kd_produk,
                psd.qty_pesanan,
                psd.harga_jual,
                prod.jenis as produk
              FROM t_pesanan_detail psd
              LEFT JOIN t_produk prod ON psd.kd_produk = prod.kode_produk
              WHERE psd.id_detail = '{$id_detail}'
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getPengadaanDetailByID($id)
{
  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                pgd.no_pengadaan,
                pgd.qty_pengadaan,
                mt.nama_material,
                sp.nama_supplier,
                pgd.harga_pengadaan
              FROM t_pengadaan_detail pgd
              LEFT JOIN
                t_material mt ON pgd.id_material = mt.id_material
              LEFT JOIN
                t_supplier sp ON pgd.id_supplier = sp.id_supplier
              WHERE
                id_pengadaan = '{$id}'
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function verifikasiPengadaan($id)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "UPDATE t_pengadaan
              SET is_verifikasi = 1
              WHERE id_pengadaan = {$id}
            ";
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      free_close_db($result,$conn_open);
      return true;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function batalVerifikasiPengadaan($id)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "UPDATE t_pengadaan
              SET is_verifikasi = 0
              WHERE id_pengadaan = {$id}
            ";
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      free_close_db($result,$conn_open);
      return true;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function verifikasiPesanan($id)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "UPDATE t_pesanan
              SET is_verifikasi = 1
              WHERE id_pesanan = {$id}
            ";
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      free_close_db($result,$conn_open);
      $stat_kirim = updateStatusPengiriman(1,$id,null);
      return $stat_kirim;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function batalVerifikasiPesanan($id)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "UPDATE t_pesanan
              SET is_verifikasi = 0
              WHERE id_pesanan = {$id}
            ";
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      $stat_kirim = updateStatusPengiriman(0,$id,null);
      return $stat_kirim;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function updateStatusPengiriman($status,$id_pesanan = null,$id_kirim = null)
{
  $conn_open = open_conn();
  if(!is_null($id_pesanan)){
    $kondisi = " id_pesanan = {$id_pesanan}";
  }else if(!is_null($id_kirim)){
    $kondisi = " id_kirim = {$id_kirim}";
  }
  if($conn_open){
    $query = "UPDATE t_pengiriman
              SET status_kirim = {$status}
              WHERE
            ";
    $query.=$kondisi;
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      free_close_db($result,$conn_open);
      return true;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function updateProsesPengiriman($status,$id_kirim)
{
  $id_proses = getIdProsesPengirim($id_kirim);
  if($id_proses){
    $conn_open = open_conn();
    if($conn_open){
      $query = "UPDATE t_proses_pengiriman
                SET status_proses = {$status}
                WHERE id_proses = {$id_proses}";
      $result = mysqli_query($conn_open,$query);
      if(mysqli_affected_rows($conn_open)>0){
        free_close_db($result,$conn_open);
        return true;
      }else{
        free_close_db($result,$conn_open);
        return false;
      }
    }else{
      return false;
    }
  }else{
    return false;
  }
}

function getIdProsesPengirim($id){
  $conn_open = open_conn();
  if($conn_open){
    $query = "SELECT id_proses FROM t_proses_pengiriman_detail
              WHERE id_kirim = {$id}
              ";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data['id_proses'];
  }else{
    return false;
  }
}

function updateNoPolisiPengiriman($no,$id_kirim)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "UPDATE t_pengiriman
              SET no_polisi = '{$no}'
              WHERE id_kirim = {$id_kirim}
            ";
    $result = mysqli_query($conn_open,$query);
    if(mysqli_affected_rows($conn_open)>0){
      free_close_db($result,$conn_open);
      return true;
    }else{
      free_close_db($result,$conn_open);
      return false;
    }
  }else{
    return false;
  }
}

function getLastPeramalan($kodeproduk)
{
  $conn_open = open_conn();
  if($conn_open){
    $query  = "SELECT hasil FROM t_peramalan WHERE kode_produk = '".$kodeproduk."' ORDER BY id_peramalan DESC LIMIT 1";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data['hasil'];
  }else{
    return false;
  }
}

function getDataPesananBulan($date,$kodeproduk)
{
  $start = $date.'-01';
  $end = $date.'-31';
  $conn_open = open_conn();
  if($conn_open){
    $query = "
            SELECT SUM(psd.qty_pesanan) AS sum_pesanan
            FROM t_pesanan psn
            LEFT JOIN t_pesanan_detail psd ON psn.id_detail_pesanan = psd.id_detail
            WHERE psn.tgl_pesan BETWEEN '".$start."' AND '".$end."'
            AND psd.kd_produk = '{$kodeproduk}'
              ";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_assoc($result);
    free_close_db($result,$conn_open);
    return $array_data['sum_pesanan'];
  }else{
    return false;
  }
}

function insertPeramalan($bln,$jumlah,$kode)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "INSERT INTO t_peramalan (peramalan,hasil,kode_produk) VALUES ('".$bln."','".$jumlah."','".$kode."')";
    $result = mysqli_query($conn_open,$query);
    free_close_db($result,$conn_open);
    return true;
  }else{
    return false;
  }
}

function insertProduk($kode,$nama,$harga)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "INSERT INTO t_produk (kode_produk,jenis,harga) VALUES ('".$kode."','".$nama."','".$harga."')";
    $result = mysqli_query($conn_open,$query);
    free_close_db($result,$conn_open);
    return true;
  }else{
    return false;
  }
}

function insertMaterial($nama,$harga,$init,$supplier,$produk)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "INSERT INTO t_material (nama_material,harga,sisa,id_supplier,kd_produk)
              VALUES ('{$nama}','{$harga}','{$init}','{$supplier}','{$produk}')";
    $result = mysqli_query($conn_open,$query);
    free_close_db($result,$conn_open);
    return true;
  }else{
    return false;
  }
}

function cekLogin($nip,$pass)
{
  $nip = trim($nip);
  $pass = trim($pass);

  $conn_open = open_conn();
  if($conn_open){
    $result = mysqli_query($conn_open,"
              SELECT
                nip
              FROM t_karyawan
              WHERE
                nip = '".mysqli_real_escape_string($conn_open,$nip)."'
                AND
                password = '".mysqli_real_escape_string($conn_open,$pass)."'
            ");
    if(mysqli_num_rows($result) == 1){
      return true;
    }else{
      return false;
    }
  }
}

function getLoginData($nip,$pass)
{
  $conn_open = open_conn();
  if($conn_open){
    $stmt = mysqli_prepare($conn_open,"
            SELECT
              id_karyawan,
              nip,
              nama_karyawan,
              kontak,
              jabatan,
              email,
              status
            FROM t_karyawan
            WHERE
              nip = ?
              AND
              password = ?
          ");
    mysqli_stmt_bind_param($stmt, 'is', $nip, $pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,
              $array_data['id_karyawan'],
              $array_data['nip'],
              $array_data['nama_karyawan'],
              $array_data['kontak'],
              $array_data['jabatan'],
              $array_data['email'],
              $array_data['status']
            );
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn_open);
    return $array_data;
  }else{
    return false;
  }
}

function getMenuJabatan($jabatan)
{
  $conn_open = open_conn();
  if($conn_open){
    $query = "
        SELECT *
        FROM t_jabatan_menu jm
        LEFT OUTER JOIN t_menu m ON jm.menu = m.id_menu
        WHERE jabatan = '".mysqli_real_escape_string($conn_open,$jabatan)."'
    ";
    $result = mysqli_query($conn_open,$query);
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    // return $array_data;
    $menu=[];
    foreach($array_data as $data){
      if(is_null($data['menu_parent'])){
        $menu[$data['id_menu']] = array(
          'judul' => $data['judul'],
          'url' => $data['url'],
          'has_child' => true
        );
      }else{
        $menu[$data['menu_parent']][] = array(
          'judul' => $data['judul'],
          'url' => $data['url']
        );
      }
    }
    return $menu;
  }else{
    return false;
  }
}
 ?>
