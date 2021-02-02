<?php

namespace App\Exports;

use App\Models\tipoUsuario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportTecnico implements FromCollection, WithHeadings, WithTitle, WithEvents, ShouldAutoSize
{
    use Exportable;

     /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'DNI N°',
            'Apellido',
            'Nombre',
            'Correo Electronico'
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Lista de Tecnicos';
    }

    public function collection()
    {
       
        $tecnicos=tipoUsuario::find(3);

        return $tecnicos->users()->withTrashed()->get(['dni','apellido','nombre','email']);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
         return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->getSheet()->autoSize();
                $event->getSheet()->getDelegate()->getStyle('A1:C11')
                    ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            }
        ];
    }
}
