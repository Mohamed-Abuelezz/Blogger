<?php

namespace App\Articals_Package\Data\Repository;

use App\Articals_Package\Data\Models\Artical;
use App\Articals_Package\Data\Models\Visitors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VisitorRepository
{



    public function __construct()
    {

    }




    public function getVisitors()
    {
        return   Visitors::all();
    }


    public function getLastSpecificDaysOfVisitors($days)
    {
        return   Visitors::where('created_at','>', Carbon::now()->subDays($days))->get();
    }



}
