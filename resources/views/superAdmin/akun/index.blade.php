@extends('layout.head')
@section('content')
    <!-- Recent Sales -->
        <div class="card recent-sales overflow-auto">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Recent Sales <span>| Today</span></h5>
            {{-- create account button --}}
            <a href="{{ route('user.create') }}" class="btn btn-success">Create Account</a>

            <table class="table table-border datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Username</th>
                  <th scope="col">Roles</th>
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
                        <td>{{$row->nama}}</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->roles}}</td>
                        <td>
                        @if (is_null($row->deleted_at))
                            <span class="text-success">Aktif</span>
                        @else
                            <span class="text-danger">Sudah Dihapus</span>
                        @endif
                        </td>
                        <td>
                            <a href="/superadmin/user/update/{{$row->id}}" class="btn btn-success">Edit</a>
                            {{-- <a href="" class="btn btn-info">View</a> --}}

                            <button type="button" class="btn btn-sm btn-info view-button" data-id="{{ $row->id }}" data-bs-toggle="modal" data-bs-target="#viewModal">View</button>
                            {{-- ... tombol/form lain ... --}}

                            @if ($row->deleted_at===null)
                                <form action="/superadmin/user/delete/{{$row->id}}" method="post" class="form-basic d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="off">
                                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apa anda yakin ingin menghapus data ini?')">Delete</button>
                                </form>

                            @else


                            {{-- awal untuk restore soft delete --}}

                            <form action="/superadmin/user/restore/{{$row->id}}" method="post" class="form-basic d-inline">
                                @csrf
                                <input type="hidden" name="status" value="off">
                                {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                <button type="submit" class="btn btn-warning"
                                        onclick="return confirm('Apa anda yakin ingin merestore data ini?')">Restore</button>
                            </form>
                            {{-- akhir untuk restore soft delete --}}


                            @endif












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

        {{-- membuat modal bootstap --}}
        <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewModalLabel">Detail User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modal-body-content">
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- script untuk menampilkan data di view modal bootstrap --}}
        <script>
            $(document).ready(function() {
                $('.view-button').click(function() {
                    var userId = $(this).data('id');
                    console.log('2');
                    $.ajax({
                        url: '/superadmin/user/' + userId, // Route untuk mengambil detail user
                        type: 'GET',
                        success: function(response) {
                            $('#modal-body-content').html(response); // Tampilkan response di modal
                            $('#viewModal').modal('show');
                        },
                        error: function(error) {
                            console.error("Error:", error);
                            alert('Terjadi kesalahan saat memuat data.'); // Tampilkan pesan error jika request gagal
                        }
                    });
                });
            });
        </script>

<script>
    // Kode jQuery Anda di sini
console.log('halo')
</script>
@endsection
