<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | SCCR</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/coba.css') }}">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Tailwind -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/fontawesome.min.css" integrity="sha512-xX2rYBFJSj86W54Fyv1de80DWBq7zYLn2z0I9bIhQG+rxIF6XVJUpdGnsNHWRa6AvP89vtFupEPDP8eZAtu9qA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>

<body>
 <div class="lg:flex">
            <div class="lg:flex bg-cover flex-1 " style="background-image: url(../img/bg-auth.jpg)" >
            </div>
            <div class="lg:w-1/2 xl:max-w-screen-sm">
                <div class="py-6 bg-gray-400 mb-6 lg:bg-white flex justify-center lg:justify-start lg:px-12">
                    <div class="cursor-pointer flex items-center">
                        <div>
                            <svg class="w-10 text-gray-500" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 225 225" style="enable-background:new 0 0 225 225;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:none;stroke:currentColor;stroke-width:20;stroke-linecap:round;stroke-miterlimit:3;}
                                </style>
                                <g transform="matrix( 1, 0, 0, 1, 0,0) ">
                                <g>
                                <path id="Layer0_0_1_STROKES" class="st0" d="M173.8,151.5l13.6-13.6 M35.4,89.9l29.1-29 M89.4,34.9v1 M137.4,187.9l-0.6-0.4     M36.6,138.7l0.2-0.2 M56.1,169.1l27.7-27.6 M63.8,111.5l74.3-74.4 M87.1,188.1L187.6,87.6 M110.8,114.5l57.8-57.8"/>
                                </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-4 xl:px-24 xl:max-w-2xl">
                    <h2 class="text-center text-4xl text-gray-600 font-display font-semibold lg:text-left xl:text-5xl
                    xl:text-bold">Daftar</h2>                        
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::has('status'))
                    <div class="alert alert-warning" role="alert">
                        {{ Session::get('status')}}
                    </div>
                    @endif
                    <div class="mt-12">
                        <form action="{{ url('register') }}" method="post">
                            @csrf
                            <div>
                                <div class="text-sm font-bold text-gray-700 tracking-wide">Nama </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-blue-500" type="text" name="name_user" placeholder="SCCR Admin">
                            </div>            
                            <div>
                                <div class="mt-4 text-sm font-bold text-gray-700 tracking-wide">Alamat Email </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-blue-500" type="email" name="email" placeholder="sccr@gmail.com">
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Password
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-blue-500" type="password" name="password" placeholder="Masukan Password">
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between items-center">
                                    <div class="text-sm font-bold text-gray-700 tracking-wide">
                                        Konfirmasi Password
                                    </div>
                                </div>
                                <input class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-blue-500" type="password" name="password_confirmation" placeholder="Masukan Konfirmasi Password">
                            </div>
                            <div>
                                <div class="mt-4 text-sm font-bold text-gray-700 tracking-wide">Level Akses </div>
                                <select class="w-full pl-4 text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-blue-500" name="level" id="level">
                                    <option >Pilih level akses</option>
                                    <option value="1">Manager</option>
                                    <option value="2">PJ Logistic</option>
                                    <option value="3">User All Reagen</option>
                                    <option value="4">User Reagen Riset</option>
                                    <option value="5">User Reagen Kultur</option>
                                </select>

                            </div>

                            <div class="mt-10">
                                <button type="submit" name="submit" 
                                class="bg-gray-500 text-gray-100 p-4 w-full rounded-full tracking-wide
                                font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-gray-600
                                shadow-lg">
                                    Daftar
                                </button>
                            </div>
                        </form>
                        <div class="mt-6 mb-6 text-sm font-display font-semibold text-gray-700 text-center">
                        Sudah punya akun? <a href="login" class="cursor-pointer text-blue-600 hover:text-blue-800">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>
