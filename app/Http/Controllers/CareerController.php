<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
   
    public function store(Request $request)
    {
        $binary = ['coverLetter' => [], 'resume' => []];
        $host = env('APP_URL');
        foreach($request->uploads as $key => $value) {
            array_map( function ($each) use (&$binary, $key, $host) {
                $base64 = $this->base64($each['src'], $each['name']);
                $list = "<div>";
                $list .= "<a href=".$host.DIRECTORY_SEPARATOR ."api/download".DIRECTORY_SEPARATOR.$base64['src'].">".$base64['name']."</a>";
                $list .= "</div>";
                array_push($binary[$key], $list);
             }, $value ?? []);
        }
        
        $str = "<tr><td>Email</td><td>".$request->email ?? 'none'."</td></tr>";
        $str .= "<tr><td>Firstname</td><td>".$request->fname ?? 'none'."</td></tr>";
        $str .= "<tr><td>Lastname</td><td>".$request->lname ?? 'none'."</td></tr>";
        $str .= "<tr><td>Phone</td><td>".$request->phone ?? 'none'."</td></tr>";
        $str .= "<tr><td>Desired Position</td><td>".$this->group($request->groups['positions']) ?? 'none'."</td></tr>";
        $str .= "<tr><td>Preferred Campus</td><td>".$this->group($request->groups['campus']) ?? 'none'."</td></tr>";
        $str .= "<tr><td>Message</td><td>".$request->message ?? 'none'."</td></tr>";
        $str .= "<tr><td>Resume</td><td>".implode('', $binary['resume']) ?? 'none'."</td></tr>";
        $str .= "<tr><td>Cover Letter</td><td>".implode('', $binary['coverLetter']) ?? 'none'."</td></tr>";
        
        $this->sendMail($str);
        return response('success', 200);
    }
    public function group($data)
    {   
        $str = "";
        foreach($data as $key => $value) {
            if($value) {
                $str .= "<div>".$key."</div>";
            }
        }
        return $str;
        
    }
    public function base64($binary,$name){
        if(!is_null($binary)){
            try{
                $encoded = [$data,$base64] = explode(";",$binary);
                $extension = [,$ext] = explode('/',$data);
                $link = [,$url] = explode(',',$base64);
                $src = preg_replace('/\s+/', '_', $name).'_'.time().'_images'.'.'.$ext;
                \Storage::put("/public/docs/$src", base64_decode($url));
                return ["name"=>$name,"src"=>$src];
            }catch(\Exception $e){
                return false;
            }
        }else{
            return false;
        }
    }

    public function sendMail($data)
    {  
    
        Mail::send('emails.career', ["data" => $data], function($message)
        {
            $name = env('APP_NAME');
            $to = "hr@mliesl.edu";                                
            $subject = "Career";
            $message->to($to, $name)->subject($subject);
        });
    }
    public function download($data)
    {
        return Storage::disk('public')->download("docs/$data");
    }
}
