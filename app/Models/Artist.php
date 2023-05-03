<?php

namespace App\Models;

use App\Models\Disk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;
    protected $fillable = ['name','artistName']; 

    public function disks(){
        return $this->belongsToMany(Disk::class,'artist_disk');
    }

}
