<?php

namespace App\Http\Controllers\Contractor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\ContractorRepositoryInterface;

class ContractorController extends Controller
{
    private $contractor_repo;

//    private $user;

    public function __construct(ContractorRepositoryInterface $contractorRep)
    {
        $this->contractor_repo = $contractorRep;
//        $this->user = auth('api')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // $users = User::all();
        return view('admin.contractor.index');
    }
    public function details($id)
    {
        return view('admin.contractor.details');
    }

    public function getAllContractor(){
        return response()->json($this->contractor_repo->getAllContractor(),200);
    }
    public function getContractorDetails($id){
        return response()->json($this->contractor_repo->getContractorDetails(),200);
    }
    public function getOrderDetails($id){
        return response()->json($this->contractor_repo->getOrderDetails($id),200);
    }
}
