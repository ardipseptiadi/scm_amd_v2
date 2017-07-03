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
                jumlah,
                status
              FROM t_produk
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
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
                kr.tgl_kirim,
                ps.kode_pesan,
                kd.no_polisi,
                ag.nama_agen,
                kr.status,
                ky.nama_karyawan
              FROM t_pengiriman kr
              JOIN t_detail_pemesanan dps ON kr.id_detail_pemesanan = dps.id_detail_pemesanan
              JOIN t_pemesanan ps on dps.kode_pesan = ps.`kode_pesan`
              JOIN t_kendaraan kd on kr.no_polisi = kd.no_polisi
              JOIN t_agen ag ON ps.id_agen = ag.`id_agen`
              JOIN t_karyawan ky on kr.id_karyawan=ky.id_karyawan
            ");
    $array_data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    free_close_db($result,$conn_open);
    return $array_data;
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
                id_material,
                nama_material
              FROM
                t_material
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
                  mt.status,
                  ms.jumlah
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
