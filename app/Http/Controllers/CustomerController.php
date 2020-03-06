<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class CustomerController extends Controller
{
    public function printPDF()
    {
       // This  $data array will be passed to our PDF blade       
    	// $data = [
    	// 			'title' => 'Comprobante',
    	// 			'heading' => '',
    	// 			'content' => ''        
     //        	];
        
        // $pdf = PDF::loadView('Admin.pdf_view', $data);
        $pdf = PDF::loadView('Admin.pdf_view');  
        return $pdf->stream('medium.pdf');
    }
}
