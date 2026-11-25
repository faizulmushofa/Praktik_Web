<?php

namespace Database\Seeders;

use App\Models\Batch;
use App\Models\BatchModel;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    public function run(): void
    {
        $batches = (new BatchModel())->getDefaultBatches();

        foreach ($batches as $batchData) {
            Batch::updateOrCreate(
                ['kode' => $batchData['kode']],
                $batchData
            );
        }
    }
}
