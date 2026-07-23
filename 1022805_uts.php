<?php
$dataMahasiswa = [];

function tambahData(&$data, $nim, $nama, $jurusan) {
    $data[] = [
        "nim" => $nim,
        "nama" => $nama,
        "jurusan" => $jurusan
    ];
    echo "Data mahasiswa bernama <strong>$nama</strong> berhasil ditambahkan.<br>";
}

function cariNama($data, $nama) {
    $hasilPencarian = [];
    foreach ($data as $mhs) {
        if (stripos($mhs['nama'], $nama) !== false) {
            $hasilPencarian[] = $mhs;
        }
    }
    return $hasilPencarian;
}

function cariNim($data, $nim) {
    $hasilPencarian = [];
    foreach ($data as $mhs) {
        if ($mhs['nim'] == $nim) {
            $hasilPencarian[] = $mhs;
        }
    }
    return $hasilPencarian;
}

function ubahData(&$data, $nim, $namaBaru, $jurusanBaru) {
    $ditemukan = false;
    foreach ($data as $key => $mhs) {
        if ($mhs['nim'] == $nim) {
            $data[$key]['nama'] = $namaBaru;
            $data[$key]['jurusan'] = $jurusanBaru;
            $ditemukan = true;
            echo "Data mahasiswa dengan NIM <strong>$nim</strong> berhasil diubah.<br>";
            break;
        }
    }
    if (!$ditemukan) {
        echo "Gagal mengubah: Mahasiswa dengan NIM $nim tidak ditemukan.<br>";
    }
}

function hapusData(&$data, $nim) {
    $ditemukan = false;
    foreach ($data as $key => $mhs) {
        if ($mhs['nim'] == $nim) {
            unset($data[$key]);
            $data = array_values($data);
            $ditemukan = true;
            echo "Data mahasiswa dengan NIM <strong>$nim</strong> berhasil dihapus.<br>";
            break;
        }
    }
    if (!$ditemukan) {
        echo "Gagal menghapus: Mahasiswa dengan NIM $nim tidak ditemukan.<br>";
    }
}

echo "<h2>Tugas Pengganti UTS - Mengelola Array Data Mahasiswa</h2>";

echo "<h3>1. Menambahkan Data</h3>";
tambahData($dataMahasiswa, "1022805", "Zulfan", "Teknik Informatika");
tambahData($dataMahasiswa, "1022806", "Andi", "Sistem Informasi");
tambahData($dataMahasiswa, "1022807", "Budi", "Teknik Komputer");
tambahData($dataMahasiswa, "1022808", "Citra", "Sistem Informasi");

echo "<h3>Data Mahasiswa Saat Ini:</h3>";
echo "<pre>";
print_r($dataMahasiswa);
echo "</pre>";
echo "<hr>";

echo "<h3>2. Mencari Data</h3>";
$cari1 = cariNama($dataMahasiswa, "Andi");
echo "Hasil pencarian nama <strong>'Andi'</strong>: <br>";
echo "<pre>"; print_r($cari1); echo "</pre>";

$cari2 = cariNim($dataMahasiswa, "1022805");
echo "Hasil pencarian NIM <strong>'1022805'</strong>: <br>";
echo "<pre>"; print_r($cari2); echo "</pre>";
echo "<hr>";

echo "<h3>3. Mengubah Data</h3>";
ubahData($dataMahasiswa, "1022806", "Andi Setiawan", "Sistem Informasi (S1)");
echo "Data Mahasiswa setelah diubah (NIM 1022806):<br>";
echo "<pre>"; print_r(cariNim($dataMahasiswa, "1022806")); echo "</pre>";
echo "<hr>";

echo "<h3>4. Menghapus Data</h3>";
hapusData($dataMahasiswa, "1022807");
echo "Data Mahasiswa keseluruhan setelah NIM 1022807 dihapus:<br>";
echo "<pre>"; print_r($dataMahasiswa); echo "</pre>";

?>
