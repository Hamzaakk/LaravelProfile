<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $profiles =  Profile::paginate(9);
        return view('profiles', compact('profiles'));
    }
    public function show(Profile $profile)
    {  
        
        return view('personalProfile', compact('profile'));
    }
    public function newProfile()
    {
        return view('profile.create');
    }
    public function store(ProfileRequest $request)
    {
           $FormFildes = $request->validated();
           // Hash 
           $FormFildes['password'] =Hash::make($request->password) ;
            $FormFildes['image']=$this->UplodImage($request);
           Profile::create($FormFildes);
            return redirect()->route('profile.index')->with('success', 'compte est bien créer');
    
    }
    public function destroyProfile(Profile $profile)
    {
      $profile->delete();
      return to_route('profile.index')->with('supprisionProfile',"profile de $profile->name est supprimer");
    }

    public function updateProfile(Profile $profile)
    {
        return view('profile.updateProfile',compact('profile'));
    }
    public function updateProfileAction(Profile $profile,ProfileRequest $request)
    {
        $FormFildes = $request->validated();
        $FormFildes['password']= Hash::make($request->password);
        $FormFildes['image']=$this->UplodImage($request);
     
        $profile->fill($FormFildes)->save();
        return to_route('profile.details',$profile->id)->with('succsessUpdate',"profile de $profile->name est modifier");
    }
    private function UplodImage(ProfileRequest $request)
    {
        if($request->hasFile('image')){
            return $request->file('image')->store('profile','public');
           }
    }
   
}
// https://www.youtube.com/watch?v=P7i8xKn9nqY&ab_channel=KassAtayPodcast: