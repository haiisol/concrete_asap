<?php

namespace App\Repositories\Interfaces;

use App\User;

interface ContractorRepositoryInterface{
    public function getAllContractor();
    public function getContractorDetails($id);
    public function getPostedJobs($id);
}
