<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => 'FYOfrjBqDqKGLKhhnDQBJMClbHNAaXIfpsRPcQss',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYVJNZ1Nta0huMGozRWNGRVVnMTZJa1VqWEYzNmJPTXptbUswenhvOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXBlcl9hZG1pbi9zdXBwbGllciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => 1716986060
            ],
            [
                'id' => 'sn9aPwmFlQ0bmrWqogBItYhiHZ0a88iiixPUqKG1',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNDhPOVVaTkpSeTFmNjBpaWNjQWQ4YzZ3a0RVMmt6enpuWHdKeUdrbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXBlcl9hZG1pbi9zdXBwbGllciI7fX0=',
                'last_activity' => 1717052531
            ],
            [
                'id' => 'zWABmDCeJy1FiRTgDAkTjUqPT1IvEAZtOPmHLGBC',
                'user_id' => null,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHZsVFRkTmpQVGdVR2NuSXRKZGRLZ2VQdTVENWF0dDFNOHdSdmdsdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXBlcl9hZG1pbi9iYXJhbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => 1716978347
            ],
        ];

        DB::table('sessions')->insert($data);
    }
}
