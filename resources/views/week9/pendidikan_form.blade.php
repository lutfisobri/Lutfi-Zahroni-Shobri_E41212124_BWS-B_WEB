@extends('layouts.app', ['title' => 'Riwayat Pendidikan', 'active' => 'riwayat hidup'])

@section('content')
@php
    use Illuminate\Database\Eloquent\Model;
@endphp
{{-- create form --}}
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Riwayat Pendidikan</h6>
    </div>
    <div class="card-body">
        @php
            $pendidikan = $pendidikans ?? null;
            $isEdit = false;
            if ($pendidikan != null && $pendidikan->id != null) {
                $isEdit = true;
            }
            $pendidikan = $pendidikan;
        @endphp
        <form action="{{ $pendidikan != null && $pendidikan->id != null ? route('week9.pendidikan.update', ['id' => $pendidikan->id]) : route('week9.pendidikan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Sekolah</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Name" required value="{{ $isEdit ? $pendidikan->nama : old('nama') }}">
                @if ($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="jabatan">Tingkatan</label>
                <select class="form-control" name="tingkatan" id="tingkatan" required>
                    <option value="1">TK</option>
                    <option value="2">SD</option>
                    <option value="3">SMP</option>
                    <option value="4">SMA/SMK</option>
                    <option value="5">D3</option>
                    <option value="6">S1/D4</option>
                    <option value="7">S2</option>
                    <option value="8">S3</option>
                    @if ($errors->has('tingkatan'))
                        <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                        
                    @endif
                </select>
                {{-- <input type="" name="jabatan" id="jabatan" class="form-control" placeholder="Position" required value="{{ $isEdit ? $pendidikan->jabatan : old('jabatan') }}"> --}}
            </div>
            <div class="form-group">
                <label for="tahun_masuk">Tahun Masuk</label>
                <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" placeholder="Entry Year (2000)" required value="{{ $isEdit ? $pendidikan->tahun_masuk : old('tahun_masuk') }}">
                @if ($errors->has('tahun_masuk'))
                    <span class="text-danger">{{ $errors->first('tahun_masuk') }}</span>
                    
                @endif
            </div>
            <div class="form-group">
                <label for="tahun_selesai">Tahun Selesai</label>
                <input type="datetime" name="tahun_selesai" id="tahun_selesai" class="form-control" placeholder="Out Year (2000)" required value="{{ $isEdit ? $pendidikan->tahun_selesai : old('tahun_selesai') }}">
                @if ($errors->has('tahun_selesai'))
                    <span class="text-danger">{{ $errors->first('tahun_selesai') }}</span>
                    
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection