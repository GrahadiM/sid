<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK SURAT {{ $title }}</title>
</head>

<body>
    <center>

        <h2>PEMERINTAH KABUPATEN PERCONTOHAN</h2>
        <h3>
            KECAMATAN PERCONTOHAN
            <br>
            DESA PERCONTOHAN
        </h3>
        <p>________________________________________________________________________</p>

    </center>

    <center>
        <h4>
            <u>SURAT KETARANGAN DOMISILI</u>
        </h4>
        <h4>
            No Surat : ...../Ket.Domisili/...../.....
        </h4>
    </center>
    <p>
        Yang bertandatangan dibawah ini Kepala Desa .............., Kecamatan ............., Kabupaten ............,
        dengan ini menerangkan bahawa :
    </P>
    <table>
        <tbody>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ (int) $data->nik }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->name) }}</td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->bop) . ' - ' . Carbon\Carbon::parse($data->bod)->isoFormat('D MMMM Y') }}</td>
            </tr>
        </tbody>
    </table>
    <p>Adalah benar-benar warga Desa ......., Kecamatan ..........., Kabupuaten ..............</P>
    <p>Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
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
