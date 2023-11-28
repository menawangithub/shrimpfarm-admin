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
              <h4 class="fw-bold py-3 mb-4 text-primary"> <strong> Edit Data Faq</strong></h4>

              <!-- Basic Layout -->
              <form action="{{ isset($data->_id) ? route('saveEditDataFaq', ['id' => $data->_id]) : route('saveAddDataFaq') }}" method="POST">
              @csrf
              <input type="hidden" name="id" id="id" value="{{ isset($data->_id) ? $data->_id : '' }}">
                <div class="row">
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-body">
                      <div class="mb-3">
                            <label class="form-label" for="basic-default-company">JUDUL FAQ</label>
                            <input type="text" class="form-control" name = "judul_faq" id="basic-default-company judul_faq" placeholder="Judul / Pertanyaan" value ="{{ isset($data) ? $data['judul_faq'] : '' }}" />
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">JAWABAN FAQ</label>
                            <input type="text" class="form-control" name = "isi_faq" id="basic-default-company isi_faq" placeholder="Jawaban Pertanyaan" value ="{{ isset($data) ? $data['isi_faq'] : '' }}" />
                          </div>
                          <br><br>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>     
          @endsection        
            <!-- / Content -->

          