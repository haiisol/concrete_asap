<?php

namespace App\Http\Controllers\Rep;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\RepRepositoryInterface;

class RepController extends Controller
{
    private $rep_repo;

//    private $user;

    public function __construct(RepRepositoryInterface $Rep)
    {
        $this->rep_repo = $Rep;
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
        return view('admin.rep.index');
    }
    public function details($id)
    {
        return view('admin.rep.details');
    }
    public function getAllRep(){
        return response()->json($this->rep_repo->getAllRep(),200);
    }
    public function getRepDetails($id){
        return response()->json($this->contractor_repo->getRepDetails($id),200);
    }
}
