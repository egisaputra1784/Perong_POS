<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Member</title>

    <style>
        .box {
            position: relative;
        }

        .card {
            width: 85.60mm;
        }

        .logo {
            position: absolute;
            top: -40pt;
            right: 7pt;
            font-size: 20pt;
            font-family: Arial, Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }

        .logo p {
            text-align: right;
            margin-right: 16pt;
        }

        .logo img {
            position: absolute;
            margin-top: -5pt;
            width: 50px;
            height: 50px;
            right: 16pt;
        }

        .nama {
            position: absolute;
            top: 65pt;
            right: 30pt;
            font-size: 16pt;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            color: #fff !important;
        }

        .telepon {
            position: absolute;
            margin-top: 90pt;
            right: 20pt;
            color: #fff !important;
        }

        .barcode {
            position: absolute;
            top: 70pt;
            left: .860rem;
            font-size: 12pt;
            border: 1px solid #fff;
            padding: .5px;
            background: #fff;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <section style="border: 1px solid #fff">
        <table width="100%">
            @foreach ($datamember as $data)
                <tr>
                    @foreach ($data as $item)
                        <td class="text-center">
                            {{-- kartu member --}}
                            <div class="box">
                                <img src="{{ public_path($setting->path_kartu_member) }}" alt="card" width="100%">
                                <div class="logo">
                                    <p>{{ $setting->nama_perusahaan }}</p>
                                    <img src="{{ public_path($setting->path_logo) }}" alt="logo">
                                </div>
                                <div class="nama">{{ $item->nama }}</div>
                                <div class="telepon">{{ $item->telepon }}</div>
                                <div class="barcode text-left">
                                    <img src="data:image/png;base64, {{ DNS2D::getBarcodePNG("$item->kode_member", 'QRCODE') }}"
                                        alt="qrcode" height="45" width="45">
                                </div>
                            </div>
                        </td>
                    @endforeach

                    {{-- tambahkan kolom kosong jika cuma 1 item di baris ini --}}
                    @if ($data->count() == 1)
                        <td class="text-center" style="width: 50%;"></td>
                    @endif
                </tr>
            @endforeach

        </table>
    </section>
</body>

</html>
