<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Sikap</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.5;
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

        .header h2 {
            font-size: 14px;
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

        h3 {
            font-size: 15px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .table-chb {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .td {
            border: 1px solid #000;
            padding: 10px;
            vertical-align: top;
        }

        .label {
            width: 15%;
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .value {
            width: 10%;
            text-align: center;
            font-weight: bold;
        }

        .description {
            width: 75%;
            text-align: justify;
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
        <table style="width: 100%; padding: 2px;">
            <tr>
                <td style="width: 10%;">NAMA</td>
                <td style="width: 1%;">:</td>
                <td style="width: 40%;">{{ $student['nama'] }}</td>
                <td style="width: 20%;">Madrasah</td>
                <td style="width: 1%;">:</td>
                <td style="width: 20%;">MTs BPI BATUROMPE</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td>{{ $student['nis'] }}</td>
                <td>Kelas/Semester</td>
                <td>:</td>
                <td>VIII.C / Ganjil</td>
            </tr>
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td>{{ $student['nisn'] }}</td>
                <td>Tahun Pelajaran</td>
                <td>:</td>
                <td>2023/2024</td>
            </tr>
        </table>
        <hr style="border: 1.5px solid">
        <h2 style="text-align: center;">CAPAIAN HASIL BELAJAR</h2>
        <h2 class="header">A. SIKAP</h2>
        <div class="sikap">
            <h3>1. SIKAP SPIRITUAL</h3>
            <table class="table-chb">
                <tr>
                    <td class="label td" style="text-align: center;">Predikat</td>
                    <td class="label td" style="text-align: center;">Deskripsi</td>
                </tr>
                <tr>
                    <td class="value td">BAIK</td>
                    <td class="description td">
                        Sikap spiritual yang ditunjukkan baik dalam menghargai perilaku beriman dan bertakwa kepada
                        Tuhan YME
                        dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, rajin berdoa, rajin memberi
                        salam, rajin
                        mengikuti shalat berjamaah dan pandai bersyukur.
                    </td>
                </tr>
            </table>
        </div>
        <div class="sikap">
            <h3>2. SIKAP SOSIAL</h3>
            <table class="table-chb">
                <tr>
                    <td class="label td" style="text-align: center;">Predikat</td>
                    <td class="label td" style="text-align: center;">Deskripsi</td>
                </tr>
                <tr>
                    <td class="value td">BAIK</td>
                    <td class="description td">
                        Sikap spiritual yang ditunjukkan baik dalam menghargai perilaku beriman dan bertakwa kepada
                        Tuhan YME
                        dan berakhlak mulia dalam kehidupan di madrasah dan masyarakat, rajin berdoa, rajin memberi
                        salam, rajin
                        mengikuti shalat berjamaah dan pandai bersyukur.
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>