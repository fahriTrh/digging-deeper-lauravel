<?php

namespace App\Services;
use DB;

class TotalGenerator {
    public function __invoke()
    {
        DB::table('totals')->insert([
            'total' => mt_rand(10, 100),
        ]);
    }
}