<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();

        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        return view('attendance.create');
    }

    public function store(Request $request)
    {
        Attendance::create([
            'entry_time' => null,
            'exit_time' => null,
            'code' => strtoupper(Str::random(6)),
            'status' => 0,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('home');
    }

    public function showEntryAttendance()
    {
        return view('attendance.entry');
    }

    public function showExitAttendance()
    {
        return view('attendance.exit');
    }

    public function entryAttendance(Request $request)
    {
        $attendance = Attendance::where('code', $request->code)->first();

        if ($attendance == null) {
            return redirect()->route('home')->with(['failed' => 'Kode absen tidak ada']);
        }
        if ($attendance->status == 1) {
            return redirect()->route('home')->with(['failed' => 'Absen sudah dipakai']);
        }
        if ($attendance->user_id == Auth::id()) {
            return redirect()->route('home')->with(['failed' => 'Tidak bisa absen diri sendiri']);
        }

        $attendance->entry_time = now();
        $attendance->status = 1;
        $attendance->save();

        return redirect()->route('home')->with(['success' => 'Absen berhasil']);
    }

    public function exitAttendance(Request $request)
    {
        $attendance = Attendance::where('code', $request->code)->first();

        if ($attendance == null) {
            return redirect()->route('home')->with(['failed' => 'Kode absen tidak ada']);
        }
        if ($attendance->user_id == Auth::id()) {
            return redirect()->route('home')->with(['failed' => 'Tidak bisa absen diri sendiri']);
        }

        $attendance->exit_time = now();
        $attendance->status = 1;
        $attendance->save();

        return redirect()->route('home')->with(['success' => 'Absen berhasil']);
    }
}
