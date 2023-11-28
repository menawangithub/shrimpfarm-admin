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
              <h4 class="fw-bold py-3 mb-4 text-primary"> <strong> Edit Data Artikel</strong></h4>

              <!-- Basic Layout -->
              <form action="{{ isset($data->_id) ? route('saveEditDataArtikel', ['id' => $data->_id]) : route('saveAddDataArtikel') }}" method="POST">
              @csrf
              <input type="hidden" name="id" id="id" value="{{ isset($data->_id) ? $data->_id : '' }}">
                <div class="row">
                  <div class="col-xl">
                    <div class="card mb-4">
                      <div class="card-body">
                      <div class="mb-3">
                            <label class="form-label" for="basic-default-company">JUDUL ARTIKEL</label>
                            <input type="text" class="form-control" name = "judul_artikel" id="basic-default-company judul_artikel" placeholder="judul artikel" value ="{{ isset($data) ? $data['judul_artikel'] : '' }}" />
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">PENULIS ARTIKEL</label>
                            <input type="text" class="form-control" name = "penulis" id="basic-default-company judul_artikel" placeholder="penulis" value ="{{ isset($data) ? $data['penulis'] : '' }}" />
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">PENERBIT ARTIKEL</label>
                            <input type="text" class="form-control" name = "penerbit" id="basic-default-company penerbit" placeholder="penerbit artikel" value ="{{ isset($data) ? $data['penerbit'] : '' }}" />
                          </div>

                          <div class="mb-3">
                                <label class="form-label" for="tanggal_terbit">TANGGAL TERBIT</label>
                                <input type="text" class="form-control" name="tanggal_terbit" id="tanggal_terbit" placeholder="Pilih Tanggal" 
                                    value="{{ isset($data) ? $data['tanggal_terbit'] : '' }}" />
                                <script>
                                    flatpickr("#tanggal_terbit", {
                                        dateFormat: "Y-m-d",
                                        enableTime: false,
                                    });
                                </script>
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">LINK SUMBER</label>
                            <input type="text" class="form-control" name = "link" id="basic-default-company link" placeholder="Link" value ="{{ isset($data) ? $data['link'] : '' }}" />
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">URL GAMBAR</label>
                            <input type="text" class="form-control" name = "gambar" id="basic-default-company gambar" placeholder="Link Gambar" value ="{{ isset($data) ? $data['gambar'] : '' }}" />
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="basic-default-company">ISI ARTIKEL</label>
                            <input type="text" class="form-control" name = "isi_artikel" id="basic-default-company isi_artikel" placeholder="isi artikel" value ="{{ isset($data) ? $data['isi_artikel'] : '' }}" />
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

          