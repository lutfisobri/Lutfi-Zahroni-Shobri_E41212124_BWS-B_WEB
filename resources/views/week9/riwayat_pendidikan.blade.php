@extends('layouts.app', ['title' => 'Riwayat Pendidikan', 'active' => 'pendidikan'])

@section('content')
    @php
        $pendidikan = null;
    @endphp
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Pendidikan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tingkatan</th>
                            <th>Tahun Masuk</th>
                            <th>Tahun Keluar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pendidikans) == 0)
                            <tr>
                                <td colspan="5" class="text-center">No Data</td>
                            </tr>
                        @else
                            @php
                                function pendidikan($value)
                                {
                                    switch ($value) {
                                        case '1':
                                            return 'Tk';
                                            break;
                                        case '2':
                                            return 'SD';
                                            break;
                                        case '3':
                                            return 'SMP';
                                            break;
                                        case '4':
                                            return 'SMA/SMK';
                                            break;
                                        case '5':
                                            return 'D3';
                                            break;
                                        case '6':
                                            return 'S1/D4';
                                            break;
                                        case '7':
                                            return 'S2';
                                            break;
                                        case '8':
                                            return 'S3';
                                            break;
                                    }
                                }
                            @endphp
                            @foreach ($pendidikans as $pendidikan)
                                <tr>
                                    <td>{{ $pendidikan->nama }}</td>
                                    <td>{{ pendidikan($pendidikan->tingkatan) }}</td>
                                    <td>{{ $pendidikan->tahun_masuk }}</td>
                                    <td>{{ $pendidikan->tahun_selesai }}</td>
                                    <td>
                                        <a href="{{ route('week9.pendidikan.edit', $pendidikan->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a class="btn btn-sm btn-danger" href="#" data-toggle="modal"
                                            data-target="#deleteModal" data-id="{{ $pendidikan->id }}">Delete</a>
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
                <a href="{{ route('week9.pendidikan.create') }}" class="btn btn-primary">Add</a>
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
                    @if (count($pendidikans) > 0 && $pendidikan != null)
                        <form action="{{ route('week9.pendidikan.delete', $pendidikan->id) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
