<?php

namespace Snairbef\Regional\Commands;

use Illuminate\Console\Command;
use Snairbef\Regional\Commons\Import\Regions\District;
use Snairbef\Regional\Commons\Import\Regions\Province;
use Snairbef\Regional\Commons\Import\Regions\Regency;
use Snairbef\Regional\Commons\Import\Regions\SubDistrict;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    public $signature = 'regional:import';

    /**
     * The console command description.
     */
    public $description = 'Importing regional data to database.';

    public function __construct(
        protected Province $province,
        protected Regency $regency,
        protected District $district,
        protected SubDistrict $sub_district
    ) {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->output->info('Importing provinces...');

        foreach ($this->province->getRecords() as $key => $value) {
            $province = $this->province->import($value);
            if (boolval($province)) {
                $this->info('Imported province: '.$value['name']);
            } else {
                $this->error('Failed to import province: '.$value['name']);
            }
        }

        $this->output->info('Importing regencies...');

        foreach ($this->regency->getRecords() as $key => $value) {
            $regency = $this->regency->import($value);
            if (boolval($regency)) {
                $this->info('Imported regency: '.$value['name']);
            } else {
                $this->error('Failed to import regency: '.$value['name']);
            }
        }

        $this->output->info('Importing districts...');

        foreach ($this->district->getRecords() as $key => $value) {
            $district = $this->district->import($value);
            if (boolval($district)) {
                $this->info('Imported district: '.$value['name']);
            } else {
                $this->error('Failed to import district: '.$value['name']);
            }
        }

        $this->output->info('Importing sub districts...');

        foreach ($this->sub_district->getRecords() as $key => $value) {
            $sub_district = $this->sub_district->import($value);
            if (boolval($sub_district)) {
                $this->info('Imported sub district: '.$value['name']);
            } else {
                $this->error('Failed to import sub district: '.$value['name']);
            }
        }

        $this->output->success('All regencies imported.');

        return self::SUCCESS;
    }
}
