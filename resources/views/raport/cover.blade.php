<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cover Raport</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
            color: #000;
            width: 210mm;
            height: 297mm;
            line-height: 1.5;
        }

        .container {
            width: 190mm;
            height: 277mm;
            margin: 10mm auto;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 120px;
            height: auto;
            margin-bottom: 10px;
        }

        .kemenag {
            font-size: 13px;
            font-weight: bold;
            margin: 0;
        }

        .title {
            font-size: 16pt;
            font-weight: bold;
            margin: 20px 0;
        }

        .emblem {
            text-align: center;
            margin: 20px 0;
        }

        .emblem-img {
            width: 160px;
            height: auto;
        }

        .info {
            text-align: left;
            margin: 20px auto;
            display: inline-block;
        }

        .info p {
            margin: 5px 0;
        }

        .value {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 40px;
        }

        .footer p {
            margin: 5px 0;
            font-weight: bold;
            font-size: 12pt;
        }

        /* For print compatibility */
        @page {
            size: A4;
            margin: 0;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            @php
                $logo = base64_encode(file_get_contents(public_path('images/logo/logo-kementrian.png')));
            @endphp
            <img src="data:image/png;base64,{{ $logo }}" alt="Logo Kemenag" class="logo">
            <p class="kemenag">KEMENTERIAN AGAMA REPUBLIK INDONESIA</p>
            <br><br>
            <p class="title">LAPORAN HASIL BELAJAR<br>MADRASAH TSANAWIYAH<br>(MTs)</p>
        </div>
        <br><br>
        <div class="emblem">
            @php
                $logo = base64_encode(file_get_contents(public_path('images/logo/logo-mts-bpi-baturompe.png')));
            @endphp
            <img src="data:image/png;base64,{{ $logo }}" alt="Logo Kemenag" class="emblem-img">
        </div>
        <br><br><br><br>
        <div class="info value">
            <p>NAMA: <span>{{ $student['nama'] }}</span></p>
            <p>NIS MADRASAH: <span>{{ $student['nis'] }}</span></p>
            <p>NIS NASIONAL: <span>{{ $student['nisn'] }}</span></p>
        </div>
        <br><br><br><br>
        <div class="footer">
            <p style="font-size: 20px;">MTSS BPI BATUROMPE</p>
            <p>KOTA TASIKMALAYA</p>
            <p>PROVINSI JAWA BARAT</p>
        </div>
    </div>
</body>

</html>