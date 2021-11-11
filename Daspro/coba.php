<?php
class Coba
{
    public $data;
    public $id_member;
    public $nama;
    public $kd_member;
    public $email;
    public $no_telp;
    public $jenis_kelamin;
    public $kd_gol;
    public $delete;
    public function __construct($nama, $kd_member, $email, $no_telp, $jenis_kelamin)
    {
        $this->nama = $nama;
        $this->kd_member = $kd_member;
        $this->email = $email;
        $this->no_telp = $no_telp;
        $this->jenis_kelamin = $jenis_kelamin;
        $koneksi = mysqli_connect("localhost", "root", "", "penjualan");
        $tampil = mysqli_query($koneksi, "SELECT * FROM member JOIN golongan ON member.kd_gol = golongan.id_gol");
        while ($hasil = mysqli_fetch_all($tampil)) {
            return $this->data = $hasil;
        }
    }

    public function tampilData()
    {
        $no = 1;
        foreach ($this->data as $k) {
            echo "<form action='coba.php' method='post'>";
            echo "NO : " . $no++ . "<br>";
            echo "<input type='hidden' name='id_member' value='{$k[0]}'></input>";
            echo "<input type='hidden' name='nama' value='{$k[1]}'></input>";
            echo "<input type='hidden' name='kd_member' value='{$k[2]}'></input>";
            echo "<input type='hidden' name='no_telp' value='{$k[3]}'></input>";
            echo "<input type='hidden' name='email' value='{$k[4]}'></input>";
            echo "<input type='hidden' name='jenis_kelamin' value='{$k[5]}'></input>";
            echo "<input type='hidden' name='kd_gol' value='{$k[8]}'></input>";
            echo "ID : {$k[0]}<br>";
            echo "Nama : {$k[1]}<br>";
            echo "Kode Member : {$k[2]}<br>";
            echo "Nomor Telpon : {$k[3]}<br>";
            echo "Email : {$k[4]}<br>";
            echo "Jenis Kelamin : {$k[5]}<br>";
            echo "Golongan : {$k[8]}<br>";
            echo "<button type='submit' style='margin-top: 10px;margin-bottom: 10px;' name='delete'>Delete</button>";
            echo "<button type='submit' style='margin-top: 10px;margin-bottom: 10px;' name='update'>Update</button>";
            echo "</form>";
            echo "<br>";
        }
        if (isset($_POST['id_member'])) {
            echo "<form action='coba.php' method='post'>";
            echo "<label>Nama</label><br>";
            echo "<input type='hidden' name='id_member' value='{$_POST['id_member']}'> </input>";
            echo "<input name='nama' value='{$_POST['nama']}'></input><br>";
            echo "<label>Kode Member</label><br>";
            echo "<input name='kd_member' value='{$_POST['kd_member']}'></input><br>";
            echo "<label>Nomor Telpon</label><br>";
            echo "<input name='no_telp' value='{$_POST['no_telp']}'></input><br>";
            echo "<label>Email</label><br>";
            echo "<input name='email' value='{$_POST['email']}'></input><br>";
            echo "<label>Jenis Kelamin</label><br>";
            echo "<input name='jenis_kelamin' value='{$_POST['jenis_kelamin']}'></input><br>";
            echo "<label>ID Golongan</label><br>";
            echo "<select name='kd_gol' style='margin-bottom:10px;'>
                <option selected>--Golongan--</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
            </select> <br>";
            echo "<button type='submit'>Update</button>";
            echo "<button type='reset'>Reset</button><br>";
            echo "<br>";
            echo "</form>";
        } else {
            echo "<form action='coba.php' method='post'>";
            echo "<label>Nama</label><br>";
            echo "<input name='nama'></input><br>";
            echo "<label>Kode Member</label><br>";
            echo "<input name='kd_member'></input><br>";
            echo "<label>Nomor Telpon</label><br>";
            echo "<input name='no_telp'></input><br>";
            echo "<label>Email</label><br>";
            echo "<input name='email'></input><br>";
            echo "<label>Jenis Kelamin</label><br>";
            echo "<input name='jenis_kelamin'></input><br>";
            echo "<label>ID Golongan</label><br>";
            echo "<select name='kd_gol' style='margin-bottom:10px;'>
                <option selected>--Pilih Angkatan--</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
            </select> <br>";
            echo "<button type='submit'>Simpan</button>";
            echo "<button type='reset'>Reset</button><br>";
            echo "<br>";
            echo "</form>";
        }
        if (isset($_POST['nama'])) {
            $this->nama = $_POST['nama'];
            $this->kd_member = $_POST['kd_member'];
            $this->no_telp = $_POST['no_telp'];
            $this->email = $_POST['email'];
            $this->jenis_kelamin = $_POST['jenis_kelamin'];
            $this->kd_gol = $_POST['kd_gol'];
        }

        if (isset($_POST['delete'])) {
            $this->delete = $_POST['id_member'];
        }
        if (isset($_POST['id_member'])) {
            $this->id_member = $_POST['id_member'];
        }
    }

    public function tambahData()
    {
        $koneksi = mysqli_connect("localhost", "root", "", "penjualan");
        if ($this->id_member) {
        } else {
            mysqli_query($koneksi, "INSERT INTO member (nama, kd_member, no_telp, email, jenis_kelamin, kd_gol) VALUES ('{$this->nama}', '{$this->kd_member}', '{$this->no_telp}', '{$this->email}', '{$this->jenis_kelamin}','{$this->kd_gol}')");
        }
    }

    public function hapusData()
    {
        $koneksi = mysqli_connect("localhost", "root", "", "penjualan");
        mysqli_query($koneksi, "DELETE FROM member WHERE id_member = $this->delete");
        echo "<script>document.location='coba.php</script>";
    }

    public function updateData()
    {
        $koneksi = mysqli_connect("localhost", "root", "", "penjualan");
        mysqli_query($koneksi, "UPDATE member SET nama='$this->nama', kd_member='$this->kd_member', no_telp='$this->no_telp', email='$this->email', jenis_kelamin='$this->jenis_kelamin',kd_gol='$this->kd_gol' WHERE id_member = $this->id_member");
    }
}

$coba = new Coba('', '', '', '', '');
echo $coba->tampilData();
if ($coba->nama) {
    echo $coba->tambahData();
}
if ($coba->delete) {
    echo $coba->hapusData();
}
if ($coba->id_member) {
    echo $coba->updateData();
}

echo var_dump($coba->nama);
echo var_dump($coba->kd_member);
echo var_dump($coba->no_telp);
echo var_dump($coba->email);
echo var_dump($coba->jenis_kelamin);
echo var_dump($coba->kd_gol);
