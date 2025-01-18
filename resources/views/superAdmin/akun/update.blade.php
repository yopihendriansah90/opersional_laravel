@extends('layout.head')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Create Data Akun</h5>

            <!-- No Labels Form -->
            <form class="row g-3" action="" method="POST">
                @csrf
                <div class="col-md-12">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{$data->nama}}">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="username" class="form-control" placeholder="Username"  value="{{$data->username}}">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="password" class="form-control" placeholder="Password"  >
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="konfir" class="form-control" placeholder=" Konfirmasi Password"  >
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                   <select  name="roles" id="" class="form-control">
                        <option value="{{$data->roles}}">
                            @if($data->roles== 'driver')
                                Driver
                            @elseif($data->roles == 'mekanik')
                                Mekanik
                            @elseif($data->roles == 'operasional')
                                Operasional
                            @elseif($data->roles == 'admin')
                                Admin
                            @elseif($data->roles == 'superadmin')
                                Superadmin
                            @endif
                        </option>
                        <option value="driver">Driver</option>
                        <option value="mekanik">Mekanik</option>
                        <option value="operasional">Operasional</option>
                        <option value="admin">Admin</option>
                   </select>
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
                </div>
            </form><!-- End No Labels Form -->

            </div>
        </div>
    </div>
</div>


@endsection
