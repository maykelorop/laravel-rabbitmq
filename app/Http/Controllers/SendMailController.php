<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NotificationUser;
use Illuminate\Support\Facades\Mail;
use App\User;

class SendMailController extends Controller
{
    public function sendMail(Request $request, $id_user)
    {
        
        $users = User::where('id',$id_user)->get();
        //$users = User::all();

       	//dd($users);	

        // Ship order...
        foreach ($users as $user) {

        	//dd($user);
        	//Mail::to($user->email)->queue(new NotificationUser($user));

        	//echo "añadido a la cola";
        	Mail::to($user->email)->send(new NotificationUser($user));

        }

        die("Ready, already put emails in queue");

    }
}
