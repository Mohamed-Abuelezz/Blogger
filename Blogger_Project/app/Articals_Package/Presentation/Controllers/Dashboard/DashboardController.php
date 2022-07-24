<?php

namespace App\Articals_Package\Presentation\Controllers\Dashboard;

use App\Articals_Package\Domain\Usecase\AdminUseCases;
use App\Articals_Package\Domain\Usecase\ArticalsUseCases;
use App\Articals_Package\Domain\Usecase\VisitorUseCases;
use Illuminate\Http\Request;
use App\Articals_Package\Presentation\Controllers\Controller;

class DashboardController extends Controller
{
    //
   public $articalsUsesCase ;
   public $visitorUseCases ;




    public function __construct()
    {
        $this->articalsUsesCase = new ArticalsUseCases();
        $this->visitorUseCases  =  new VisitorUseCases();

    }

    public function index()
    {
        $last5ArticalsPublished = $this->articalsUsesCase->getLast5ArticalsCase();
        $lastVisitors = $this->visitorUseCases->getLastSpecificDaysOfVisitorsCase(7);

        return view('Dashboard.index',["last5ArticalsPublished"=>$last5ArticalsPublished,"lastVisitors"=>$lastVisitors]);
    }




}
