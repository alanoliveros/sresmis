<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
class MailboxController extends Controller
{
    public function teacher_index(){
        return view('web.backend.teacher.mailbox.index');
    }
    public function messageTo(Request $request){
        $messageTo = $request->messageTo;

        $sendTo = array();
        if($messageTo == 1){
            $sendTo = User::where('role', $messageTo)->get();
        }else if($messageTo == 2){
            $sendTo = User::where('role', $messageTo)->get();
        }else if($messageTo == 3){
            $sendTo = User::where('students.teacherId', auth()->user()->id)
            ->join('students', 'users.id', 'students.studentId')
            ->get();
        }
        
        return response()->json([
            'messageTo' => $sendTo
        ]);
    }
}
