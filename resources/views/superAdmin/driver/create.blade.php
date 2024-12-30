@extends('layout.head')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Tambahkan Data Driver</h5>

            <!-- No Labels Form -->
            <form class="row g-3" action="" method="POST">
                @csrf
                <div class="col-md-12">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap Driver">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <input type="text" name="no_ktp" class="form-control" placeholder="Nomor NIK KTP">
                    @error('no_ktp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="no_hp" class="form-control" placeholder="Nomor HP">
                    @error('no_hp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat lengkap">
                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="email" class="form-control" placeholder="Aalamat Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="no_sim" class="form-control" placeholder="Nomor SIM">
                    @error('no_sim')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="email" class="form-control" placeholder="Aalamat Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="email" class="form-control" placeholder="Aalamat Email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <select  name="jenis_sim" id="" class="form-control">
                        <option selected disabled >Pilih Jenis SIM</option>
                        <option value="SIM A">SIM A</option>
                        <option value="SIM B I">SIM B I</option>
                        <option value="SIM B II">SIM B II</option>
                        <option value="SIM C">SIM C</option>
                        <option value="SIM C I">SIM C I</option>
                        <option value="SIM C II">SIM C II</option>
                        <option value="SIM D">SIM D</option>
                        <option value="SIM A Umum">SIM A Umum</option>
                        <option value="SIM B I Umum">SIM B I Umum</option>
                        <option value="SIM B II Umum">SIM B II Umum</option>
                    </select>
                 </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End No Labels Form -->

            </div>
        </div>
    </div>


</div>


@endsection
