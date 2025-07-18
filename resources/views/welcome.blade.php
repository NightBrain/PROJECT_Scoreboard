<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    <link rel="icon" type="image/png" href="{{ asset('public/img/ico.png') }}" />
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    @include('cdn')
    <style>
        body {
            background: url("https://4kwallpapers.com/images/wallpapers/macos-big-sur-apple-layers-fluidic-colorful-dark-wwdc-2020-3840x2160-1432.jpg");
            background-size: cover;
            overflow: hidden;
        }

        .box {
            background-color: rgba(0, 0, 0, 0.575);
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            -webkit-box-shadow: 30px 30px 35px rgba(0, 0, 0, 0.25);
            box-shadow: 30px 30px 35px rgba(0, 0, 0, 0.25);
            border: 2px solid rgba(0, 0, 0, 0.1);
        }

        .box1 {
            background-color: rgba(255, 255, 255, 0.06);
            -webkit-backdrop-filter: blur(20px);
            backdrop-filter: blur(20px);
            -webkit-box-shadow: 30px 30px 35px rgba(0, 0, 0, 0.25);
            box-shadow: 30px 30px 35px rgba(0, 0, 0, 0.25);
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 25px;
            overflow: hidden;
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
    </style>

</head>

<body class="flex flex-col items-center text-white">
    <div class="md:hidden box h-screen w-screen grid items-center">
        <div>
            <div class="grid grid-cols-2 gap-5 items-center ">
                <p class="text-sm ml-5 font-bold truncate"> TEAM : <span id="team01mo"></span></p>
                <span class="box1 fontn text-6xl flex items-center justify-center text-red-500"><span
                        id="score01mo"></span></span>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-10 items-center ">
                <p class="text-sm ml-5 font-bold truncate"> TEAM : <span id="team02mo"></span></p>
                <span class="box1 fontn text-6xl flex items-center justify-center text-red-500"><span
                        id="score02mo"></span></span>
            </div>
        </div>
    </div>
    <div class="hidden md:block box h-screen w-screen">
        <div class="absolute z-50 text-center w-full">
            <div class="flex justify-between items-center px-4 md:px-10">
                <div class="flex items-center w-200">
                    <p
                        class="text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[2vw] ml-5 font-bold truncate">
                        TEAM : <span id="team01"></span></p>
                </div>
                <div class="text-[25vw] md:text-[20vw] lg:text-[15vw] xl:text-[15vw] 2xl:text-[8vw] font-medium fontn text-[#f89306]"
                    id="lefts">
                    <i class='bx bxs-left-arrow'></i>
                </div>
                <p class="text-[25vw] md:text-[20vw] lg:text-[15vw] xl:text-[15vw] 2xl:text-[8vw] font-medium fontn text-[#f89306]"
                    id="timer">00:00</p>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                   let timerInterval;
    let fetchInterval;
    let time = 0;
    let isCountingDown = false;
    let isTimeUp = false;

    // ฟังก์ชันแปลงเวลาให้อยู่ในรูปแบบ mm:ss
    function formatTime(seconds) {
        let minutes = Math.floor(seconds / 60);
        let secondsLeft = seconds % 60;
        return `${String(minutes).padStart(2, '0')}:${String(secondsLeft).padStart(2, '0')}`;
    }

    // ฟังก์ชันอัปเดตการแสดงผลเวลา
    function updateTimerDisplay() {
        if (time <= 0) {
            $('#timer').text("00:00");
            if (!isTimeUp) {
                isTimeUp = true;
                setTimeout(function() {
                    isTimeUp = false;
                    fetchTimeFromDatabase(); // ดึงค่าเวลาใหม่เฉพาะเมื่อหมดเวลา
                }, 3600000); // หน่วง 1 ชั่วโมง
            }
        } else {
            $('#timer').text(formatTime(time));
        }
    }

    // ฟังก์ชันแปลงเวลา mm:ss เป็นวินาที
    function parseTimeToSeconds(timeString) {
        if (timeString && timeString.includes(':')) {
            const [minutes, seconds] = timeString.split(':').map(Number);
            return (minutes * 60) + seconds;
        } else if (!isNaN(timeString)) {
            return Number(timeString);
        }
        return 0;
    }

    // ฟังก์ชันดึงข้อมูลสถานะ ready จากเซิร์ฟเวอร์
    function fetchReadyStatus() {
        $.ajax({
            url: '/get-ready',
            type: 'GET',
            success: function(response) {
                console.log('Ready response:', response); // ดูค่าที่ได้รับจากเซิร์ฟเวอร์
                if (response.ready) {
                    fetchTimestop(response.ready); // ตรวจสอบสถานะ
                }
            },
            error: function() {
                console.error('Error fetching ready status.');
            }
        });
    }

    // ฟังก์ชันดึงข้อมูลเวลาใหม่จากฐานข้อมูล
    function fetchTimeFromDatabase() {
        $.ajax({
            url: '/get-time',
            type: 'GET',
            success: function(response) {
                if (response.time !== undefined) {
                    let newTime = parseTimeToSeconds(response.time); // แปลงเวลาเป็นวินาที
                    if (newTime !== time) { // อัปเดตเวลาเฉพาะเมื่อมีการเปลี่ยนแปลง
                        time = newTime;
                        updateTimerDisplay(); // อัปเดตการแสดงผล
                    }
                }
            },
            error: function() {
                console.error('Error fetching time from database.');
            }
        });
    }

    // ฟังก์ชันเริ่มต้นการดึงข้อมูลสถานะ ready ทุกๆ 1 วินาที
    function startRealtimeFetch() {
        clearInterval(fetchInterval); // หยุดการดึงข้อมูลก่อนหน้านี้
        fetchInterval = setInterval(function() {
            fetchReadyStatus(); // ตรวจสอบสถานะ ready ทุก 1 วินาที
        }, 1000);
    }

    // ฟังก์ชันเริ่มต้นนับถอยหลัง
    function startCountdown() {
        if (isCountingDown || time <= 0) return;

        isCountingDown = true;
        clearInterval(timerInterval);
        timerInterval = setInterval(function() {
            if (time > 0) {
                time--;
                updateTimerDisplay();
            } else {
                clearInterval(timerInterval);
                updateTimerDisplay();
            }
        }, 1000);
    }

    // ฟังก์ชันหยุดนับถอยหลัง
    function stopCountdown() {
        clearInterval(timerInterval);
        isCountingDown = false;
        console.log("Countdown stopped.");
    }

    // ฟังก์ชันตรวจสอบ ready และเริ่มหรือหยุดการนับถอยหลัง
    function fetchTimestop(readyStatus) {
        console.log('Ready Status:', readyStatus); // ตรวจสอบสถานะที่ได้จากเซิร์ฟเวอร์
        if (readyStatus === 'a') {
            startCountdown(); // เริ่มนับถอยหลังเมื่อ ready เป็น 'a'
        } else if (readyStatus === 'b') {
            stopCountdown(); // หยุดนับถอยหลังเมื่อ ready เป็น 'b'
            fetchTimeFromDatabase(); // ดึงข้อมูลเวลาใหม่ทุก 1 วินาที
            console.log("Waiting for 'a' to resume.");
        }
    }

    // เมื่อหน้าเว็บโหลดเสร็จ เริ่มต้นการดึงข้อมูล
    $(document).ready(function() {
        fetchTimeFromDatabase(); // ดึงข้อมูลเวลาใหม่ทุก 1 วินาที
        startRealtimeFetch(); // เริ่มตรวจสอบสถานะ ready และเวลาทุก 1 วินาที
    });
                </script>

                <div class="text-[25vw] md:text-[20vw] lg:text-[15vw] xl:text-[15vw] 2xl:text-[8vw] font-medium fontn text-[#f89306]"
                    id="rights">
                    <i class='bx bxs-right-arrow'></i>
                </div>
                <div class="flex items-center w-200 justify-end">
                    <p
                        class="text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[2vw] ml-5 font-bold truncate">
                        TEAM : <span id="team02"></span></p>
                </div>
            </div>
        </div>
        <div class="z-40 flex items-center justify-center h-screen w-screen">
            <div class="grid grid-cols-3 gap-10 mt-30">
                <span
                    class="box1 fontn text-[50vw] md:text-[40vw] lg:text-[30vw] xl:text-[25vw] 2xl:text-[20vw] px-10 py-10 h-[50vh] w-[50vh] flex items-center justify-center text-red-500"><span
                        id="score01"></span></span>
                <div>
                    <div>
                        <p class="text-center text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[3vw]">
                            PERIOD</p>
                        <div class="flex justify-center items-center">
                            <div id="r01" class="w-15 h-15 rounded-full m-5"></div>
                            <div id="r02" class="w-15 h-15 rounded-full m-5"></div>
                            <div id="r03" class="w-15 h-15 rounded-full m-5"></div>
                            <div id="r04" class="w-15 h-15 rounded-full m-5"></div>
                        </div>
                        <div class="flex justify-center items-center">
                            <div class="w-15 h-15 rounded-full text-white m-5 text-5xl text-center">1</div>
                            <div class="w-15 h-15 rounded-full text-white m-5 text-5xl text-center">2</div>
                            <div class="w-15 h-15 rounded-full text-white m-5 text-5xl text-center">3</div>
                            <div class="w-15 h-15 rounded-full text-white m-5 text-5xl text-center">4</div>
                        </div>
                    </div>
                    <div>
                        <p class="text-center text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[2vw]">SHOT
                            CLOCK</p>
                        <div class="flex justify-center items-center">
                            <span
                                class="box1 text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[4vw] font-bold px-10 py-10 h-[15vh] w-[15vh] flex items-center justify-center text-green-500"
                                id="shot-clock">24</span>
                            <script>
                                let shotclokeTimerInterval;
    let shotclokeFetchInterval;
    let shotclokeTime = 0;
    let shotclokeIsCountingDown = false;
    let shotclokeIsTimeUp = false;

    // ฟังก์ชันแปลงเวลาให้อยู่ในรูปแบบ mm:ss
    function shotclokeFormatTime(seconds) {
        let minutes = Math.floor(seconds / 60);
        let secondsLeft = seconds % 60;
        return `${String(secondsLeft).padStart(2, '0')}`;
    }

    // ฟังก์ชันอัปเดตการแสดงผลเวลา
    function shotclokeUpdateTimerDisplay() {
        if (shotclokeTime <= 0) {
            $('#shot-clock').text("00");
            if (!shotclokeIsTimeUp) {
                shotclokeIsTimeUp = true;
                setTimeout(function() {
                    shotclokeIsTimeUp = false;
                    shotclokeFetchTimeFromDatabase(); // ดึงค่าเวลาใหม่เฉพาะเมื่อหมดเวลา
                }, 3600000); // หน่วง 1 ชั่วโมง
            }
        } else {
            $('#shot-clock').text(shotclokeFormatTime(shotclokeTime));
        }
    }

    // ฟังก์ชันแปลงเวลา mm:ss เป็นวินาที
    function shotclokeParseTimeToSeconds(timeString) {
        if (timeString && timeString.includes(':')) {
            const [minutes, seconds] = timeString.split(':').map(Number);
            return (minutes * 60) + seconds;
        } else if (!isNaN(timeString)) {
            return Number(timeString);
        }
        return 0;
    }

    // ฟังก์ชันดึงข้อมูลสถานะ ready จากเซิร์ฟเวอร์
    function shotclokeFetchReadyStatus() {
        $.ajax({
            url: '/get-sready',
            type: 'GET',
            success: function(response) {
                console.log('Ready response:', response);
                if (response.ready) {
                    shotclokeFetchTimestop(response.ready);
                }
            },
            error: function() {
                console.error('Error fetching ready status.');
            }
        });
    }

    // ฟังก์ชันดึงข้อมูลเวลาใหม่จากฐานข้อมูล
    function shotclokeFetchTimeFromDatabase() {
        $.ajax({
            url: '/get-stime',
            type: 'GET',
            success: function(response) {
                if (response.time !== undefined) {
                    let newTime = shotclokeParseTimeToSeconds(response.time);
                    if (newTime !== shotclokeTime) {
                        shotclokeTime = newTime;
                        shotclokeUpdateTimerDisplay();
                    }
                }
            },
            error: function() {
                console.error('Error fetching time from database.');
            }
        });
    }

    // ฟังก์ชันเริ่มต้นการดึงข้อมูลสถานะ ready ทุกๆ 1 วินาที
    function shotclokeStartRealtimeFetch() {
        clearInterval(shotclokeFetchInterval);
        shotclokeFetchInterval = setInterval(function() {
            shotclokeFetchReadyStatus();
        }, 1000);
    }

    // ฟังก์ชันเริ่มต้นนับถอยหลัง
    function shotclokeStartCountdown() {
        if (shotclokeIsCountingDown || shotclokeTime <= 0) return;

        shotclokeIsCountingDown = true;
        clearInterval(shotclokeTimerInterval);
        shotclokeTimerInterval = setInterval(function() {
            if (shotclokeTime > 0) {
                shotclokeTime--;
                shotclokeUpdateTimerDisplay();
            } else {
                clearInterval(shotclokeTimerInterval);
                shotclokeUpdateTimerDisplay();
            }
        }, 1000);
    }

    // ฟังก์ชันหยุดนับถอยหลัง
    function shotclokeStopCountdown() {
        clearInterval(shotclokeTimerInterval);
        shotclokeIsCountingDown = false;
        console.log("Countdown stopped.");
    }

    // ฟังก์ชันตรวจสอบ ready และเริ่มหรือหยุดการนับถอยหลัง
    function shotclokeFetchTimestop(readyStatus) {
        console.log('Ready Status:', readyStatus);
        if (readyStatus === 'a') {
            shotclokeStartCountdown();
        } else if (readyStatus === 'b') {
            shotclokeStopCountdown();
            shotclokeFetchTimeFromDatabase();
            console.log("Waiting for 'a' to resume.");
        }
    }

    // เมื่อหน้าเว็บโหลดเสร็จ เริ่มต้นการดึงข้อมูล
    $(document).ready(function() {
        shotclokeFetchTimeFromDatabase();
        shotclokeStartRealtimeFetch();
    });
                            </script>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-5 mt-10">
                        <p class="text-center text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[2vw]">
                            FOULS</p>
                        <p class="text-center text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[2vw]">
                            FOULS</p>
                        <div class="flex items-center justify-center">
                            <span
                                class="box1 text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[3vw] font-bold px-10 py-10 h-[10vh] w-[10vh] flex items-center justify-center text-green-500"><span
                                    id="fouls01"></span></span>
                        </div>
                        <div class="flex items-center justify-center">
                            <span
                                class="box1 text-[10vw] md:text-[8vw] lg:text-[5vw] xl:text-[4vw] 2xl:text-[3vw] font-bold px-10 py-10 h-[10vh] w-[10vh] flex items-center justify-center text-green-500"><span
                                    id="fouls02"></span></span>
                        </div>
                    </div>
                </div>
                <span
                    class="box1 fontn text-[50vw] md:text-[40vw] lg:text-[30vw] xl:text-[25vw] 2xl:text-[20vw] px-10 py-10 h-[50vh] w-[50vh] flex items-center justify-center text-red-500"><span
                        id="score02"></span></span>
            </div>
        </div>

    </div>
    <script>
        function fetchData() {
            axios.get('/data') // API ที่สร้างใน Laravel
                .then(function(response) {
                    // เลือกแสดงข้อมูลในตำแหน่งที่มี id
                    const team01 = document.getElementById('team01');
                    const team02 = document.getElementById('team02');
                    const team01mo = document.getElementById('team01mo');
                    const team02mo = document.getElementById('team02mo');
                    const fouls01 = document.getElementById('fouls01');
                    const fouls02 = document.getElementById('fouls02');
                    const score01 = document.getElementById('score01');
                    const score02 = document.getElementById('score02');
                    const score01mo = document.getElementById('score01mo');
                    const score02mo = document.getElementById('score02mo');
                    const lefts = document.getElementById('lefts');
                    const rights = document.getElementById('rights');
                    const r01 = document.getElementById('r01');
                    const r02 = document.getElementById('r02');
                    const r03 = document.getElementById('r03');
                    const r04 = document.getElementById('r04');

                    if (response.data.length > 0) {
                        const item = response.data[0]; // เลือกข้อมูลแค่ 1 รายการแรก

                        // แสดงชื่อและอีเมลในตำแหน่งที่กำหนด
                        if (team01) {
                            team01.innerHTML = item.team01; // แสดงชื่อ
                        }
                        if (team02) {
                            team02.innerHTML = item.team02; // แสดงอีเมล
                        }

                        if (team01mo) {
                            team01mo.innerHTML = item.team01; // แสดงชื่อ
                        }
                        if (team02mo) {
                            team02mo.innerHTML = item.team02; // แสดงชื่อ
                        }

                        if (fouls01) {
                            fouls01.innerHTML = item.fouls01; // แสดงชื่อ
                        }

                        if (fouls02) {
                            fouls02.innerHTML = item.fouls02; // แสดงอีเมล
                        }

                        if (score01) {
                            score01.innerHTML = item.score01; // แสดงชื่อ
                        }
                        if (score02) {
                            score02.innerHTML = item.score02; // แสดงอีเมล
                        }

                        if (score01mo) {
                            score01mo.innerHTML = item.score01; // แสดงชื่อ
                        }
                        if (score02mo) {
                            score02mo.innerHTML = item.score02; // แสดงอีเมล
                        }

                        // ตรวจสอบค่าของ lefts
                        if (item.lefts === 1) {
                            // ถ้า lefts = 1 ให้แสดง div
                            if (lefts) {
                                lefts.style.display = 'block'; // แสดงไอคอน
                            }
                        } else {
                            // ถ้า lefts = 0 ซ่อน div
                            if (lefts) {
                                lefts.style.display = 'none'; // ซ่อนไอคอน
                            }
                        }

                        // ตรวจสอบค่าของ lefts
                        if (item.rights === 1) {
                            // ถ้า lefts = 1 ให้แสดง div
                            if (rights) {
                                rights.style.display = 'block'; // แสดงไอคอน
                            }
                        } else {
                            // ถ้า lefts = 0 ซ่อน div
                            if (rights) {
                                rights.style.display = 'none'; // ซ่อนไอคอน
                            }
                        }

                        // ตรวจสอบค่าของ lefts
                        if (item.r01 === 1) {
                            // ถ้า lefts = 1 ให้แสดง div
                            if (r01) {
                                r01.style.backgroundColor = '#FF8904'; // แสดงไอคอน
                            }
                        } else {
                            // ถ้า lefts = 0 ซ่อน div
                            if (r01) {
                                r01.style.backgroundColor = '#ffffff'; // ซ่อนไอคอน
                            }
                        }

                        // ตรวจสอบค่าของ lefts
                        if (item.r02 === 1) {
                            // ถ้า lefts = 1 ให้แสดง div
                            if (r02) {
                                r02.style.backgroundColor = '#FF8904'; // แสดงไอคอน
                            }
                        } else {
                            // ถ้า lefts = 0 ซ่อน div
                            if (r02) {
                                r02.style.backgroundColor = '#ffffff'; // ซ่อนไอคอน
                            }
                        }

                        // ตรวจสอบค่าของ lefts
                        if (item.r03 === 1) {
                            // ถ้า lefts = 1 ให้แสดง div
                            if (r03) {
                                r03.style.backgroundColor = '#FF8904'; // แสดงไอคอน
                            }
                        } else {
                            // ถ้า lefts = 0 ซ่อน div
                            if (r03) {
                                r03.style.backgroundColor = '#ffffff'; // ซ่อนไอคอน
                            }
                        }

                        // ตรวจสอบค่าของ lefts
                        if (item.r04 === 1) {
                            // ถ้า lefts = 1 ให้แสดง div
                            if (r04) {
                                r40.style.backgroundColor = '#FF8904'; // แสดงไอคอน
                            }
                        } else {
                            // ถ้า lefts = 0 ซ่อน div
                            if (r04) {
                                r04.style.backgroundColor = '#ffffff'; // ซ่อนไอคอน
                            }
                        }
                    }
                })
                .catch(function(error) {
                    console.error('Error fetching data:', error);
                });
        }

        // เรียกใช้งานฟังก์ชันทุก 5 วินาที
        setInterval(fetchData, 1000);

        // เรียกใช้งานฟังก์ชันเมื่อโหลดหน้าเว็บ
        window.onload = fetchData;
    </script>
</body>

</html>
