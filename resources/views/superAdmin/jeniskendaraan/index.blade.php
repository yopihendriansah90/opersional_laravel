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
            <a href="{{ route('jeniskendaraan.create') }}" class="btn btn-success">Tambah Jenis Kendaraan</a>
            <table class="table table-border datatable" style=" width: 100%; white-space: nowrap;">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Jensi Kendaraan</th>
                  <th scope="col">Status</th>
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
                        <td class="text-capitalize">{{$row->nama}}</td>
                        <td class="text-uppercase">{{$row->status}}</td>

                        <td>
                            <a href="/superadmin/jeniskendaraan/update/{{$row->id}}" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-info">View</a>
                            {{-- awalan untuk update status --}}

                            <form action="/superadmin/jeniskendaraan/delete/{{$row->id}}" method="post" class="form-basic d-inline">
                                @csrf
                                <input type="hidden" name="status" value="off">
                                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                <button type="submit" class="btn btn-warning"
                                        onclick="return confirm('Apa anda yakin ingin mengubah status jenis kendaraan?')">{{$row->status==='on'?'Off':'On'}}</button>
                            </form>
                            {{-- akhiran untuk update status --}}

                        {{-- untuk softdelete --}}
                            @if ($row->deleted_at===null)
                                <form action="/superadmin/jeniskendaraan/destroy/{{$row->id}}" method="post" class="form-basic d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="off">
                                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>

                            @else


                            {{-- awal untuk restore soft delete --}}

                            <form action="/superadmin/jeniskendaraan/restore/{{$row->id}}" method="post" class="form-basic d-inline">
                                @csrf
                                <input type="hidden" name="status" value="off">
                                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                <button type="submit" class="btn btn-warning"
                                        onclick="return confirm('Apa anda yakin ingin merestore data ini?')">Restore</button>
                            </form>
                            {{-- akhir untuk restore soft delete --}}
                            @endif
                        {{-- akhiran soft delete --}}

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
