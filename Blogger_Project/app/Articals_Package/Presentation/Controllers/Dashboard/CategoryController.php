<?php

namespace App\Articals_Package\Presentation\Controllers\Dashboard;

use App\Articals_Package\Data\Models\Category;
use App\Articals_Package\Domain\Usecase\CategoryUseCases;
use Illuminate\Http\Request;
use App\Articals_Package\Presentation\Controllers\Controller;

class CategoryController extends Controller
{


    public $categoryUseCases;




    public function __construct()
    {
        $this->categoryUseCases = new CategoryUseCases();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $allCategories = $this->categoryUseCases->getAllCategoriesCase();
        return view('Dashboard.screens.categories.categories',["allCategories"=>$allCategories]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Dashboard.screens.categories.createCategory',[]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);


        $storeCategories = $this->categoryUseCases->storeCategoryCase($request);



        return redirect()->route('categories.index')->with('msg', 'تم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   


        $removeCategory = $this->categoryUseCases->removeCategoryCase($id);

        return   myApiResponse($removeCategory,'Success',200);
   }
}
