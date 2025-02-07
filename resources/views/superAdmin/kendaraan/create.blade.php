@extends('layout.head')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h5 class="card-title">Create Data Kendaraan</h5>
            <!-- No Labels Form -->
            <form class="row g-3" action="" method="POST">
                @csrf
                <div class="col-md-12">

                    <input type="text" name="no_pintu" class="form-control" placeholder="Nomor Pintu">
                    @error('no_pintu')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <select name="id_jenis_kendaraan" id="" class="form-control">
                        <option disabled selected>Pilih Jenis Driver</option>
                        @foreach ( $jeniskendaraan as $row )
                            <option value="{{$row->id}}">{{$row->nama}}</option>
                        @endforeach
                     </select>

                </div>



                <div class="col-md-12">
                    <input type="text" name="no_polisi" class="form-control" placeholder="Nomor Polisi/Plat Nomor">
                    @error('no_polisi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="warna_kendaraan" class="form-control" placeholder="Warna Kendaraan">
                    @error('warna_kendaraan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="warna_tnbk" class="form-control" placeholder="Warna TNKB">
                    @error('warna_tnbk')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="no_rangka" class="form-control" placeholder="Nomor Rangka">
                    @error('no_rangka')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <input type="text" name="no_mesin" class="form-control" placeholder="Nomor Mesin">
                    @error('no_mesin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12">
                    <input type="text" name="isi_silinder" class="form-control" placeholder="Isi Silinder">
                    @error('isi_silinder')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row mt-3">
                    <div class="text-center">
                        <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>



                        <button type="reset" class="btn btn-secondary ">Reset</button>
                        <button type="submit" class="btn btn-primary">Create</button>


                     </div>

                </div>
            </form><!-- End No Labels Form -->

            </div>
        </div>
    </div>
</div>


@endsection
