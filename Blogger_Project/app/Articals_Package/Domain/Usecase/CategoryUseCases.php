<?php

namespace App\Articals_Package\Domain\Usecase;

use App\Articals_Package\Data\Repository\ArticalRepository;
use App\Articals_Package\Data\Repository\CategoryRepository;
use App\Articals_Package\Data\Repository\VisitorRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoryUseCases
{

    private $categoryRepository;


    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }


    public function getAllCategoriesCase()
    {


        return    $this->categoryRepository->getCategories();
    }

    public function storeCategoryCase(Request $request)
    {

        return    $this->categoryRepository->storeCategory($request);
    }

    public function removeCategoryCase($id)
    {
        return    $this->categoryRepository->removeCategory($id);
    }
}
