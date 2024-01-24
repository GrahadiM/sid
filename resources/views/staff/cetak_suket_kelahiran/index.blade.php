<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK SURAT {{ $title }}</title>
</head>

<body>
    <center>
        <h2>PEMERINTAH KABUPATEN PERCONTOHAN</h2>
        <img src="dist/img/izin.png" width="200">
        <h3>KECAMATAN PERCONTOHAN
            <br>DESA PERCONTOHAN
        </h3>
        <p>________________________________________________________________________</p>

    </center>

    <center>
        <h4>
            <u>SURAT KETARANGAN KELAHIRAN</u>
        </h4>
        <h4>
            No Surat : ...../Ket.Kelahiran/...../.....
        </h4>
    </center>
    <p>
        Yang bertandatangan dibawah ini Kepala Desa .............., Kecamatan ............., Kabupaten ............,
        dengan ini menerangkan bahawa :
    </P>
    <table>
        <tbody>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->name) }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $data->gender == 'LK' ? 'Laki-Laki' : 'Perempuan' }}</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->bop) . ' - ' . Carbon\Carbon::parse($data->bod)->isoFormat('D MMMM Y') }}</td>
            </tr>
        </tbody>
    </table>
    <p>Telah benar-benar Lahir di Desa Aek Nabara, Kecamatan Simangumban, Kabupuaten Tapanuli Utara</P>
    <p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p align="right">
        Maju Jaya,
        21/01/24 <br> KEPALA DESA ...............
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>(....................................................)
    </p>

    <script>
        window.print();
    </script>

</body>

</html>
