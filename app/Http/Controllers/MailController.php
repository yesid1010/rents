<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
class MailController extends Controller
{

    public function sendEmail($pdf,$user){
        define('BUDGETS_DIR', storage_path('app/public/facturas'));

        

        if (!is_dir(BUDGETS_DIR)){
            mkdir(BUDGETS_DIR, 0755, true);
        }

        $hoy = Carbon::now();;
        $outputName = 'factura-'.$hoy;
        $pdfPath = BUDGETS_DIR.'/'.$outputName.'.pdf';

       File::put($pdfPath,$pdf->output());

       $data = [(string)$user->email,(string)$user->nameUser];

      $email = (string)$user->email;
      $user = (string)$user->nameUser;
        return Mail::send('mail.index', ['data'=>$data], function($msg) use ($pdfPath,$email,$user){
            $msg->subject('Factura de arriendo');
            $msg->from('sanchezyesid72@gmail.com', 'Arriendos Bogotà');
            $msg->to($email,$user);
            $msg->attach($pdfPath);
        });
    }
}
