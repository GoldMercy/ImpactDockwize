<?php

namespace App\Exports;

use App\Business;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class BusinessExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Business::all();
    }

    public function headings(): array
    {
        return ['id', 'Ondernemer', 'Onderneming', 'Telefoonnummer', 'Email', 'Plaats', 'Idee', 'Jaar', 'Thema', 'Relatie', 'Programma', 'Huisvesting', 'Organisatievorm', 'Omzet', 'Created_at'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->applyFromArray(                    [
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                                'color' => ['argb' => '#000000'],
                            ],
                        ],
                        'font' => [
                            'bold' => true,
                        ]
                    ]
                );
            },
        ];
    }
}
