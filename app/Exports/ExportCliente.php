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
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ExportCliente implements FromCollection, WithHeadings, WithTitle, WithEvents
{
   use Exportable;

     /**
     * @return array
     */
    public function headings(): array
    {
        return [
            '    DNI N°',
            '    Apellido',
            '    Nombre',
            '    Correo Electronico'
        ];
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Lista de Clientes';
    }

    public function collection()
    {
       
        $clientes=tipoUsuario::find(4);

        return $clientes->users()->withTrashed()->get(['dni','apellido','nombre','email']);
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


// class UserExport implements FromView
// {
//     public function view(): View
//     {
//         $clientes=tipoUsuario::find(4);

//         $listaClientes = $clientes->users()->withTrashed()->get();

//         return view('Admin.listaClientes', compact('listaClientes'));

//     }

// }
