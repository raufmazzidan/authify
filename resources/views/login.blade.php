@extends('layout/auth')

@section('app')
<div class="max-w-xs w-full text-center">
    <img src="{{asset('./img/logo.png')}}" class="w-40 mb-4 m-auto">
    <h1 class="text-2xl font-semibold">Login</h1>
    <p class="text-grey-dark mt-4 mb-6">Selamat datang di Authify</p>
    <p id="errorMessage" class="text-xs text-red mb-6">{{session('errorMessage')}}</p>

    @if(session()->has('successMessage'))
    <p id="successMessage" class="text-xs text-green mb-6">{{session('successMessage')}}</p>
    @endif
    <form action="/login" method="post">
        @csrf
        <div class="form-container text-left">
            <label @error('email') class="label-error" @enderror for="email">Email</label>
            <input @error('email') class="input-error" @enderror type="text" id="email" name="email"
                placeholder="Masukkan Email" value={{old('email')}}>
            @error('email')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>

        <div class="form-container text-left">
            <label @error('password') class="label-error" @enderror for="password">Password</label>
            <input @error('password') class="input-error" @enderror type="password" id="password" name="password"
                placeholder="Masukkan Password" value={{old('password')}}>
            @error('password')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <div class="flex items-center gap-4">
            <span>{!! captcha_img() !!}</span>
            <button class="w-10 h-10 bg-purple text-white uppercase text-xl rounded">
                &#x21bb;
            </button>
        </div>
        <div class="form-container text-left mt-4">
            <input @error('captcha') class="input-error" @enderror type="text" id="captcha" name="captcha"
                placeholder="Masukkan Captcha" value={{old('captcha')}}>
            @error('captcha')
            <span class="text-xs text-red mt-1">{{$message}}</span>
            @enderror
        </div>
        <a href="/forgot-password" class="text-sm text-purple text-right block">Lupa Password</a>
        <button id="login" class="mt-4 px-6 w-full bg-purple py-3 text-xs text-white uppercase font-bold rounded">
            Login
        </button>
    </form>
    <div class="bg-grey h-px w-full mt-8 mb-2"></div>
    <span class="text-sm text-grey-dark">
        Tidak punya akun?
        <a href="/register" class="text-purple">Register</a>
    </span>
</div>
@endsection

@section('script')
<script>
    let counter = {{ Session::get('count') }};
    let message = "{{ Session::get('errorMessage') }}";
    console.log({counter, message})

    const btnLogin = document.getElementById("login");
    const errorMessage = document.getElementById("errorMessage");

    if (counter > 0) {
        const interval = setInterval(function() {
          counter = counter - 1;
          if (counter > 0) {
            btnLogin.disabled = true
            errorMessage.innerHTML = `${message} Coba lagi dalam ${counter} detik.`
          } else {
            clearInterval(interval);
            errorMessage.innerHTML = ""
            btnLogin.disabled = false
          }
        }, 1000);
    }


  const successMessage = document.getElementById("successMessage");
  setTimeout(() => {
    successMessage.innerHTML = ""
  }, 3000);

</script>
@endsection