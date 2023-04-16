@extends('layout/auth')

@section('app')
<div class="max-w-xs w-full text-center">
  <h1 class="text-2xl font-semibold">Daftar</h1>
  <p class="text-grey-dark mt-4 mb-6">Masukkan data diri anda untuk mendaftar ke Authify</p>
  <form action="/register" method="post">
    @csrf
    <div class="form-container text-left">
      <label @error('name') class="label-error" @enderror for="name">Nama Lengkap</label>
      <input @error('name') class="input-error" @enderror type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap" value={{old('name')}}>
      @error('name')
      <span class="text-xs text-red mt-1">{{$message}}</span>
      @enderror
    </div>
    <div class="form-container text-left">
      <label @error('email') class="label-error" @enderror for="email">Email</label>
      <input @error('email') class="input-error" @enderror type="text" id="email" name="email" placeholder="Masukkan Email" value={{old('email')}}>
      @error('email')
      <span class="text-xs text-red mt-1">{{$message}}</span>
      @enderror
    </div>
    <div class="form-container text-left">
      <label @error('dob') class="label-error" @enderror for="dob">Tanggal Lahir</label>
      <input @error('dob') class="input-error" @enderror type="date" id="dob" name="dob" value={{old('dob')}}>
      @error('dob')
      <span class="text-xs text-red mt-1">{{$message}}</span>
      @enderror
    </div>
    <div class="form-container text-left">
      <label @error('password') class="label-error" @enderror for="password">Password</label>
      <input @error('password') class="input-error" @enderror type="password" id="password" name="password" placeholder="Masukkan Password" value={{old('password')}}>
      @error('password')
      <span class="text-xs text-red mt-1">{{$message}}</span>
      @enderror
    </div>
    <button class="mt-4 px-6 w-full bg-purple py-3 text-xs text-white uppercase font-bold rounded">
      Daftar
    </button>
  </form>
  <div class="bg-grey h-px w-full mt-8 mb-2"></div>
  <span class="text-sm text-grey-dark">
    Sudah punya akun?
    <a href="/login" class="text-purple">Login</a>
  </span>

</div>
@endsection
