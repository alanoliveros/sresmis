<?php

namespace App\Http\Controllers\Notifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Mailbox;
use App\Models\MessageSender;


class MailboxController extends Controller
{
    public function teacher_index()
    {
        
        $sentMessages = MessageSender::where('sender_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('web.backend.teacher.mailbox.index', [
            'sentMessages' => $sentMessages,
        ]);
    }

    public function fetch_for_teacher(){
        $sentMessages = MessageSender::where('sender_id', auth()->user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return response()->json([
            'sentMessages' => $sentMessages,
        ]);
    }
    public function messageTo(Request $request)
    {
        $messageTo = $request->messageTo;

        $sendTo = array();
        if ($messageTo == 1) {
            $sendTo = User::where('role', $messageTo)->get();
        } else if ($messageTo == 2) {
            $sendTo = User::where('role', $messageTo)->get();
        } else if ($messageTo == 3) {
            $sendTo = Student::where('students.teacherId', auth()->user()->id)
                ->join('users', 'students.studentId', 'users.id')
                ->get();
        }

        return response()->json([
            'messageTo' => $sendTo
        ]);
    }
    public function save_message(Request $request)
    {
        $data = json_decode($request->input('dataSubmit'));
        $sendTo = $data->sendTo;
        $subjectMessage = $data->subjectMessage;
        $editorData = $data->editorData;



        $sender = new MessageSender();
        $sender->sender_id = auth()->user()->id;
        $sender->receiver_ids = implode(',', $sendTo);
        $sender->subject = $subjectMessage;
        $sender->message = $editorData;
        $save = $sender->save();

        foreach ($sendTo as $key => $send) {
            $message = new Mailbox();
            $message->sender_id = auth()->user()->id;
            $message->receiver_id =$send;
            $message->subject = $subjectMessage;
            $message->message = $editorData;
            $save_message = $message->save();
        }

        if ($save) {
            return response()->json([
                'success' => 'Message successfully send',
            ]);
        } else {
            return response()->json([
                'error' => 'Message sending failed',
            ]);
        }
    }
}
