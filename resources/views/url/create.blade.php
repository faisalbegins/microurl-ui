@extends('layouts.app')

@section('title', 'Create Short URL')

@section('content')
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Create Short URL</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <form method="POST" action="{{ route('urls.store') }}">
                    @csrf
                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Long URL</label>
                        <div class="col-sm-10">
                            <input type="text" name="longUrl" placeholder="Long URL" class="form-control @error('longUrl') is-invalid @enderror" value="{{ old('longUrl') }}">
                            @error('longUrl')
                            <span class="invalid-feedback text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
