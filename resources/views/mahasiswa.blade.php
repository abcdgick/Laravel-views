<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
        td{
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/"><strong>STMIK LIKMI</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Test 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/">Test 2</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container text-center mt-3 pt-3 bg-white">
        <div class="card mb-3">
            <div class="card-header">
                Data Mahasiswa = {!! $jurusan !!}
            </div>

            <div class="card-body">
                <h4 class="card-title">{{$nama}}</h4>
                <h6 class="card-subtitle mb-2 text-muted">{{$npm}}</h6>
                <p class="card-text">
                    <b>IPK: </b>{{$ipk}}

                    @if ($ipk >= 3.50)
                        <span class="badge bg-success">OK</span>
                    @elseif ($ipk >= 3.00)
                        <span class="badge bg-warning">Warning</span>
                    @else
                        <span class="badge bg-danger">Danger</span>
                    @endif
                </p>
                <p class="card-text">
                    <b>Status: </b>
                    @switch($status)
                        @case(1)
                           <span class="badge bg-primary text-light">Aktif</span> 
                            @break
                        @case(2)
                           <span class="badge bg-secondary text-light">Belum Daftar Ulang</span> 
                            @break
                        @default
                           <span class="badge text-light">Non-Aktif</span> 
                    @endswitch
                </p>
            </div>

            <div class="card-footer">{{date(now())}}</div>
        </div>

        <div class="card bg-light mb-3">
            <div class="card-header">
                Transkrip Nilai
            </div>
            <div class="card-body text-left">
                Semester: 
                @for($i = 1; $i<9; $i++)
                    <button type="button" class="btn btn-dark">
                        {{$i}}
                    </button>
                @endfor
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama MK</th>
                            <th>AA</th>
                            <th>NA</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($transkripNilai as $item)
                            <tr>
                                <td>{{$item['namaMatkul']}}</td>
                                <td>{{$item['aa']}}</td>
                                <td>{{$item['na']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card bg-light mb-3">
            <div class="card-header">
                Transkrip Nilai Sem. Padat
            </div>
            <div class="card-body text-left">
                Semester: 
                @php $i = 1; @endphp
                @while($i < 5)
                    <button type="button" class="btn btn-secondary">
                        {{$i}}
                    </button>
                    @php $i++; @endphp
                @endwhile
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>Nama MK</th>
                            <th>AA</th>
                            <th>NA</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($transkripNilaiPadat as $item)
                            <tr>
                                <td>{{$item['namaMatkul']}}</td>
                                <td>{{$item['aa']}}</td>
                                <td>{{$item['na']}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="3">Tidak Ada Data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card bg-light mb-3">
            <div class="card-header">
                Mata Kuliah Mengulang
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama MK</th>
                            <th>AA</th>
                            <th>NA</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($transkripNilaiMengulang as $item)
                            @if($item['aa']<20)
                                @continue
                            @endif
                            {{--@if($item['aa']>50)
                                @break
                            @endif--}}
                            <tr>
                                <td>{{$item['namaMatkul']}}</td>
                                <td>{{$item['aa']}}</td>
                                <td>{{$item['na']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</body>