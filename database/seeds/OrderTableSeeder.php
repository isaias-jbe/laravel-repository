<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    private $user;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user = User::first();
        for ($year=(date('Y') - 5); $year < date('Y'); $year++)
        {
            for ($months=1; $months <= 12; $months++)
            {
                $diaHora = rand(1,29) . " " .date("H:i:s");
                $data = Carbon::createFromFormat("Y-m-d H:i:s", "{$year}-{$months}-{$diaHora}");

                $this->saveOrder($data);
                $this->saveOrder($data);
                $this->saveOrder($data);
            }
        }
    }

    public function saveOrder($data)
    {
        $this->user->orders()->create([
            'total'             => rand(1, 10) * 12.2,
            'identify'          => uniqid(date("YmdHis")),
            'code'              => uniqid(date("YmdHis")),
            'status'            => rand(1,9),
            'payment_method'    => rand(1,7),
            'date'              => $data
        ]);
    }
}
