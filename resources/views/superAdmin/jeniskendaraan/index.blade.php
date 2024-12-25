@extends('layout.head')
@section('content')
    <!-- Recent Sales -->
        <div class="card recent-sales overflow-auto">

          {{-- <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div> --}}

          <div class="card-body">
            <h5 class="card-title">Data Jenis Kendaraan <span>| Today</span></h5>
            <a href="{{ route('jeniskendaraan.create') }}" class="btn btn-success">Create Jenis Kendaraan</a>
            <table class="table table-border datatable" style=" width: 100%; white-space: nowrap;">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Jensi Kendaraan</th>

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
                        <td>{{$row->nama}}</td>

                        <td>
                            <a href="" class="btn btn-success">Edit</a>
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
