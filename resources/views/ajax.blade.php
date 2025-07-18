<script>
    function fetchData() {
        axios.get('/data') // API ที่สร้างใน Laravel
            .then(function(response) {
                // เลือกแสดงข้อมูลในตำแหน่งที่มี id
                const team01 = document.getElementById('team01');
                const team02 = document.getElementById('team02');
                const fouls01 = document.getElementById('fouls01');
                const fouls01p = document.getElementById('fouls01p');
                const fouls01m = document.getElementById('fouls01m');
                const fouls02 = document.getElementById('fouls02');
                const fouls02p = document.getElementById('fouls02p');
                const fouls02m = document.getElementById('fouls02m');
                const score01 = document.getElementById('score01');
                const score01p = document.getElementById('score01p');
                const score01m = document.getElementById('score01m');
                const score02 = document.getElementById('score02');
                const score02p = document.getElementById('score02p');
                const score02m = document.getElementById('score02m');
                const fouls01ms = document.getElementById('fouls01ms');
                const fouls02ms = document.getElementById('fouls02ms');
                const score01ms = document.getElementById('score01ms');
                const score02ms = document.getElementById('score02ms');
                const lefts = document.getElementById('lefts');
                const rights = document.getElementById('rights');
                const r01 = document.getElementById('r01');
                const r02 = document.getElementById('r02');
                const r03 = document.getElementById('r03');
                const r04 = document.getElementById('r04');

                if (response.data.length > 0) {
                    const item = response.data[0]; // เลือกข้อมูลแค่ 1 

                    if (fouls01ms) {
                        if (item.fouls01 >= 1) {
                            fouls01ms.disabled = false; // เปิดใช้งานปุ่ม
                        } else {
                            fouls01ms.disabled = true; // ปิดใช้งานปุ่ม
                        }
                    }

                    if (fouls02ms) {
                        if (item.fouls02 >= 1) {
                            fouls02ms.disabled = false; // เปิดใช้งานปุ่ม
                        } else {
                            fouls02ms.disabled = true; // ปิดใช้งานปุ่ม
                        }
                    }

                    if (score01ms) {
                        if (item.score01 >= 1) {
                            score01ms.disabled = false; // เปิดใช้งานปุ่ม
                        } else {
                            score01ms.disabled = true; // ปิดใช้งานปุ่ม
                        }
                    }

                    if (score02ms) {
                        if (item.score02 >= 1) {
                            score02ms.disabled = false; // เปิดใช้งานปุ่ม
                        } else {
                            score02ms.disabled = true; // ปิดใช้งานปุ่ม
                        }
                    }

                    // แสดงชื่อและอีเมลในตำแหน่งที่กำหนด
                    if (team01) {
                        team01.innerHTML = item.team01; // แสดงชื่อ
                    }

                    if (team02) {
                        team02.innerHTML = item.team02; // แสดงอีเมล
                    }

                    if (fouls01) {
                        fouls01.value = item.fouls01; // แสดงชื่อ
                    }
                    if (fouls01p) {
                        fouls01p.value = item.fouls01; // แสดงชื่อ
                    }
                    if (fouls01m) {
                        fouls01m.value = item.fouls01; // แสดงชื่อ
                    }

                    if (fouls02) {
                        fouls02.value = item.fouls02; // แสดงอีเมล
                    }
                    if (fouls02p) {
                        fouls02p.value = item.fouls02; // แสดงอีเมล
                    }
                    if (fouls02m) {
                        fouls02m.value = item.fouls02; // แสดงอีเมล
                    }

                    if (score01) {
                        score01.value = item.score01; // แสดงชื่อ
                    }
                    if (score01p) {
                        score01p.value = item.score01; // แสดงชื่อ
                    }
                    if (score01m) {
                        score01m.value = item.score01; // แสดงชื่อ
                    }

                    if (score02) {
                        score02.value = item.score02; // แสดงอีเมล
                    }
                    if (score02p) {
                        score02p.value = item.score02; // แสดงอีเมล
                    }
                    if (score02m) {
                        score02m.value = item.score02; // แสดงอีเมล
                    }

                    // ตรวจสอบค่าของ lefts
                    if (item.lefts === 1) {
                        // ถ้า lefts = 1 ให้แสดง div
                        if (lefts) {
                            lefts.style.color = '#FF8904' // แสดงไอคอน
                        }
                    } else {
                        // ถ้า lefts = 0 ซ่อน div
                        if (lefts) {
                            lefts.style.color = '#ffffff'; // ซ่อนไอคอน
                        }
                    }

                    // ตรวจสอบค่าของ lefts
                    if (item.rights === 1) {
                        // ถ้า lefts = 1 ให้แสดง div
                        if (rights) {
                            rights.style.color = '#FF8904' // แสดงไอคอน
                        }
                    } else {
                        // ถ้า lefts = 0 ซ่อน div
                        if (rights) {
                            rights.style.color = '#ffffff'; // ซ่อนไอคอน
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
                            r04.style.backgroundColor = '#FF8904'; // แสดงไอคอน
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

                    // ฟังก์ชันส่งเวลาไปยังเซิร์ฟเวอร์
                    function sendTimeToServer() {
                        const formattedsTime = formatTime(time); // แปลงค่า time ให้เป็น mm:ss
                        console.log('Sending time:', formattedsTime); // ตรวจสอบค่าที่ถูกส่ง
                        $.ajax({
                            url: '/update-value',
                            type: 'POST',
                            data: {
                                value: formattedsTime,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log('Time updated on server:', response);
                                // หลังจากอัปเดตเวลาแล้ว ดึงเวลาใหม่จากเซิร์ฟเวอร์
                                fetchTimeFromDatabase(); // ดึงค่าจากฐานข้อมูลใหม่
                            },
                            error: function() {
                                console.error('Error updating time on server.');
                            }
                        });
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
                                sendTimeToServer();
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

                                // ฟังก์ชันส่งเวลาไปยังเซิร์ฟเวอร์
                                function shotclokeSendTimeToServer() {
                                    const formattedTime = formatTime(shotclokeTime); // แปลงค่า time ให้เป็น mm:ss
                                    console.log('Sending time:', formattedTime);
                                    $.ajax({
                                        url: '/update-svalue',
                                        type: 'POST',
                                        data: {
                                            value: formattedTime,
                                            _token: '{{ csrf_token() }}'
                                        },
                                        success: function(response) {
                                            console.log('Time updated on server:', response);
                                            shotclokeFetchTimeFromDatabase();
                                        },
                                        error: function() {
                                            console.error('Error updating time on server.');
                                        }
                                    });
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
                                            shotclokeSendTimeToServer();
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
<script>
    $(document).ready(function() {
        $('#eteam01').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/team01/' + $('input[name="team01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เปลี่ยนชื่อ ทีม 1 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#eteam02').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/team02/' + $('input[name="team02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เปลี่ยนชื่อ ทีม 2 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#escore01p').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/p/score01/' + $('input[name="score01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เพิ่มคะแนน ทีม 1 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#escore01m').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/m/score01/' + $('input[name="score01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "ลดคะแนน ทีม 1 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#escore01r').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/r/score01/' + $('input[name="score01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ตคะแนน ทีม 1 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#escore02p').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/p/score02/' + $('input[name="score02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เพิ่มคะแนน ทีม 2 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#escore02m').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/m/score02/' + $('input[name="score02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "ลดคะแนน ทีม 2 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#escore02r').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/r/score02/' + $('input[name="score02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ตคะแนน ทีม 2 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#set01').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/set/01/' + $('input[name="r01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "แสดง set ที่ 1 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#set02').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/set/02/' + $('input[name="r02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "แสดง set ที่ 2 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#set03').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/set/03/' + $('input[name="r03"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "แสดง set ที่ 3 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#set04').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/set/04/' + $('input[name="r04"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "แสดง set ที่ 4 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#re01').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/re/01/' + $('input[name="r01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต set ที่ 1 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#re02').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/re/02/' + $('input[name="r02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต set ที่ 2 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#re03').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/re/03/' + $('input[name="r03"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต set ที่ 3 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#re04').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/s/re/04/' + $('input[name="r04"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต set ที่ 4 สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#settime').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/t/set/' + $('input[name="time"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "ตั้งเวลาการแข่งขัน สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#start').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/t/start/' + $('input[name="ready"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เริ่มการนับถอยหลัง สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#stop').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/t/stop/' + $('input[name="ready"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "หยุดนับถอยหลังชั่วคราว สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#timere').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/t/re/0' + $('input[name="time"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต เวลาการแข่งขัน สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#efouls01p').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/p/fouls01/' + $('input[name="fouls01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เพิ่ม ทีม 1 ฟาวส์ สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#efouls01m').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/m/fouls01/' + $('input[name="fouls01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "ลด ทีม 1 ฟาวส์ สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#efouls01r').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/r/fouls01/' + $('input[name="fouls01"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต ทีม 1 ฟาวส์ สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#efouls02p').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/p/fouls02/' + $('input[name="fouls02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เพิ่ม ทีม 2 ฟาวส์ สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#efouls02m').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/m/fouls02/' + $('input[name="fouls02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "ลด ทีม 2 ฟาวส์ สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#efouls02r').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/r/fouls02/' + $('input[name="fouls02"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต ทีม 2 ฟาวส์ สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#slefts').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/l/set/' + $('input[name="lefts"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "แสดง left สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#relefts').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/l/reset/' + $('input[name="lefts"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต left สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#srights').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/r/set/' + $('input[name="rights"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "แสดง right สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#rerights').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/r/reset/' + $('input[name="rights"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต right สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#sstart').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/shot/s/' + $('input[name="sready"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "เริ่มการนับถอยหลัง Shot Clock สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#sstop').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/shot/t/' + $('input[name="sready"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "หยุดการนับถอยหลัง Shot Clock สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#24s').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/shot/24m/' + $('input[name="stime"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "Shot Clock 24s สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#30s').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/shot/30m/' + $('input[name="stime"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "Shot Clock 30s สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#35s').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/shot/35m/' + $('input[name="stime"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "Shot Clock 35s สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#resetall').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: '/api/reset/all/0' + $('input[name="time"]').val(),
                type: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        text: "รีเซ็ต Score Board สำเร็จ",
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        text: ('An error occurred: ' + xhr.responseJSON.message),
                        showConfirmButton: false,
                        timer: 10000,
                        toast: true,
                        timerProgressBar: true,
                        customClass: {
                            popup: "swal2-border-radius"
                        }
                    });
                }
            });
        });
    });
</script>
