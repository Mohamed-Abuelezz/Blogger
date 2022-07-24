<?php

namespace App\Articals_Package\Domain\Usecase;

use App\Articals_Package\Data\Repository\ArticalRepository;
use App\Articals_Package\Data\Repository\VisitorRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VisitorUseCases
{

    private $visitorRepository;


    public function __construct()
    {
        $this->visitorRepository = new VisitorRepository();
    }


    public function getLastSpecificDaysOfVisitorsCase($days)
    {

        $lastvisitors =  $this->visitorRepository->getLastSpecificDaysOfVisitors($days);
        $visitors = $lastvisitors->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->dayName;
        });
        return   $visitors;
    }
}
