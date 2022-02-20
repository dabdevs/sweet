<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\File;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->getList($request)->paginate(2);
        $data['countries']  =    Country::orderBy('name')->get();
        $data['cities']     =    City::orderBy('name')->get();
        $data['services']   =    Service::orderBy('name')->get();

        if ($request->ajax()) {
            return view('users.results', compact('users'));
        }

        return view('users.index', [
            'users' => $users,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        try {
            $user = \Auth::user();
            $user->createProfile();

            $data['countries']  =    Country::where('code', 'AR')->orderBy('name')->get();
            $data['cities']     =    City::where('country_id', 1)->orderBy('name')->get();
            $data['services']   =    Service::orderBy('name')->get();

            return view('users.edit', [
                'user' => $user,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $data = $request->validate([
            'gender' => 'nullable|string',
            'country_id' => 'nullable|integer',
            'city_id' => 'required|integer',
            'location_id' => 'required|integer',
            'telephone' => 'nullable|string|min:6|max:12',
            'services' => 'nullable|array',
            'instagram' => 'nullable|string|min:10',
            'telegram' => 'nullable|string|min:10',
            'bio' => 'nullable|string|min:10',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]); 

        // validate instagram link
        // validate telegram link
        if ($request->hasFile('avatar')) {
            if (\Auth::user()->profile->file_id > 1) {
                if(\File::exists(storage_path('app/public/avatars/'.\Auth::user()->profile->file->name))){
                    \File::delete(storage_path('app/public/avatars/'.\Auth::user()->profile->file->name));
                }
            } 

            $avatar = $request->file('avatar');
            $filename = time(). '-' .\Auth::user()->name. '-'. $avatar->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'public/avatars/',
                $avatar,
                $filename
            );
            
            $file = new File; 
            $file->name = $filename;
            $file->path = 'jghjhjk';
            $file->save();
            $data['file_id'] = $file->id; 
        }
        
        $user = \Auth::user(); 
        $data['whatsapp'] = $request->has('whatsapp') ? 1 : 0;
        
        
        $user->profile->fill($data); 
        
        if ($request->services) {
            $user->profile->services()->sync($data['services']);
        }
        
        $user->profile->save();
        
        return redirect()->back()->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getList($request)
    {
        $users = User::whereHas('profile', function($q){
                    $q->whereNotNull(['user_id', 'country_id', 'city_id', 'location_id']);
                }); 
        
        if($request->name) {
            $users->where('name', 'LIKE', '%'.$request->name.'%');
        }

        if($request->city_id) {
            $users->whereHas('profile', function($q) use ($request){
                $q->where('city_id', $request->city_id);
            }); 
        }
        
        if($request->location_id) {
            $users->whereHas('profile', function($q) use ($request){
                $q->where('location_id', $request->location_id);
            }); 
        }
        
        return $users;
    }
}
