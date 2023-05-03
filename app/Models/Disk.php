<?php

namespace App\Models;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Disk extends Model
{
    use HasFactory;
      
        protected $fillable = ['title','cover','year'];
    
        public function artists(){
            return $this->belongsToMany(Artist::class,'artist_disk');
        }

        public function songs(){
            return $this->belongsTo(Song::class);
        }
    
    
    }

