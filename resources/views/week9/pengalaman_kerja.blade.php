@extends('layouts.app', ['title' => 'Pengalaman Kerja', 'active' => 'riwayat hidup'])

@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Work Experience</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Entry Year</th>
                            <th>Out Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pengalaman_kerja) == 0)
                            <tr>
                                <td colspan="5" class="text-center">No Data</td>
                            </tr>
                        @else
                            @foreach ($pengalaman_kerja as $pengalaman)
                                <tr>
                                    <td>{{ $pengalaman->nama }}</td>
                                    <td>{{ $pengalaman->jabatan }}</td>
                                    <td>{{ $pengalaman->tahun_masuk }}</td>
                                    <td>{{ $pengalaman->tahun_keluar }}</td>
                                    <td>
                                        <a href="{{ route('week9.kerja.edit', $pengalaman->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                            data-target="#deleteModal" data-id="{{ $pengalaman->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
                @if (session('success'))
                    <div class="alert alert-success">
                        <span class="text-success">{{ session('success') }}</span>
                        <br>
                    </div>
                @endif
                <a href="{{ route('week9.kerja.create') }}" class="btn btn-primary">Add</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete work experience.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{-- <a class="btn btn-primary" href="{{ url('week9/logout') }}">Logout</a> --}}
                    <form action="{{ route('week9.kerja.delete', $pengalaman->id ?? '') }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
