<?php

namespace App\Exports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BrandExport implements FromCollection,WithMapping
{
    public $brands;

    public function __construct($brands)
    {
         $this->brands=$brands;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->brands;
    }

    public function map($brand):array
    {
        return [
            $brand->title
        ];
    }


}
