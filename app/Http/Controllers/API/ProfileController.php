<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return $profile = Profile::all();
        return  ProfileResource::collection(Profile::all());
        //  response()->json($profile);
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
        $FormFildes = $request->all();
        // Hash 
        $FormFildes['password'] =Hash::make($request->password) ;
        //  $FormFildes['image']=$this->UplodImage($request);
        $profile=Profile::create($FormFildes);
        //  return redirect()->route('profile.index')->with('success', 'compte est bien créer');
        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $FormFildes = $request->all();
        // $FormFildes = $request->validated();
        $FormFildes['password']= Hash::make($request->password);
     
        $profile->fill($FormFildes)->save();

        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
       $profile->delete();
       return response()->json([
        'message' => 'Le profile est supprimer avec success',
         'id' => $profile->id,
       ]);
    }
}
