@extends('website.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center margin-div">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">استعاده كلمه المرور</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update1') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $code }}">



                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">كلمه المرور</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تاكيد كلمه المرور</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                       ارسال
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
