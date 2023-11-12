

@extends('layouts.main')
@section('container')

    <!--body-->

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-1">
                <a href="/" class="btn btn-primary"><i class="bi bi-arrow-left"></i>Kembali</a>
            </div>
            <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
                </nav>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-person-fill"></i> My Profile</h4>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nama </td>
                                    <td>: </td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Username </td>
                                    <td>: </td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td>Email </td>
                                    <td>: </td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Alamat </td>
                                    <td>: </td>
                                    <td>{{ $user->alamat }}</td>
                                </tr>
                                <tr>
                                    <td>No Handphone </td>
                                    <td>: </td>
                                    <td>{{ $user->nohp }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h4><i class="bi bi-pencil-square"></i> Edit Profile</h4>
                        <form action="{{ url('profil') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-end">{{ __('Name') }}</label>

                                <div class="col-md-4">
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" 
                                    name="name" required autocomplete="name" value="{{ $user->name }} ">
                                    @error('name')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-label  text-end">{{ ('E-mail Address') }}</label>

                                <div class="col-md-4">
                                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                    name="email" required autocomplete="email" value="{{ $user->email }} ">
                                    @error('email')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-2 col-form-label  text-end">{{ ('Username') }}</label>

                                <div class="col-md-4">
                                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" 
                                    name="username" required autocomplete="username" value="{{ $user->username }} ">
                                    @error('username')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-md-2 col-form-label  text-end">Alamat</label>

                                <div class="col-md-4">
                                    <textarea id="alamat" cols="58" rows="5" 
                                    class="form-control @error('alamat') is-invalid @enderror" 
                                    name="alamat" required="">{{ $user->alamat }}</textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nohp" class="col-md-2 col-form-label  text-end">No Handphone</label>

                                <div class="col-md-4">
                                    <input type="text" id="nohp" class="form-control @error('nohp') is-invalid @enderror" 
                                    name="nohp" autocomplete="nohp" value="{{ $user->nohp }}" required>
                                    @error('nohp')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-2 col-form-label  text-end">Password</label>

                                <div class="col-md-4">
                                    <input type="password" id="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" autocomplete="password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-2">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Save
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