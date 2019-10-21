<h1 align="center">Surat Keputusan</h1>
<?php foreach($ambil as $cek){?>
<h3 align="center">No Surat Keputusan : <?php echo $cek->kd_sk?></h3>
<br>
Tanggal : <?php echo $cek->tanggal_sk?><br><br>
<pre>
    Berdasarkan hasil perhitungan/penilaian untuk kode penilaian <b><?php echo $cek->kd_sk?></b>, saya menyatakan hasil 
akhirnya adalah sebagai berikut:</pre>
<br>
<table align="center">
    <tr>
        <td>Nama Bahan</td>
        <td>:</td>
        <td><?php echo $cek->nama_bahan?></td>
    </tr>
    <tr>
        <td>Nama Supplier</td>
        <td>:</td>
        <td><?php echo $cek->nama_supplier?></td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td><?php echo $cek->keterangan?></td>
    </tr>
</table>
<br>
<pre>
Demikian surat ini di buat dan dipergunakan untuk semestinya
</pre>
<br>
<br>
<br>
<table align="right">
    <tr>
        <td>Diketahui,</td>
    </tr>
    <tr>
        <td>Owner<br>
    <br>
    <br><br><br><br></td>
    </tr>
    
    <tr>
        <td>Susi</td>
    </tr>
</table>
<?php 
} ?>
<script>
window.print();
</script>