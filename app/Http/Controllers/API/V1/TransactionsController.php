<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\RepoClasses\TransactionsRepo;

class TransactionsController extends Controller
{
    public $transactionsRepo;

    public function __construct(){
        $this->transactionsRepo = new TransactionsRepo();
    }


    public function UsersHaveTransactions() {
        $data = [];
        $data['perPage']  = 10;
        $data['page'] = 1;
        
        
        if(array_key_exists('perPage',$_GET)){
            $data['perPage'] = $_GET['perPage'];
        }
        if(array_key_exists('page',$_GET)){
            $data['page'] = $_GET['page'];
        }
        if(array_key_exists('statusCode',$_GET)){
            $data['statusCode']  = $_GET['statusCode'];
        }
        if(array_key_exists('currency',$_GET)){
            $data['currency'] = $_GET['currency'];
        }
        if(array_key_exists('amount',$_GET)){
            $data['amount'] = $_GET['amount'];
        }
        if(array_key_exists('date',$_GET)){
            $data['date'] = $_GET['date'];
        }

        return $this->transactionsRepo->UsersHaveTransactions($data);
        

    }
}
