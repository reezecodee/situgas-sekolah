<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Identitas Peserta Didik</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1;
            margin: 0;
            padding: 20px;
            font-size: 12px;
        }

        header {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
        }

        .header-images {
            position: relative;
            margin-bottom: 3px;
        }

        .logo-left {
            position: absolute;
            top: 0;
            left: 0;
            width: 80px;
            height: auto;
        }

        .logo-right {
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: auto;
        }

        .header-text {
            text-align: center;
            line-height: 0.5;
        }

        .header-text p {
            line-height: 0.5;
        }

        header h3 {
            margin: 2px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table td {
            padding: 5px;
            vertical-align: top;
        }

        .photo {
            top: 20px;
            right: 20px;
            border: 1px solid #000;
            width: 100px;
            height: 130px;
            text-align: center;
            line-height: 130px;
        }

        .photo img {
            width: 100%;
        }

        .sub-number {
            padding-left: 30px;
        }

        .qr-code img {
            width: 100px;
            height: auto;
        }

        .photo {
            position: relative;
        }

        .photo img {
            width: 100px;
            height: auto;
            border: 1px solid #000;
        }

        .details {
            font-size: 14px;
            line-height: 1.6;
        }

        .details p {
            margin: 2px 0;
        }

        .signature {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="document">
        <header>
            <div class="header-images">
                @php
                    $logo = base64_encode(file_get_contents(public_path('images/logo/logo-kementrian.png')));
                @endphp
                <img src="data:image/png;base64,{{ $logo }}"
                    alt="Logo Kiri" class="logo-left">
                @php
                    $logo = base64_encode(file_get_contents(public_path('images/logo/logo-mts-bpi-baturompe.png')));
                @endphp
                <img src="data:image/png;base64,{{ $logo }}"
                    alt="Logo Kanan" class="logo-right">
            </div>
            <div class="header-text">
                <h3>KEMENTERIAN AGAMA REPUBLIK INDONESIA</h3>
                <h2 style="margin-bottom: 0px;">MTSS BPI BATUROMPE</h2>
                <div style="line-height: 0.5;">
                    <p style="font-style: italic;">KOMPLEKS BPI BATUROMPE</p>
                    <p style="font-style: italic;">Kecamatan Mangkubumi, Kota Tasikmalaya - Jawa Barat</p>
                </div>
            </div>
        </header>
        <hr style="border: 1.5px solid">
        <h2 style="text-align: center;">IDENTITAS PESERTA DIDIK</h2>
        <table>
            <tr>
                <td>1. Nama Peserta Didik</td>
                <td>:</td>
                <td>AMELIA</td>
            </tr>
            <tr>
                <td>2. NIS</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>3. NISN</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>4. Tempat Tanggal Lahir</td>
                <td>:</td>
                <td>Tasikmalaya, 13 Juni 2010</td>
            </tr>
            <tr>
                <td>5. Jenis Kelamin</td>
                <td>:</td>
                <td>Perempuan</td>
            </tr>
            <tr>
                <td>6. Agama</td>
                <td>:</td>
                <td>Islam</td>
            </tr>
            <tr>
                <td>7. Status dalam Keluarga</td>
                <td>:</td>
                <td>Anak Kandung</td>
            </tr>
            <tr>
                <td>8. Anak ke</td>
                <td>:</td>
                <td>3</td>
            </tr>
            <tr>
                <td>9. Alamat Peserta Didik</td>
                <td>:</td>
                <td>Cigantang Girang RT 03 RW 07, Kel. Cigantang, Kec. Mangkubumi, Jawa Barat, 46181</td>
            </tr>
            <tr>
                <td>10. Nomor Telepon Rumah/HP</td>
                <td>:</td>
                <td>0</td>
            </tr>
            <tr>
                <td>11. Sekolah Asal</td>
                <td>:</td>
                <td>MI PUI Gumguyuda</td>
            </tr>
            <tr>
                <td>12. Diterima di sekolah ini</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td class="sub-number">a. Di kelas</td>
                <td>:</td>
                <td>VII</td>
            </tr>
            <tr>
                <td class="sub-number">b. Pada tanggal</td>
                <td>:</td>
                <td>18 Juli 2022</td>
            </tr>
            <tr>
                <td>13. Nama Orang Tua</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="sub-number">a. Ayah</td>
                <td>:</td>
                <td>HERMAN</td>
            </tr>
            <tr>
                <td class="sub-number">b. Ibu</td>
                <td>:</td>
                <td>SURYATI</td>
            </tr>
            <tr>
                <td>14. Alamat Orang Tua</td>
                <td>:</td>
                <td>Cigantang Girang RT 03 RW 07, Kel. Cigantang, Kec. Mangkubumi, Jawa Barat, 46181</td>
            </tr>
            <tr>
                <td>15. Pekerjaan Orang Tua</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="sub-number">a. Ayah</td>
                <td>:</td>
                <td>Buruh</td>
            </tr>
            <tr>
                <td class="sub-number">b. Ibu</td>
                <td>:</td>
                <td>Lainnya</td>
            </tr>
            <tr>
                <td>16. Nama Wali Siswa</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>17. Pekerjaan Wali</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>18. Alamat Wali Siswa</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>

        <table>
            <tr>
                <!-- QR Code -->
                <td class="qr-code">
                    <img src="{{ $qrCode }}" id="qrcode" alt="QR Code">
                </td>

                <!-- Foto Siswa dengan Stempel -->
                <td class="photo">

                </td>

                <!-- Detail Informasi -->
                <td class="details" style="line-height: 1; padding-left: 2.5rem;">
                    <p>Baturompe, 18 Juli 2022</p>
                    <p>Kepala Madrasah</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="signature">ELIS NUR. S.Ag.</p>
                    <p>949279849123</p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>