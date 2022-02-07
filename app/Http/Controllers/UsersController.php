<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Location;
use App\Models\Profile;
use App\Models\Service;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if($user != Auth::user()) {
            abort(403, "Permission denied");
        } 

        $user->createProfile();

        $data['countries']  =    Country::orderBy('name')->get();
        $data['cities']     =    City::orderBy('name')->get();
        $data['locations']  =    Location::orderBy('name')->get();
        $data['services']   =    Service::orderBy('name')->get();

        return view('users.edit', [
            'user' => $user,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            'bio' => 'nullable|string|min:10'
        ]); 

        // validate instagram link
        // validate telegram link
        
        $user = User::findOrFail($id); 
        $data['whatsapp'] = $request->has('whatsapp') ? 1 : 0;
        $user->profile->fill($data);
        
        if($request->services)
            $user->profile->services()->sync($data['services']);
        
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
                    $q->where('user_id', '<>', null);
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
