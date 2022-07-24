<?php

namespace App\Articals_Package\Presentation\Controllers\Website;

use App\Articals_Package\Data\Models\ArticalComment;
use App\Articals_Package\Domain\Usecase\ArticalsUseCases;
use Illuminate\Http\Request;
use App\Articals_Package\Presentation\Controllers\Controller;

class BlogDetailsController extends Controller
{
    //

    public $articalsUseCases;


    public function __construct()
    {

        $this->articalsUseCases = new ArticalsUseCases();
    }


    public function index(Request $request, $id)
    {

        $artical = $this->articalsUseCases->getAllArticalById($id);

        return view('Website.screens.blogDetailsScreen', ['artical' => $artical]);
    }



    public function postComment(Request $request)
    {

        $articalComment = new ArticalComment;
        $articalComment->comment =  $request->comment;
        $articalComment->user_id =  auth()->user()->id;
        $articalComment->artical_id =  $request->artical_id;
        $articalComment->save();

        $html = view('Website.components.commentItem',  ['item' => $articalComment,])->render();

        return myApiResponse($html, 'success', 200);
    }
}
