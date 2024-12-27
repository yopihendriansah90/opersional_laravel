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
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                   <select  name="roles" id="" class="form-control">
                        <option selected disabled>Pilih Roles</option>
                        <option value="driver">Driver</option>
                        <option value="mekanik">Mekanik</option>
                        <option value="operasional">Operasional</option>
                        <option value="admin">Admin</option>
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

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Create Data Akun</h5>

            <!-- No Labels Form -->
            <form class="row g-3" action="" method="POST">
                @csrf
                <div class="col-md-12">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                   <select  name="roles" id="" class="form-control">
                        <option selected disabled>Pilih Roles</option>
                        <option value="driver">Driver</option>
                        <option value="mekanik">Mekanik</option>
                        <option value="operasional">Operasional</option>
                        <option value="admin">Admin</option>
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
