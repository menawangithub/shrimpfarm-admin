@extends('templates')
@section('content')
@if(!session()->has('login'))
<script>
  document.location.href = "/authlogin";
</script>
@endif

<div class="buy-now">
    <a
        href="/AddDataVideo"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >+ Tambah Data</a
    >
</div>
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4 text-primary"><strong> Konten Video - ShrimpFarm</strong></h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <h5 class="card-header">Konten Video - ShrimpFarm</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Aksi</th>
                        <th>ID Video</th>
                        <th>Judul Video</th>
                        <th>Deskripsi</th>
                        <th>URL Video</th>
                        <th>Tanggal Upload</th>
                        <th>Owner</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data ?? [] as $index)
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item btnUpdate" href="{{ url('/EditDataVideo/' . $index->_id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item btnDelete" href="javascript:void(0);" data-id_delete="{{ $index->_id }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $index->_id }}</strong></td>
                            <td>{{ $index->judul_video ?? '' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($index->deskripsi, 50) }}</td>
                            <td>{{ $index->url ?? '' }}</td>
                            <td>
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-calendar-date me-2"></i>
                                    {{ \Carbon\Carbon::parse(str_replace('GMT+0700 (Western Indonesia Time)', '', $index->tanggal_upload))->translatedFormat('l, d F H:i') }}
                                </span>
                            </td>
                            <td>{{ $index->owner }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
