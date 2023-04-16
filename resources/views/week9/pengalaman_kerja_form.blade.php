@extends('layouts.app', ['title' => 'Pengalaman Kerja', 'active' => 'riwayat hidup'])

@section('content')
@php
    use Illuminate\Database\Eloquent\Model;
@endphp
{{-- create form --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Work Experience</h6>
    </div>
    <div class="card-body">
        @php
            $pengalaman_kerja = $pengalaman_kerja ?? null;
            $isEdit = false;
            if ($pengalaman_kerja != null && $pengalaman_kerja->id != null) {
                $isEdit = true;
            }
            $kerja = $pengalaman_kerja;
        @endphp
        <form action="{{ $pengalaman_kerja != null && $pengalaman_kerja->id != null ? route('week9.kerja.update', ['id' => $pengalaman_kerja->id]) : route('week9.kerja.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Company Name</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Name" required value="{{ $isEdit ? $kerja->nama : old('nama') }}">
                @if ($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="jabatan">Position</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Position" required value="{{ $isEdit ? $kerja->jabatan : old('jabatan') }}">
                @if ($errors->has('jabatan'))
                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                    
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_masuk">Entry Year</label>
                <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" placeholder="Entry Year (2000)" required value="{{ $isEdit ? $kerja->tahun_masuk : old('tahun_masuk') }}">
                @if ($errors->has('tahun_masuk'))
                    <span class="text-danger">{{ $errors->first('tahun_masuk') }}</span>
                    
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_keluar">Out Year</label>
                <input type="datetime" name="tahun_keluar" id="tahun_keluar" class="form-control" placeholder="Out Year (2000)" required value="{{ $isEdit ? $kerja->tahun_keluar : old('tahun_keluar') }}">
                @if ($errors->has('tahun_keluar'))
                    <span class="text-danger">{{ $errors->first('tahun_keluar') }}</span>
                    
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection