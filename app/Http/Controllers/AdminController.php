<?php

namespace App\Http\Controllers;

use App\Models\Countdown;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }
    // ดึงค่าเวลา (time) จากฐานข้อมูล
    public function getTime()
    {
        $time = Countdown::where('id', 1)->value('time'); // สมมติใช้ id = 1
        return response()->json(['time' => $time]);
    }

    // ดึงค่า ready จากฐานข้อมูล
    public function getReady()
    {
        $ready = Countdown::where('id', 1)->value('ready'); // ดึงค่า ready
        return response()->json(['ready' => $ready]);
    }
    public function getsReady()
    {
        $ready = Countdown::where('id', 1)->value('sready'); // ดึงค่า ready
        return response()->json(['ready' => $ready]);
    }

    // อัปเดตค่าเวลา (time) ในฐานข้อมูล
    public function updateTime(Request $request)
    {
        $time = $request->input('value'); // รับค่าจาก AJAX
        Countdown::where('id', 1)->update(['time' => $time]);

        return response()->json(['message' => 'Time updated successfully']);
    }

    public function getsTime()
    {
        try {
            // ดึงแถวแรกจากตาราง countdown (ในกรณีที่มีหลายแถว ให้ระบุเงื่อนไขเพิ่มเติม เช่น where)
            $countdown = Countdown::where('id', 1)->first(); // หรือ Countdown::where('id', 1)->first();

            if ($countdown) {
                return response()->json([
                    'success' => true,
                    'time' => $countdown->stime, // ส่งเวลาจากคอลัมน์ time
                    'ready' => $countdown->sready, // ส่งสถานะ ready
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No data found.'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching time: ' . $e->getMessage()
            ], 500);
        }
    }
    public function updatesTime(Request $request)
    {
        try {
            // ตรวจสอบรูปแบบของเวลา 00:00
            $request->validate([
                'value' => 'required', // ตรวจสอบว่าเป็นรูปแบบเวลา
            ]);

            // อัปเดตข้อมูลในตาราง countdown
            $countdown = Countdown::find(1); // หรือหาแถวที่ต้องการจาก ID หรือเงื่อนไขที่เหมาะสม
            if ($countdown) {
                $countdown->stime = $request->value; // เก็บเวลาในรูปแบบ 00:00
                $countdown->save(); // บันทึกการเปลี่ยนแปลง
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No countdown record found.',
                ], 404);
            }

            return response()->json([
                'success' => true,
                'message' => 'Time updated successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update time: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function getData()
    {
        // ดึงข้อมูลล่าสุดจากฐานข้อมูล
        $data = Countdown::where('id', 1)->get(); // ดึงแค่ 1 รายการล่าสุด

        return response()->json($data); // ส่งข้อมูลที่ดึงออกมาในรูปแบบ JSON
    }

    // ฟังก์ชันสำหรับอัปเดตข้อมูลผู้ใช้
    public function team01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'team01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $team01 = Countdown::find(1);

        if ($team01) {
            // อัปเดตข้อมูล
            $team01->team01 = $request->input('team01');
            $team01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function team02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'team02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $team02 = Countdown::find(1);

        if ($team02) {
            // อัปเดตข้อมูล
            $team02->team02 = $request->input('team02');
            $team02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function p_score01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'score01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $score01 = Countdown::find(1);
        $score1 = $request->input('score01');

        $sumscore = $score1 + 1;

        if ($score01) {
            // อัปเดตข้อมูล
            $score01->score01 = $sumscore;
            $score01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function m_score01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'score01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $score01 = Countdown::find(1);
        $score1 = $request->input('score01');

        $sumscore = $score1 - 1;

        if ($score01) {
            // อัปเดตข้อมูล
            $score01->score01 = $sumscore;
            $score01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function r_score01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'score01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $score01 = Countdown::find(1);

        if ($score01) {
            // อัปเดตข้อมูล
            $score01->score01 = $request->input('score01');
            $score01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function p_score02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'score02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $score02 = Countdown::find(1);
        $score2 = $request->input('score02');

        $sumscore = $score2 + 1;

        if ($score02) {
            // อัปเดตข้อมูล
            $score02->score02 = $sumscore;
            $score02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function m_score02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'score02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $score02 = Countdown::find(1);
        $score2 = $request->input('score02');

        $sumscore = $score2 - 1;

        if ($score02) {
            // อัปเดตข้อมูล
            $score02->score02 = $sumscore;
            $score02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function r_score02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'score02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $score02 = Countdown::find(1);

        if ($score02) {
            // อัปเดตข้อมูล
            $score02->score02 = $request->input('score02');
            $score02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_set_01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r01 = Countdown::find(1);

        if ($r01) {
            // อัปเดตข้อมูล
            $r01->r01 = $request->input('r01');
            $r01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_set_02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r02 = Countdown::find(1);

        if ($r02) {
            // อัปเดตข้อมูล
            $r02->r02 = $request->input('r02');
            $r02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_set_03(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r03' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r03 = Countdown::find(1);

        if ($r03) {
            // อัปเดตข้อมูล
            $r03->r03 = $request->input('r03');
            $r03->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_set_04(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r04' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r04 = Countdown::find(1);

        if ($r04) {
            // อัปเดตข้อมูล
            $r04->r04 = $request->input('r04');
            $r04->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_re_01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r01 = Countdown::find(1);

        if ($r01) {
            // อัปเดตข้อมูล
            $r01->r01 = $request->input('r01');
            $r01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_re_02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r02 = Countdown::find(1);

        if ($r02) {
            // อัปเดตข้อมูล
            $r02->r02 = $request->input('r02');
            $r02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_re_03(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r03' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r03 = Countdown::find(1);

        if ($r03) {
            // อัปเดตข้อมูล
            $r03->r03 = $request->input('r03');
            $r03->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function s_re_04(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'r04' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $r04 = Countdown::find(1);

        if ($r04) {
            // อัปเดตข้อมูล
            $r04->r04 = $request->input('r04');
            $r04->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function t_set(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'time' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->time = $request->input('time');
            $time->ready = "b";
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function t_start(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'ready' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->ready = $request->input('ready');
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function t_stop(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'ready' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->ready = $request->input('ready');
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function t_reset(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'time' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->time = $request->input('time');
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function p_fouls01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'fouls01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $fouls01 = Countdown::find(1);
        $score1 = $request->input('fouls01');

        $sumscore = $score1 + 1;

        if ($fouls01) {
            // อัปเดตข้อมูล
            $fouls01->fouls01 = $sumscore;
            $fouls01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function m_fouls01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'fouls01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $fouls01 = Countdown::find(1);
        $score1 = $request->input('fouls01');

        $sumscore = $score1 - 1;

        if ($fouls01) {
            // อัปเดตข้อมูล
            $fouls01->fouls01 = $sumscore;
            $fouls01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function r_fouls01(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'fouls01' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $fouls01 = Countdown::find(1);

        if ($fouls01) {
            // อัปเดตข้อมูล
            $fouls01->fouls01 = $request->input('fouls01');
            $fouls01->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function p_fouls02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'fouls02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $fouls02 = Countdown::find(1);
        $score1 = $request->input('fouls02');

        $sumscore = $score1 + 1;

        if ($fouls02) {
            // อัปเดตข้อมูล
            $fouls02->fouls02 = $sumscore;
            $fouls02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function m_fouls02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'fouls02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $fouls02 = Countdown::find(1);
        $score1 = $request->input('fouls02');

        $sumscore = $score1 - 1;

        if ($fouls02) {
            // อัปเดตข้อมูล
            $fouls02->fouls02 = $sumscore;
            $fouls02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function r_fouls02(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'fouls02' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $fouls02 = Countdown::find(1);

        if ($fouls02) {
            // อัปเดตข้อมูล
            $fouls02->fouls02 = $request->input('fouls02');
            $fouls02->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function l_set(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'lefts' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $lefts = Countdown::find(1);

        if ($lefts) {
            // อัปเดตข้อมูล
            $lefts->lefts = $request->input('lefts');
            $lefts->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function l_reset(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'lefts' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $lefts = Countdown::find(1);

        if ($lefts) {
            // อัปเดตข้อมูล
            $lefts->lefts = $request->input('lefts');
            $lefts->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function r_set(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'rights' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $rights = Countdown::find(1);

        if ($rights) {
            // อัปเดตข้อมูล
            $rights->rights = $request->input('rights');
            $rights->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function r_reset(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'rights' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $rights = Countdown::find(1);

        if ($rights) {
            // อัปเดตข้อมูล
            $rights->rights = $request->input('rights');
            $rights->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function shot_s(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'sready' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->sready = $request->input('sready');
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function shot_t(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'sready' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->sready = $request->input('sready');
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function shot_24m(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'stime' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->stime = $request->input('stime');
            $time->sready = "b";
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function shot_30m(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'stime' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->stime = $request->input('stime');
            $time->sready = "b";
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function shot_35m(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'stime' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {
            // อัปเดตข้อมูล
            $time->stime = $request->input('stime');
            $time->sready = "b";
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
    public function reset_all(Request $request, $id)
    {
        // ตรวจสอบความถูกต้องของข้อมูล (Validation)
        $request->validate([
            'time' => 'required|string|max:255',
        ]);

        // ค้นหาผู้ใช้ในฐานข้อมูล
        $time = Countdown::find(1);

        if ($time) {

            // อัปเดตข้อมูล
            $time->time = $request->input('time');
            $time->stime = "24";
            $time->team01 = "HOME";
            $time->team02 = "GUEST";
            $time->lefts = "0";
            $time->rights = "0";
            $time->fouls01 = "0";
            $time->fouls02 = "0";
            $time->score01 = "0";
            $time->score02 = "0";
            $time->r01 = "0";
            $time->r02 = "0";
            $time->r03 = "0";
            $time->r04 = "0";
            $time->save(); // บันทึกลงฐานข้อมูล

            // ส่งข้อความตอบกลับในรูปแบบ JSON
            return response()->json([
                'message' => 'User updated successfully!',
            ], 200);
        }

        // หากไม่พบผู้ใช้
        return response()->json([
            'message' => 'User not found!',
        ], 404);
    }
}
