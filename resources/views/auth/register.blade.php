@extends('layouts.app')

@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-danger text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Please enter an email and a password!</p>

                                <form method="POST" action="{{route('register')}}">
                                    @csrf

                                    @if ($errors->has('email'))
                                        <span class="error">
                                          {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                    <div class="form-outline form-white mb-4">
                                        <input class="form-control form-control-lg" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus/>
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="error">
                                          {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                    <div class="form-outline form-white mb-4">
                                        <input id="password" type="password" name="password" required class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input id="password-confirm" type="password" name="password_confirmation" required class="form-control form-control-lg">
                                        <label for="password-confirm">Confirm Password</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

                                </form>

                            </div>

                            <div>
                                <p class="mb-0">Already have an account? <a href="{{route('login')}}" class="text-white-50 fw-bold">Login</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
