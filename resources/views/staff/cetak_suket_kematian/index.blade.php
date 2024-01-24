<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK SURAT {{ $title }}</title>
</head>

<body>
    <center>

        <h2>PEMERINTAHAN KABUPATEN TAPANULI UATARA</h2>
        <h3>KECAMATAN SIMANGUMBAN
            <br>DESA AEK NABARA
        </h3>
        <p>________________________________________________________________________</p>

    </center>

    <center>
        <h4>
            <u>SURAT KETARANGAN MENINGGAL DUNIA</u>
        </h4>
        <h4>
            No Surat : ...../...../SKMD/...../.....
        </h4>
    </center>
    <p>
        Yang bertandatangan dibawah ini Kepala Desa .............., Kecamatan ............., Kabupaten ............,
        dengan ini menerangkan dengan sesungguhnya bahwa :
    </P>
    <table>
        <tbody>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ (int)$data->nik }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->name) }}</td>
            </tr>
            <tr>
                <td>Tanggal Kematian</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::parse($data->date)->isoFormat('D MMMM Y') }}</td>
            </tr>
            <tr>
                <td>Sebab</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->reason) }}</td>
            </tr>
        </tbody>
    </table>
    <p>Benar-benar telah
        <b>Meninggal Dunia</b>, pada waktu yang telah disebutkan diatas.
    </P>
    <p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
    <br>
    <br>
    <br>
    <br>
    <br>
    <p align="right">
        Aek Nabara, 07 Juli 2023
        <br>Kepala Desa Aek Nabara
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> GEMPA TAMBUNAN

    </p>



    <script>
        window.print();
    </script>

</body>

</html>
