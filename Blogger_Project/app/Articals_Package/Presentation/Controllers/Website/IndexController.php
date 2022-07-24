<?php

namespace App\Articals_Package\Presentation\Controllers\Website;

use App\Articals_Package\Data\Models\Visitors;
use App\Articals_Package\Domain\Usecase\ArticalsUseCases;
use App\Articals_Package\Domain\Usecase\CategoryUseCases;
use App\Articals_Package\Presentation\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public $articalsUseCases;


    public function __construct()
    {
        define('PAGINATION', 12);

        $this->articalsUseCases = new ArticalsUseCases();
        $this->categoryUseCases = new CategoryUseCases();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $websiteViews =     Visitors::where('ip_address', $_SERVER['REMOTE_ADDR'])->whereDate('created_at', Carbon::today())->get();
                if ($websiteViews->isEmpty()) {
        
                    $websiteViews = new Visitors;
                    $websiteViews->ip_address =  $_SERVER['REMOTE_ADDR'];
                    $websiteViews->save();
        
        
                }


        $allArticals = null ;
        if (!empty($request->ids)) {
            $allArticals = $this->articalsUseCases->getFilterArticalsWithPaginationCase($request, PAGINATION);
        } else {
            $allArticals = $this->articalsUseCases->getAllArticalsWithPaginationCase( PAGINATION);
        }
        $allCategories = $this->categoryUseCases->getAllCategoriesCase();

        return view('Website.index', ['allArticals' => $allArticals, 'allCategories' => $allCategories,]);

    }

    public function  getFilterArticals(Request $request)
    {

        $filterArticals = $this->articalsUseCases->getFilterArticalsWithPaginationCase($request,  PAGINATION);
        $html = null;
        if ($filterArticals != null) {
            # code...
            $html = view('Website.components.blogItems',  ['allArticals' => $filterArticals,])->render();

        }

        return myApiResponse($html, 'success', 200);
    }
}
