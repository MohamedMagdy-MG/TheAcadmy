<?php
namespace App\Helpers;
use Illuminate\Support\Str;

class Helper
{

    public function ResponseData($data ,$message,$status = false,$code = 500,$error=null)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $status,
            'error' => $error
        ])->setStatusCode($code)
         ->withHeaders([
            'Access-Control-Allow-Origin' , '*'
        ]);
    }
    public function paginate($total,$perPage,$skip = 0,$page,$url)
    {
        
        $pages = $total / $perPage;
        if(is_float($pages) ){
            $pages = (int)$pages +1 ;
        }
        $pages <= 1 ? $nextPage = null :  (($nextPage = $page + 1) > $pages ? $nextPage = null: $nextPage = $nextPage) ;
        $pages <= 1 ? $prevPage = null :  (($prevPage = $page - 1) == 0 ? $prevPage = null  :$prevPage = $prevPage);

        $count =  0;
        $count = $count + ($perPage * ($page-1));

        return [
            'total' => $total,
            'perPage' => $perPage,
            'pages' => $pages,
            'skip' => $skip,
            'currentPage' => $url.'?page='.$page,
            'nextPage' => $nextPage == null ? null : $url.'?page='.$nextPage,
            'prevPage' => $prevPage == null || $prevPage <= 0 ? null : $url.'?page='.$prevPage,
        ];
    }
  
}
?>