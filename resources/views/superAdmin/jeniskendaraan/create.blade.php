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
