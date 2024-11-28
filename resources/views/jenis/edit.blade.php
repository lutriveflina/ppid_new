@extends('layouts.app')

@section('content')
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ $error }}</strong>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-12">
            <div class="pull-left">
                <a href="{{ route('jenis.index') }}" class="btn btn-icon btn-outline-primary mr-1 mb-1">
                    <i class="feather icon-skip-back"></i>
                </a>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Jenis {{ $jenis->jenis }}</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('jenis.update', $jenis->id) }}" method="POST" class="form">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="jenis" class="form-control" placeholder="Jenis" name="jenis" value="{{ $jenis->jenis }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection