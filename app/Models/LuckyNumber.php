<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LuckyNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'number',
        'is_winner'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public static function generateNumber($id)
    {
        $isGenerating = true;
//        while(User::where('id', $randomCode)->count() > 0) {
//            $randomCode = mt_rand();
//        }
        while ($isGenerating) {
            $number = DB::scalar('
            SELECT random_num
            FROM (
                SELECT LPAD(FLOOR(RAND()*99999),5,0) AS random_num
            ) AS numbers_mst_plus_1
            WHERE random_num NOT IN (SELECT number FROM lucky_numbers WHERE number IS NOT NULL and product_id = ?)
            LIMIT 1', [$id]);

            if ($number > 0) {
                $isGenerating = false;
                return strval($number);
            }
        }
    }
}
