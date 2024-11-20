<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Undangan</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            margin: 0;
            padding: 40px;
            background-color: #ffffff;
        }

        .header {
            margin-bottom: 30px;
            border-bottom: 2px solid #000000;
            padding-bottom: 20px;
        }

        .header table {
            width: 100%;
            border-collapse: collapse;
        }

        .header td {
            vertical-align: middle;
            padding: 5px;
        }

        .logo {
            width: 80px;
            object-fit: contain;
        }

        .header-text {
            text-align: center;
        }

        .school-name {
            color: #000000;
            font-size: 24px;
            font-weight: bold;
        }

        .school-address {
            color: #000000;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .date {
            text-align: right;
            margin: 20px 0;
            color: #000000;
        }

        .recipient {
            margin: 20px 0;
            color: #000000;
        }

        .content {
            text-align: justify;
            margin: 30px 0;
            color: #000000;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
            color: #000000;
        }

        @media (max-width: 600px) {
            .header table {
                width: 100%;
            }

            .logo {
                width: 80px;
            }

            .header-text {
                text-align: center;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <table>
                <tr>
                    <td width="100px">
                        <img src="{{ public_path('images/logo/smkn3banjar.png') }}" alt="Logo Sekolah" class="logo">
                    </td>
                    <td class="header-text">
                        <div class="school-name">SEKOLAH HARAPAN BANGSA</div>
                        <div class="school-address">
                            Jl. Pendidikan No. 123, Jakarta Selatan<br>
                            Telp: (021) 1234-5678 | Email: info@harapanbangsa.sch.id
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="date">
            Jakarta, 20 November 2024
        </div>

        <div class="recipient">
            Kepada Yth.<br>
            Bapak/Ibu Orang Tua/Wali Murid<br>
            di Tempat
        </div>

        <div class="content">
            <p>Dengan hormat,</p>

            <p>Sehubungan dengan akan diadakannya "Pertemuan Orang Tua Murid dan Guru Semester Ganjil Tahun Ajaran 2024/2025", kami mengundang Bapak/Ibu untuk hadir pada:</p>

            <p style="margin-left: 40px;">
                Hari/Tanggal : Sabtu, 30 November 2024<br>
                Waktu : 09.00 - 12.00 WIB<br>
                Tempat : Aula Sekolah Harapan Bangsa<br>
                Agenda : 1. Laporan Perkembangan Siswa<br>
            </p>

            <p>Mengingat pentingnya acara ini, kami mengharapkan kehadiran Bapak/Ibu tepat waktu. Atas perhatian dan kehadirannya, kami ucapkan terima kasih.</p>
        </div>

        <div class="signature">
            <p>Hormat kami,<br><br><br>
            Dra. Sarah Wijaya, M.Pd.<br>
            Kepala Sekolah</p>
        </div>
    </div>
</body>
</html>
