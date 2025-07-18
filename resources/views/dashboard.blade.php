<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Score Board</title>
    <link rel="icon" type="image/png" href="{{ asset('public/img/ico.png') }}" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('cdn')
    <style>
        body {
            background: url("https://4kwallpapers.com/images/wallpapers/macos-big-sur-apple-layers-fluidic-colorful-dark-wwdc-2020-3840x2160-1432.jpg");
            background-size: cover;
        }

        @font-face {
            font-family: 'CustomFont';
            /* ตั้งชื่อฟอนต์ */
            src: url('{{ asset('public/digital-7.monoitalic.ttf') }}') format('woff2'),
                /* รูปแบบไฟล์ */
                url('{{ asset('public/digital-7.monoitalic.ttf') }}') format('woff');
        }

        .fontn {
            font-family: 'CustomFont', sans-serif;
        }

        .box {
            background-color: rgba(0, 0, 0, 0.575);
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            -webkit-box-shadow: 30px 30px 35px rgba(0, 0, 0, 0.25);
            box-shadow: 30px 30px 35px rgba(0, 0, 0, 0.25);
            border: 2px solid rgba(0, 0, 0, 0.1);
        }

        .bgn {
            background: rgb(0, 0, 0);
            background: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(255, 244, 0, 1) 100%);
        }

        /* CSS */
        .button-01 {
            align-items: center;
            appearance: none;
            background-color: #007BFF;
            border-radius: 25px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #9ecdff 0 -3px 0 inset;
            box-sizing: border-box;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-01:focus {
            box-shadow: #9ecdff 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #9ecdff 0 -3px 0 inset;
        }

        .button-01:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #9ecdff 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-01:active {
            box-shadow: #9ecdff 0 3px 7px inset;
            transform: translateY(2px);
        }

        /* CSS */
        .button-02 {
            align-items: center;
            appearance: none;
            background-color: #28A745;
            border-radius: 25px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #a0fdb6 0 -3px 0 inset;
            box-sizing: border-box;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-02:focus {
            box-shadow: #a0fdb6 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #a0fdb6 0 -3px 0 inset;
        }

        .button-02:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #a0fdb6 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-02:active {
            box-shadow: #a0fdb6 0 3px 7px inset;
            transform: translateY(2px);
        }

        /* CSS */
        .button-03 {
            align-items: center;
            appearance: none;
            background-color: #DC3545;
            border-radius: 25px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #ff9fa9 0 -3px 0 inset;
            box-sizing: border-box;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-03:focus {
            box-shadow: #ff9fa9 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #ff9fa9 0 -3px 0 inset;
        }

        .button-03:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #ff9fa9 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-03:active {
            box-shadow: #ff9fa9 0 3px 7px inset;
            transform: translateY(2px);
        }

        /* CSS */
        .button-04 {
            align-items: center;
            appearance: none;
            background-color: #FD7E14;
            border-radius: 25px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #fcc89e 0 -3px 0 inset;
            box-sizing: border-box;
            font-weight: bold;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-04:focus {
            box-shadow: #fcc89e 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #fcc89e 0 -3px 0 inset;
        }

        .button-04:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #fcc89e 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-04:active {
            box-shadow: #fcc89e 0 3px 7px inset;
            transform: translateY(2px);
        }

        /* CSS */
        .button-05 {
            align-items: center;
            appearance: none;
            background-color: #f9fd14;
            border-radius: 25px;
            border-width: 0;
            box-shadow: rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #fbfd9e 0 -3px 0 inset;
            box-sizing: border-box;
            font-weight: bold;
            color: #000;
            cursor: pointer;
            display: inline-flex;
            font-family: "JetBrains Mono", monospace;
            height: 48px;
            justify-content: center;
            line-height: 1;
            list-style: none;
            overflow: hidden;
            padding-left: 16px;
            padding-right: 16px;
            position: relative;
            text-align: left;
            text-decoration: none;
            transition: box-shadow .15s, transform .15s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            white-space: nowrap;
            will-change: box-shadow, transform;
            font-size: 18px;
        }

        .button-05:focus {
            box-shadow: #fbfd9e 0 0 0 1.5px inset, rgba(45, 35, 66, 0.4) 0 2px 4px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #fbfd9e 0 -3px 0 inset;
        }

        .button-05:hover {
            box-shadow: rgba(45, 35, 66, 0.4) 0 4px 8px, rgba(45, 35, 66, 0.3) 0 7px 13px -3px, #fbfd9e 0 -3px 0 inset;
            transform: translateY(-2px);
        }

        .button-05:active {
            box-shadow: #fbfd9e 0 3px 7px inset;
            transform: translateY(2px);
        }

        .swal2-border-radius {
            -webkit-border-radius: 0 !important;
            -moz-border-radius: 0 !important;
            border-radius: 10px !important;
            margin-top: 80px !important; /* ปรับระยะห่างด้านล่าง */
        }
    </style>
