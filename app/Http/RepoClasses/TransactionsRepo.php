<?php
namespace App\Http\RepoClasses;

use App\Helpers\Helper;
use App\Http\RepoInterfaces\TransactionsInterface;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class TransactionsRepo implements TransactionsInterface{

    public $user;


    public function __construct()
    {
        $this->user = new User();
    }

    public function UsersHaveTransactions($data){
        $query = $this->user->whereHas('Transactions');
        

        if(array_key_exists('statusCode',$data)){
            $statusCode = $_GET['statusCode'];
            switch($statusCode){
                case 'authorized':
                    $code = 1;
                    break;
                case 'decline':
                    $code = 2;
                    break;
                case 'refunded':
                    $code = 3;
                    break;
                default:
                    $code = null;
            }
            if($code != null){
                $query->whereHas('Transactions',function(Builder $query) use($code){
                    $query->where('statusCode',$code);
                });
            }
        }
        if(array_key_exists('currency',$data)){
            $currency = $data['currency'];
            if(is_array($currency)){
                $query->whereHas('Transactions',function(Builder $query) use($currency){
                    $query->whereIn('Currency',$currency);
                });
            }
        }
        if(array_key_exists('amount',$data)){
            $amount = $data['amount'];
            if(is_array($amount)){
                if(count($amount) == 2){
                    $query->whereHas('Transactions',function(Builder $query) use($amount){
                        $query->whereBetween('paidAmount',[$amount[0],$amount[1]]);
                    });
                }
            }
            
        }
        if(array_key_exists('date',$data)){
            $date = $data['date'];
            if(is_array($date)){
                if(count($date) == 2){
                    $query->whereHas('Transactions',function(Builder $query) use($date){
                        $query->whereBetween('paymentDate',[$date[0],$date[1]]);
                    });
                }
                
            }
            
            
        }
        

        $skip = $data['perPage'] * ($data['page'] - 1);
        $users_count = $query->count();

        
        $users = $query->latest()->take($data['perPage'])->skip($skip)->get();
       
        $data = [
            "users" => UserResource::collection($users),
            'pagination' => Helper::paginate($users_count,$data['perPage'],$skip,$data['page'],route('transactions.users'))
        ];
        
        return Helper::ResponseData($data,'Get All Users Which Have Transactions',true,200);

    }
}