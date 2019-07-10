<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        if (session('user_exist')) {
            return view('logged');
        } else {
            return view('home');
        }
    }
    
    public function empty_session()
    {
        if (session('current_user_id')){
            session(['current_user_id' => false]);
        }
        
        if (session('user_exist')) {
            session(['user_exist' => false]);
        }
        
        return redirect()->route('home');
    }
    
    public function form1(Request $request) {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'car'           => 'required',
                'number'        => 'required|max:10|min:5',
                'terms'         => 'required',
            ]);
        
            if ($validator->fails()) {
                // Defining response
                $arr = array(
                    'status'    => false,
                    'errors'    => $validator->messages()
                );
            
                return response()->json($arr, 200);
            }
        
            // Store new number but first consult if this number is in the DB and if this record have a email
            $exist_number = User::where('number', $request->get('number'))->first();
            
            $exist_email = false;
            if ($exist_number) {
                $user = true;
                $exist_email = User::where('id', $exist_number->id)->get();
                
                if ($exist_email) {
                    // User have an account
                    session(['user_exist' => true]);
                    
                    // Message on view
                    session(['message_logged' => 'Hola '.ucwords($exist_number->name).'!']);
                }
    
                // Assign user id to session view (show the Form-2)
                session(['current_user_id' => $exist_number->id]);
            } else {
                $user = new User;
                $user->car    = $request->get('car');
                $user->number = $request->get('number');
                $user->save();
    
                // Assign user id to session view (show the Form-2)
                session(['current_user_id' => $user->id]);
            }
            
        
            if($user){
                if (session('user_exist')) {
                    $arr = [
                        'msg'           => 'Successfully submit form using ajax',
                        'status'        => true,
                        'existEmail'    => $exist_email
                    ];
                } else {
                    $arr = [
                        'msg'           => 'Successfully submit form using ajax',
                        'status'        => true,
                        'existEmail'    => $exist_email
                    ];
                }
            } else {
                $arr = [
                    'msg'           => 'Something goes to wrong. Please try again later',
                    'status'        => false,
                    'existEmail'    => $exist_email
                ];
            }
        }
    
        return response()->json($arr,  200);
    }
    
    public function form2(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name'      => 'required|max:25',
                'last_name' => 'required|max:50',
                'email'     => 'required|email|unique:users,email',
                'city'      => 'required',
            ]);
            
            if ($validator->fails()) {
                // Defining response
                $arr = array(
                    'status'    => false,
                    'errors'    => $validator->messages()
                );
                
                return Response()->json($arr, 200);
            }
    
            // Update User with the new data
            $user = $this->update($request);
            
            if($user){
                // Delete session and go to view('home')
                if (session('current_user_id')){
                    session(['current_user_id' => false]);
                }
    
                // User have an account
                session(['user_exist' => true]);
    
                $arr = [
                    'msg'       => 'Something goes to wrong. Please try again later',
                    'status'    => true,
                    'view'      => view('home2')->render()
                ];
            } else {
                $arr = [
                    'msg'       => 'Something goes to wrong. Please try again later',
                    'status'    => false,
                ];
    
            }
    
            return Response()->json($arr, 200);
        }
        
    }
    
    public function update(Request $data)
    {
        // Assign new values to the user Object
        $id = session('current_user_id');
        $user = User::find($id);
        $code = $data->get('code') ?? null;
        
        $user->name      = strtolower($data->get('name'));
        $user->last_name = strtolower($data->get('last_name'));
        $user->email     = strtolower($data->get('email'));
        $user->city      = strtolower($data->get('city'));
        $user->code      = $code;
    
        // Excute Update in the DB
        $user->save();
        
        if ($user) {
            return true;
        }
    }
}
