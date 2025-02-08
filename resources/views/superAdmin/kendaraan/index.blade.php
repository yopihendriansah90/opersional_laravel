@extends('layout.head')
@section('content')
    <!-- Recent Sales -->
        <div class="card recent-sales overflow-auto">

          <div class="card-body">
            <h5 class="card-title">Data Kendaraan <span>| Today</span></h5>
            <a href="{{route('kendaraan.create')}}" class="btn btn-success">Tambah Kendaraan</a>
            <table class="table table-border datatable" style=" width: 100%; white-space: nowrap;">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nomor Pintu</th>
                  <th scope="col">Jenis Kendaraan</th>
                  <th scope="col">Nomor Polisi</th>
                  <th scope="col">Warna Kendaraan</th>
                  <th scope="col">Warna TNKB</th>
                  <th scope="col">Nomor Rangka</th>
                  <th scope="col">Nomor Mesin</th>
                  <th scope="col">Isi Silinder</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $no =1;

                ?>
                @forelse ( $data as $row )
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$row->no_pintu}}</td>
                        <td>{{$row->Jeniskendaraan->nama}}</td>

                        <td>{{$row->no_polisi}}</td>
                        <td>{{$row->warna_kendaraan}}</td>
                        <td>{{$row->warna_tnbk}}</td>
                        <td>{{$row->no_rangka}}</td>
                        <td>{{$row->no_mesin}}</td>
                        <td>{{$row->isi_silinder}} CC</td>
                        <td>
                            <a href="/superadmin/kendaraan/edit/{{$row->id}}" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-info">View</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Invalid Data Not Found</td>
                    </tr>

                @endforelse

              </tbody>
            </table>
          </div>
        </div><!-- End Recent Sales -->
@endsection
