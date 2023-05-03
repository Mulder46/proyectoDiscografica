<?php

namespace App\Http\Controllers;

use App\Models\Disk;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiskController extends Controller
{
    /**
     * Mostraremos todos los discos
     */
    public function index()
    {

        $disks = DB::select('SELECT d.id AS diskId, GROUP_CONCAT(a.artistName) AS artistas, d.title AS disco, d.cover, d.year
        FROM disks AS d
        LEFT JOIN artist_disk AS ad
        ON ad.disk_id = d.id 
        LEFT JOIN artists as a
        ON a.id=ad.artist_id
        GROUP BY diskId, disco, cover, year
        ORDER BY artistas');



        return view('disks.index', compact('disks')); //mando a una vista index en la carpeta disk para ver todos los discos
    }
    /*
    *Nos preparamos para mandarle todos los artístas así poderlos mostrar a la hora de crear un disco
    */
   public function newPre(){
    $artists=Artist::all();
    return view('disks.create',compact('artists'));
   }

    /**
     * Guardamos el nuevo disco
     */
    public function store(Request $request)
    {
        $disk=new Disk;
        $disk->title=$request->title;
        $disk->year=$request->year;
        $disk->cover=$request->cover;
        $disk->save();
        $disk->artists()->sync($request->artista);
        return redirect()->route('Disk-index');
    }
    /*
    * Preparamos una lista con todos los discos para elegir cual enseñar
    */
    public function select() //vamos a elegir los datos de que artista quiere ver
    {
        $disks=Disk::all();
        $disks=$disks->sortBy('artist_id'); //mostramos los discos ordenados por artista
        return view('disks.select',compact('disks'));
    }
    /**
     * Mostramos el disco que quiera
     */
    public function show(Request $request)
    {
        
        $disk = DB::select("SELECT d.title AS disco, d.cover, d.year,d.id AS diskId, s.genre, s.title AS title  
        FROM songs AS s
        right join disks AS d
        ON s.disk_id = d.id
        WHERE d.id=$request->id
        ORDER BY disco,s.id 
        ;");
        
        $id=$request->id;
        $artists=DB::select("SELECT a.artistName AS artista
        FROM artists AS a
        LEFT JOIN artist_disk AS ad
        ON a.id=ad.artist_id
        WHERE ad.disk_id=$id");
        
        return view('disks.show',compact('disk','artists'));
    }

    /**
     * Editamos un disco.
     */

    public function update(Request $request)
    {
     
        $disk=Disk::findOrFail($request->disk_id); //busco el id del artísta para editarlo
        $disk->title = $request->title;
        $disk->year = $request->year;
        $disk->save();
        $disk->artists()->sync($request->artista);
        return redirect()->route('Disk-index');
    }

    /**
     * Borramos un disco específico.
     */
    public function destroy(Request $request)
    {
        if($request->boton=="confirmar"){
            Disk::findOrFail($request->id)->delete();

        }
        $disks=Disk::all();
        return redirect()->route('Disk-index');
    }
    /*
    *Un selector para switchear entre borrar o editar según envíe en el formulario
    */
    public function editDelete(Request $request){
     
        $Disk=Disk::findOrFail($request->id);
        $artists=DB::select("SELECT *
                            FROM artist_disk AS ad
                            LEFT JOIN artists AS a
                            ON a.id=ad.artist_id
                            WHERE disk_id=$request->id");
        $artistsNo=DB::select("SELECT *
                            FROM artist_disk AS ad
                            LEFT JOIN artists AS a
                            ON a.id=ad.artist_id
                            WHERE disk_id!=$request->id");
         
            if($request->action=="edit"){
               return view('Disks.edit',compact('Disk','artists','artistsNo'));
            }else if($request->action=="delete"){ 
               return view('Disks.delete',compact('Disk'));
         }
       }
    
}
