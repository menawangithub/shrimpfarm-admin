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
        <h4 class="fw-bold py-3 mb-4 text-primary"><strong> Tambah Data FAQ </strong></h4>

        <!-- Basic Layout -->
        <form action="{{ route('saveAddDataFaq') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Judul / Pertanyaan FAQ</label>
                            <input type="text" class="form-control" name = "judul_faq" id="basic-default-company judul_faq" placeholder="Judul / Pertanyaan FAQ" value ="{{ isset($data[0]) ? $data[0]['judul_faq'] : '' }}" />
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Jawaban FAQ</label>
                            <input type="text" class="form-control" name = "isi_faq" id="basic-default-company isi_faq" placeholder="isi_faq" value ="{{ isset($data[0]) ? $data[0]['isi_faq'] : '' }}" />
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