</head>

<body>
    <div class="box h-screen">
        <nav class="bgn">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Dashboard Score
                        Board</span>
                </a>
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="{{ asset('public/img/ico.png') }}" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900">{{ $user->name }}</span>
                            <span class="block text-sm  text-gray-500 truncate ">{{ $user->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a :href="route('logout')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 cursor-pointer w-full"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav><br>
        <div class="container-fulid">
            <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
                <p class="text-5xl font-medium text-[#ffffff] text-center mb-5" id="team01"></p>
                <p class="text-7xl font-medium fontn text-[#f89306] text-center mb-5" id="timer">00:00</p>
                <p class="text-5xl font-medium text-[#ffffff] text-center mb-5" id="team02"></p>
            </div>
            <!-- แสดงผลข้อความตอบกลับ -->
            <div id="responseMessage"></div>
            <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 mb-5">
                <div class="grid grid-rows-2 border-2 border-white/50 p-2 rounded-3xl">
                    <form id="eteam01">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="team01" class="w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                            type="text" placeholder="Name the team 1">
                        <button class="button-01 w-full mb-5" type="submit">Update</button>
                    </form>
                    <div>
                        <div class="flex mb-5">
                            <form id="escore01p">
                                @csrf
                                @method('PUT') <!-- ระบุว่าใช้ PUT -->
                                <input name="score01" id="score01p"
                                    class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                    type="text">
                                <button class="button-02 w-15 h-15" type="submit">+</button>
                            </form>
                            <input class="w-full mx-3 rounded-full font-medium text-3xl text-center h-15" type="text"
                                id="score01" readonly>
                            <form id="escore01m">
                                @csrf
                                @method('PUT') <!-- ระบุว่าใช้ PUT -->
                                <input name="score01" id="score01m"
                                    class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                    type="text">
                                <button class="button-03 w-15 h-15" type="submit" id="score01ms">-</button>
                            </form>
                        </div>
                        <div>
                            <form id="escore01r">
                                @csrf
                                @method('PUT') <!-- ระบุว่าใช้ PUT -->
                                <input name="score01" value="0"
                                    class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                    type="text">
                                <button class="button-04 w-full" type="submit">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="grid grid-rows-2 border-2 border-white/50 p-2 rounded-3xl">
                    <div>
                        <form id="settime">
                            @csrf
                            @method('PUT')
                            <input class="w-full rounded-full text-center font-medium text-3xl h-15 mb-5" name="time"
                                type="text" placeholder="Set time">
                            <div class="flex justify-between">
                                <button class="button-01" type="submit">Set Time</button>
                        </form>
                        <form id="start">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="ready" value="a"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-02" type="submit">Start</button>
                        </form>
                        <form id="stop">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="ready" value="b"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-03" type="submit">Stop</button>
                        </form>
                        <form id="timere">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="time" value="0"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-04" type="submit">Reset</button>
                        </form>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between">
                        <div id="r01" class="w-10 h-10 rounded-full m-5"></div>
                        <div id="r02" class="w-10 h-10 rounded-full m-5"></div>
                        <div id="r03" class="w-10 h-10 rounded-full m-5"></div>
                        <div id="r04" class="w-10 h-10 rounded-full m-5"></div>
                    </div>
                    <div class="flex justify-between">
                        <form id="set01">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r01" value="1"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-01" type="submit">S</button>
                        </form>
                        <form id="re01">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r01" value="0"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-04" type="submit">R</button>
                        </form>
                        <form id="set02">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r02" value="1"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-01" type="submit">S</button>
                        </form>
                        <form id="re02">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r02" value="0"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-04" type="submit">R</button>
                        </form>
                        <form id="set03">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r03" value="1"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-01" type="submit">S</button>
                        </form>
                        <form id="re03">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r03" value="0"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-04" type="submit">R</button>
                        </form>
                        <form id="set04">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r04" value="1"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-01" type="submit">S</button>
                        </form>
                        <form id="re04">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="r04" value="0"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-04" type="submit">R</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="grid grid-rows-2 border-2 border-white/50 p-2 rounded-3xl">
                <form id="eteam02">
                    @csrf
                    @method('PUT') <!-- ระบุว่าใช้ PUT -->
                    <input name="team02" class="w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                        type="text" placeholder="Name the team 2">
                    <button class="button-01 w-full mb-5" type="submit">Update</button>
                </form>
                <div>
                    <div class="flex mb-5">
                        <form id="escore02p">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="score02" id="score02p"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-02 w-15 h-15" type="submit">+</button>
                        </form>
                        <input class="w-full mx-3 rounded-full font-medium text-3xl text-center h-15" type="text"
                            id="score02" readonly>
                        <form id="escore02m">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="score02" id="score02m"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-03 w-15 h-15" type="submit" id="score02ms">-</button>
                        </form>
                    </div>
                    <div>
                        <form id="escore02r">
                            @csrf
                            @method('PUT') <!-- ระบุว่าใช้ PUT -->
                            <input name="score02" value="0"
                                class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5"
                                type="text">
                            <button class="button-04 w-full" type="submit">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-5 gap-10">
            <div class="grid grid-rows-3 gap-4 border-2 border-white/50 p-2 rounded-3xl">
                <div></div>
                <div class="text-6xl fontn text-center" id="lefts">
                    <i class='bx bxs-left-arrow'></i>
                </div>
                <div class="flex justify-center">
                    <form id="slefts">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="lefts" value="1"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-01 mr-5" type="submit">Set</button>
                    </form>
                    <form id="relefts">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="lefts" value="0"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-04" type="submit">Reset</button>
                    </form>
                </div>
            </div>
            <div class="grid grid-rows-3 gap-4 border-2 border-white/50 p-2 rounded-3xl">
                <div>
                    <p class="text-center text-3xl text-white mt-5">FOULS</p>
                </div>
                <div class="flex">
                    <form id="efouls01p">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="fouls01" id="fouls01p"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15" type="text">
                        <button class="button-02 w-15 h-15" type="submit">+</button>
                    </form>
                    <input class="w-full mx-3 rounded-full font-medium text-3xl text-center h-15" type="text"
                        id="fouls01" readonly>
                    <form id="efouls01m">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="fouls01" id="fouls01m"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15" type="text">
                        <button class="button-03 w-15 h-15" type="submit" id="fouls01ms">-</button>
                    </form>
                </div>
                <div>
                    <form id="efouls01r">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="fouls01" value="0"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-04 w-full" type="submit">Reset</button>
                    </form>
                </div>
            </div>
            <div class="grid grid-rows-3 gap-4 border-2 border-white/50 p-2 rounded-3xl">
                <span class="box1 text-6xl font-bold text-center text-green-500" id="shot-clock">24</span>
                <div class="flex justify-between">
                    <form id="24s">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="stime" value="24"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-05" type="submit">24s</button>
                    </form>
                    <form id="30s">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="stime" value="30"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-05" type="submit">30s</button>
                    </form>
                    <form id="35s">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="stime" value="35"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-05" type="submit">35s</button>
                    </form>
                </div>
                <div class="flex justify-between">
                    <form id="sstart">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="sready" value="a"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-02" type="submit">Start</button>
                    </form>
                    <form id="sstop">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="sready" value="b"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-03" type="submit">Stop</button>
                    </form>
                </div>
            </div>
            <div class="grid grid-rows-3 gap-4 border-2 border-white/50 p-2 rounded-3xl">
                <div>
                    <p class="text-center text-3xl text-white mt-5">FOULS</p>
                </div>
                <div class="flex">
                    <form id="efouls02p">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="fouls02" id="fouls02p"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15" type="text">
                        <button class="button-02 w-15 h-15" type="submit">+</button>
                    </form>
                    <input class="w-full mx-3 rounded-full font-medium text-3xl text-center h-15" type="text"
                        id="fouls02" readonly>
                    <form id="efouls02m">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="fouls02" id="fouls02m"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15" type="text">
                        <button class="button-03 w-15 h-15" type="submit" id="fouls02ms">-</button>
                    </form>
                </div>
                <div>
                    <form id="efouls02r">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="fouls02" value="0"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-04 w-full" type="submit">Reset</button>
                    </form>
                </div>
            </div>
            <div class="grid grid-rows-3 gap-4 border-2 border-white/50 p-2 rounded-3xl">
                <div></div>
                <div class="text-6xl fontn text-center" id="rights">
                    <i class='bx bxs-right-arrow'></i>
                </div>
                <div class="flex justify-center">
                    <form id="srights">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="rights" value="1"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-01 mr-5" type="submit">Set</button>
                    </form>
                    <form id="rerights">
                        @csrf
                        @method('PUT') <!-- ระบุว่าใช้ PUT -->
                        <input name="rights" value="0"
                            class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                        <button class="button-04" type="submit">Reset</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10 mt-10">
            <div></div>
            <form id="resetall">
                @csrf
                @method('PUT') <!-- ระบุว่าใช้ PUT -->
                <input name="time" value="0"
                    class="hidden w-full rounded-full text-center font-medium text-3xl h-15 mb-5" type="text">
                <button class="button-04 w-full" type="submit">Reset All</button>
            </form>
            <div></div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
    @include('ajax')
</body>

</html>