@extends('layouts.admin') 
@section('breadcumb')
<section class="content-header">
    <h1>
        Input Data
        <small>Kuesioner</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Input</li>
    </ol>
</section>
@endsection
 
@section('content')
<section class="content">
    @if (Session::get('success'))
        <div class="callout callout-success">
            <h4>Sukses mengupload data pertanyaan kuesioner!</h4>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Input Pertanyaan Kuesioner</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{ route('import.emotional') }}" method="post" enctype="multipart/form-data" role="form">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Pertanyaan Kuesioner</label>
                            <input name="excel_data" type="file" id="exampleInputFile" required>
                            <p class="help-block">Masukan file excel berisi daftar pertanyaan kuesioner dengan format kolom yang sesuai</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit " class="btn btn-primary btn-block btn-flat ">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection