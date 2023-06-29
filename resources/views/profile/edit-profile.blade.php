@extends('layouts.main')

@section('content')
    <nav>
        <h4>Edit Profile</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                {{-- button tambah Profile --}}
                <div class="card-body" style="padding-top: 20px">
                    <form action="{{ route('update-profile', $data->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{ $data->email }}" required>
                        </div>
                        <div class="footer">
                            <button type="submit" class="btn btn-primary" id="add-btn">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
