<?php

namespace App\Articals_Package\Domain\Usecase;

use App\Articals_Package\Data\Repository\ArticalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ArticalsUseCases
{

    private $articalRepository;


    public function __construct()
    {
        $this->articalRepository = new ArticalRepository();
    }



    public function getLast5ArticalsCase()
    {
        return   $this->articalRepository->getLastSpecificNumberArticals(5);
    }

    public function storeArticalCase(Request $request)
    {

        return    $this->articalRepository->storeArtical($request);
    }

    public function getAllArticalsCase()
    {
        return   $this->articalRepository->getArticals();
    }

    public function getAllArticalById($id)
    {
        return   $this->articalRepository->getArtical($id);
    }

    public function getAllArticalsWithPaginationCase($numberOfItems)
    {

        return   $this->articalRepository->getArticalsWithPagination($numberOfItems);
    }

    public function getFilterArticalsWithPaginationCase(Request $request, $numberOfItems)
    {
        $filterArticals = null;

        if (!empty($request->ids)) {
            $filterArticals =      $this->articalRepository->getArticalsWithFilterCategoriesPagination($request->ids, $numberOfItems);
        } else {
            $filterArticals =   $this->getAllArticalsWithPaginationCase($numberOfItems);
        }

        return $filterArticals;
    }


    public function removeArticalCase($id)
    {
        return    $this->articalRepository->removeArtical($id);
    }
}
