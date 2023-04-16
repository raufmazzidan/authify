@extends('layout/auth')

@section('app')
<div class="max-w-xs w-full text-center">
  <h1 class="text-2xl font-semibold">Lupa Password</h1>
  <p class="text-grey-dark mt-4 mb-6">Masukkan email untuk me-reset akun Authify anda</p>
  <p id="errorMessage" class="text-xs text-red mb-6">{{session('errorMessage')}}</p>

  @if(session()->has('successMessage'))
  <p id="successMessage" class="text-xs text-green mb-6">{{session('successMessage')}}</p>
  @endif
  <form action="/forgot-password" method="post">
    @csrf
      <div class="form-container text-left">
        <label @error('email') class="label-error" @enderror for="email">Email</label>
        <input @error('email') class="input-error" @enderror type="text" id="email" name="email" placeholder="Masukkan Email" value={{old('email')}}>
        @error('email')
        <span class="text-xs text-red mt-1">{{$message}}</span>
        @enderror
      </div>
      <button class="mt-4 px-6 w-full bg-purple py-3 text-xs text-white uppercase font-bold rounded">
        Submit
      </button>
  </form>
  <div class="bg-grey h-px w-full mt-8 mb-2"></div>
  <span class="text-sm text-grey-dark">
    Sudah ingat akun anda?
    <a href="/login" class="text-purple">Login</a>
  </span>

</div>
@endsection
