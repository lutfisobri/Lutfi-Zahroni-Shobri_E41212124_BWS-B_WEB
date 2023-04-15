{{-- @extends('backend/layouts.template') --}}

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"> <i class="icon_document_all">Riwayat Hidup</i></h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="{{ url('dashboard') }}">Home</a></li>
                    <li><i class="icon_document_alt"></i>Riwayat Hidup</li>
                    <li><i class="fa fa-files-o"></i>Pengalaman Kerja</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">Pengalama Kerja</header>
                    <div class="panel-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                            <a href="{{ route('kerja.create') }}">
                                <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus"></i> Tambah</button>
                            </a>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>