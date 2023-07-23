<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        //
        $publications = Publication::latest()->paginate();
        return view('publication.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        //
        
        $FormFildes= $request->validated();
        // dd($FormFildes);
        $FormFildes['image']=$this->UplodImage($request);
        $FormFildes['profile_id']=Auth::id();
        Publication::create($FormFildes);
        return to_route('publications.index')->with('succsessUpdate',"publication de est modifier");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        // if(!Gate::authorize('update-publication',$publication))
        $this->authorize('update',$publication);
         
        return view('publication.edit',compact('publication'));
    
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        //
        if(!Gate::authorize('update-publication',$publication))
        $FormFildes = $request->validated();
        $FormFildes['image']=$this->UplodImage($request);    
            $publication->fill($FormFildes)->save();
        return to_route('publications.index')->with('succsessUpdate',"publication de $publication->name est modifier");
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        //
        // dd($publication);
        $publication->delete();
        return to_route('publications.index')->with('succsessdelete',"publication de $publication->name est supprimer");

    }
    private function UplodImage(PublicationRequest $request)
    {
        if($request->hasFile('image')){
            return $request->file('image')->store('publications','public');
           }
    }
}
