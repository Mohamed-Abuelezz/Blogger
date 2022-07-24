<?php

namespace App\Articals_Package\Presentation\Controllers\Dashboard;

use App\Articals_Package\Data\Models\Artical;
use App\Articals_Package\Domain\Usecase\ArticalsUseCases;
use App\Articals_Package\Domain\Usecase\CategoryUseCases;
use Illuminate\Http\Request;
use App\Articals_Package\Presentation\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ArticalController extends Controller
{

    public $articalsUseCases;
    public $categoryUseCases;




    public function __construct()
    {
        $this->articalsUseCases = new ArticalsUseCases();
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
        $allArticals = $this->articalsUseCases->getAllArticalsCase();
        return view('Dashboard.screens.articals.articals', ["allArticals" => $allArticals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $allCategories = $this->categoryUseCases->getAllCategoriesCase();
        return view('Dashboard.screens.articals.createArtical', ["allCategories" => $allCategories]);
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
            'title' => 'required',
            'body' => 'required|min:50,max:500',
            'image' => "mimes:jpeg,jpg,png,gif|max:2000|dimensions:min_width=970,min_height=250",
            'category' => 'required',

        ],
        [
            'image.dimensions'       => 'The image size must be at least 970 * 250 .',
        ]);

        $storeArtical = $this->articalsUseCases->storeArticalCase($request);


        return redirect()->route('articals.index')->with('msg', 'تم بنجاح');
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
        //
        $removeArtical = $this->articalsUseCases->removeArticalCase($id);

        return   myApiResponse($removeArtical,'Success',200);

    }
}
