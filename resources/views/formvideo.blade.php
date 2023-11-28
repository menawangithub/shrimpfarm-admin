@extends('templates')
@section('content')
@if(!session()->has('login'))
<script>
  document.location.href = "/authlogin";
</script>
@endif
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4 text-primary"><strong> Edit Konten Video </strong></h4>

        <!-- Basic Layout -->
        <form action="{{ isset($data->_id) ? route('saveEditDataVideo', ['id' => $data->_id]) : route('saveAddDataVideo') }}" method="POST">
            @csrf
            <input type="hidden" name="id" id="id" value="{{ isset($data->_id) ? $data->_id : '' }}">

            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-body">

                            <!-- Ukuran Panen -->
                            <div class="mb-3">
                                <label class="form-label" for="id">ID VIDEO</label>
                                <input type="text" class="form-control" name="id" id="id" disabled value="{{ $data->id }}" />
                            </div>

                            <!-- Perkiraan Panen -->
                            <div class="mb-3">
                                <label class="form-label" for="tanggal_upload">TANGGAL UPLOAD</label>
                                <input type="text" class="form-control" name="tanggal_upload" id="tanggal_upload" placeholder="Pilih Tanggal"
                                    value="{{ $data->tanggal_upload }}" />
                                <script>
                                    flatpickr("#tanggal_upload", {
                                        dateFormat: "Y-m-d",
                                        enableTime: false,
                                    });
                                </script>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="judul_video">JUDUL VIDEO</label>
                                <input type="text" class="form-control" name="judul_video" id="judul_video" placeholder="Judul"
                                    value="{{ $data->judul_video }}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="deskripsi">DESKRIPSI VIDEO</label>
                                <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi"
                                    value="{{ $data->deskripsi }}" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="url">URL VIDEO</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-default-email2">https://www.youtube.com/embed/"</span>
                                    <input type="text" id="url" class="form-control" placeholder="Masukkan Id Video" name="url" value="{{ $data->url }}" />
                                    <span class="input-group-text" id="basic-default-email2">"</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="owner">Pemilik</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="owner" class="form-control" placeholder="Siapa Pemilik Video Ini?" name="owner"  value="{{ $data->owner }}"/>
                                </div>
                            </div>

                            <br><br>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
