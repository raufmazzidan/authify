@extends('layout/auth')

@section('app')
<div class="max-w-xs w-full text-center">
  <h1 class="text-2xl font-semibold">Reset Password</h1>
  <p class="text-grey-dark mt-4 mb-6">Masukkan password baru untuk mereset akun Authify anda</p>
  @if(session()->has('errorMessage'))
  <p id="errorMessage" class="text-xs text-green mb-6">{{session('errorMessage')}}</p>
  @endif
  <form action="/reset-password" method="post">
    @csrf
    <input type="hidden" name="token" value="{{request()->token}}">
    <input type="hidden" name="email" value="{{request()->email}}">
    <div class="form-container text-left">
        <label for="Email">Email</label>
        <input type="text" disabled id="mail" name="mail" placeholder="Masukkan Email" value={{request()->email}}>
        @error('email')
        <span class="text-xs text-red mt-1">{{$message}}</span>
        @enderror
      </div>
    <div class="form-container text-left">
      <label @error('password') class="label-error" @enderror for="password">Password Baru</label>
      <input @error('password') class="input-error" @enderror type="password" id="password" name="password" placeholder="Masukkan Password">
      @error('password')
      <span class="text-xs text-red mt-1">{{$message}}</span>
      @enderror
    </div>
    <button class="mt-4 px-6 w-full bg-purple py-3 text-xs text-white uppercase font-bold rounded">
      Submit
    </button>
  </form>
</div>
@endsection
