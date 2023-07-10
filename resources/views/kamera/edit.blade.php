@extends('layouts.main')

@section('content')

<div id="app">
    <div class="main-wrapper">
      <div class="main-content">
        <div class="container">
          <form method="post" action= "{{ route('kamera.update' , $data->id_kamera) }}" 
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card mt-5">
              <div class="card-header">
                <h3>Edit Kamera</h3>
              </div>
              <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <div class="alert-title"><h4>Whoops!</h4></div>
                        There are some problems with your input.
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                    </div> 
                  @endif

                  @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

                  @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                  @endif
                  <div class="mb-3">
                    <label class="form-label">ID</label>
                      <h1>{{ $data->id_kamera }}</h1>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Kamera</label>
                    <input type="text" class="form-control" name="nama_kamera" value="{{ $data->nama_kamera }}"  placeholder="Nama kamera">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" value="{{ $data->keterangan }}"  placeholder="Keterangan kamera">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Harga Sewa / Jam</label>
                    <input type="text" class="form-control" name="harga_sewa" value="{{ $data->harga_sewa }}"  placeholder="Harga sewa kamera perjam">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="text" class="form-control" name="stok_kamera" value="{{ $data->stok_kamera }}"  placeholder="Stock">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Type</label>
                    <input type="text" class="form-control" name="type_kamera" value="{{ $data->type_kamera }}"  placeholder="Type kamera">
                  </div>
                  @if ($data->image_kamera)
                    <div class="mb-3">
                        <img style="max-width:100px;max-height:100px" src="{{ url('image_kamera').'/'.$data->image_kamera }}" alt="">
                    </div>
                      
                  @endif
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image_kamera" id="image_kamera">
                  </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Create</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection