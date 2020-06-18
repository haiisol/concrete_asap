<?php

namespace App\Http\Controllers\Contractor;

use App\Models\Order\Order;
use App\Notifications\AppNotification;
use App\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\Interfaces\OrderRepositoryInterface;

// use App\Repositories\OrderRepository;

//use Illuminate\Http\Resources\Json\JsonResource;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ContractorController extends Controller
{
    private $orderRep;

//    private $user;

    public function __construct(OrderRepositoryInterface $orderRep)
    {
        $this->orderRep = $orderRep;
//        $this->user = auth('api')->user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // $user = User::all();
        return view('admin.contractor.index');
    }

}
