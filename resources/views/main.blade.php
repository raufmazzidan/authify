<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>

<body class="bg-purple flex items-center justify-center h-screen">
  <div class="max-w-md w-full m-auto bg-white rounded p-8">
    <img src="{{asset('./img/logo.png')}}" class="w-40 mb-4 m-auto">
    <div class="bg-grey h-px w-full mt-4 mb-4"></div>
    <h1 class="text-2xl font-semibold text-left mt-4">Account Detail</h1>
    <div class="grid grid-cols-2 gap-4 mb-8 mt-4">
      <div>
        <h5 class="text-xs text-grey-dark">NAMA LENGKAP</h5>
        <p class="text-lg">{{auth()->user()->name}}</p>
      </div>
      <div>
        <h5 class="text-xs text-grey-dark">TANGGAL LAHIR</h5>
        <p class="text-lg">{{auth()->user()->dob}}</p>
      </div>
      <div class="col-span-2">
        <h5 class="text-xs text-grey-dark">EMAIL</h5>
        <p class="text-lg">{{auth()->user()->email}}</p>
      </div>
      <div class="col-span-2">
        <h5 class="text-xs text-grey-dark">UPDATED AT</h5>
        <p class="text-lg">{{auth()->user()->updated_at}}</p>
      </div>
    </div>

    @auth
    <form action="/logout" method="post">
      @csrf
      <button type="submit" class="mt-4 px-6 w-full bg-purple py-3 text-xs text-white uppercase font-bold rounded">
        Logout
      </button>
    </form>
    @endauth

  </div>
</body>

</html>
