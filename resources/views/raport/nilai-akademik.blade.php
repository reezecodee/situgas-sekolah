<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Akademik</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            font-family: 'Times New Roman', Times, serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            font-size: 12px;
        }

        /* .report-container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        } */

        .header h2 {
            font-size: 14px;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .report-table th {
            background: #f2f2f2;
            font-weight: bold;
        }

        .report-table tfoot td {
            font-weight: bold;
            background: #f2f2f2;
        }

        .left {
            text-align: left !important;
        }
    </style>
</head>

<body>
    <div class="report-container">
        <hr style="border: 1.5px solid">
        <table style="width: 100%; padding: 2px;">
            <tr>
                <td style="width: 10%;">NAMA</td>
                <td style="width: 1%;">:</td>
                <td style="width: 40%;">{{ $student['nama'] }}</td>
                <td style="width: 10%;">Madrasah</td>
                <td style="width: 1%;">:</td>
                <td style="width: 18%;">MTs BPI BATUROMPE</td>
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

        <h2 class="header">B. PENGETAHUAN DAN KETERAMPILAN</h2>
        <p>Kriteria Ketentuan Minimal = 75 (x)</p>

        <table class="report-table">
            <thead>
                <tr>
                    <th rowspan="2" colspan="2">Mata Pelajaran</th>
                    <th colspan="2">Pengetahuan (KI 3)</th>
                    <th colspan="2">Keterampilan (KI 4)</th>
                </tr>
                <tr>
                    <th>Nilai</th>
                    <th>Predikat</th>
                    <th>Nilai</th>
                    <th>Predikat</th>
                </tr>
            </thead>
            <tbody>
                <!-- Kelompok A -->
                <tr>
                    <td colspan="2" class="left">Kelompok 1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">A. Al Qur'an Hadis</td>
                    <td>84</td>
                    <td>B</td>
                    <td>85</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">B. Akidah Akhlak</td>
                    <td>88</td>
                    <td>B</td>
                    <td>90</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">C. Fikih</td>
                    <td>75</td>
                    <td>C</td>
                    <td>75</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">D. Sejarah Kebudayaan Islam</td>
                    <td>79</td>
                    <td>C</td>
                    <td>80</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td colspan="2" class="left">Kelompok 1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">A. Al Qur'an Hadis</td>
                    <td>84</td>
                    <td>B</td>
                    <td>85</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">B. Akidah Akhlak</td>
                    <td>88</td>
                    <td>B</td>
                    <td>90</td>
                    <td>B</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">C. Fikih</td>
                    <td>75</td>
                    <td>C</td>
                    <td>75</td>
                    <td>C</td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td class="left">D. Sejarah Kebudayaan Islam</td>
                    <td>79</td>
                    <td>C</td>
                    <td>80</td>
                    <td>C</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Jumlah</td>
                    <td colspan="2">1324</td>
                    <td colspan="2">1326</td>
                </tr>
            </tfoot>
        </table>
        <table class="report-table" cellspacing="0" cellpadding="5" style="width: 50%;">
            <thead>
                <tr>
                    <th rowspan="2">KKM</th>
                    <th colspan="4">Predikat</th>
                </tr>
                <tr>
                    <th>D</th>
                    <th>C</th>
                    <th>B</th>
                    <th>A</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>75</td>
                    <td>0 - 74</td>
                    <td>75 - 82</td>
                    <td>83 - 91</td>
                    <td>92 - 100</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>