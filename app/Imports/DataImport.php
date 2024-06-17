<?php
namespace App\Imports;

use App\Models\Release;
use App\Models\Vehicle;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class DataImport implements ToCollection, WithHeadingRow
{
    public function headingRow(): int
    {
        return 1;
    }

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        HeadingRowFormatter::default('none');

        foreach ($rows as $row) {
            // Zuerst das Vehicle erstellen
            $vehicle = Vehicle::firstOrCreate([
                'manufacturer_id' => $row['manufacturer_id'],
                'vehicle_series_id' => $row['vehicle_series_id'],
                'vehicle_model_name' => $row['vehicle_model_name'],
                'vehicle_production_start' => $row['vehicle_production_start'],
                'engine_code' => $row['engine_code'],
                'engine_name' => $row['engine_name'],
                'power_kw' => $row['power_kw'],
                'power_ps' => $row['power_ps'],
                'displacement_ccm' => $row['displacement_ccm'],
            ]);

            $vehicle->save();
            $vehicle->fresh();

            // Anschließend das Release erstellen, das mit dem Vehicle verbunden ist
            $release = Release::firstOrCreate([
                'release_vehicle_id' => $vehicle->id,
                'release_manufacturer_id' => $row['release_manufacturer_id'],
                'release_vehicle_series_id' => $row['release_vehicle_series_id'],
                'source_id' => $row['source_id'],  // Stellen Sie sicher, dass die Spalte `source_id` in Ihrer CSV-Datei existiert
                'has_b10_release' => $row['has_b10_release'],
                'has_xtl_release' => $row['has_xtl_release'],
                'release_b10_from' => $row['release_b10_from'],
                'no_b10_release' => $row['no_b10_release'],
                'release_xtl_from' => $row['release_xtl_from'],
                'no_xtl_release' => $row['no_xtl_release'],
                'release_additional_info' => $row['release_additional_info'],
            ]);

            $release->save();
            $release->fresh();

            $vehicle->release_id = $release->id;

            $vehicle->save();
        }
    }
}
