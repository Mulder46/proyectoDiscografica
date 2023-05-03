<?php

namespace App\Http\Controllers;

use App\Models\Disk;
use App\Models\Song;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $songs = DB::select('SELECT d.title AS disco, s.genre, s.title AS song ,s.id as songId, d.cover, d.year
        FROM songs AS s
        left join disks AS d
        ON s.disk_id = d.id
        ORDER BY d.title ;');
        return view('songs.index', compact('songs')); //mando a una vista songs para ver todos las canciones
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $disks=Disk::all();
        return view('songs.create',compact('disks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $artist = Song::create(['title'=>$request->title,'genre'=>$request->genre,'disk_id'=>$request->disk_id]);
        return view('disks.created',compact('request'));
    }

    public function select() //vamos a elegir los datos de que artista quiere ver
    {
        $songs=Song::all();
        return view('songs.select',compact('songs'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       
        $song = DB::select("SELECT d.title AS disco, s.genre,s.id, s.title AS title , d.cover, d.year
        FROM songs AS s
        left join disks AS d
        ON s.disk_id = d.id
        WHERE s.id=$request->song_id
        
        ORDER BY disco,s.id 
        ;");
        
        return view('songs.show',compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $songs=Song::all();
        $disks=Disk::all();
            
        return view('songs.edit',compact(['songs','disks']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $id=$request->id;
        $Song=Song::findOrFail($id); //busco el id del artísta para editarlo
        $Song->title = $request->title;
        $Song->genre = $request->genre;
        $Song->disk_id = $request->disk_id;
        $Song->save();
        $songs = DB::select('SELECT d.title AS disco, s.genre, s.title AS song ,s.id as songId, d.cover, d.year
        FROM songs AS s
        left join disks AS d
        ON s.disk_id = d.id
        ORDER BY d.title ;');

        return view('songs.index', compact('songs'));
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if($request->boton=="confirmar"){
            Song::findOrFail($request->id)->delete();

        }
        $songs=Song::all();
        return view('songs.index',compact('songs'));
    }
    public function editDelete(Request $request){
        
        $song=Song::findOrFail($request->idSong); //le mandamos los datos de la canción a cambiar
        
        $disks=Disk::all();//mostramos todos los discos por si quiere cambiar a otro
        $disco=Disk::find($song->disk_id); //enseñamos en que disco está ahora
         
            if($request->action=="edit"){
               return view('songs.edit',compact('song','disks','disco'));
            }else if($request->action=="delete"){ 
               return view('songs.delete',compact('song'));
         }
       }
}
