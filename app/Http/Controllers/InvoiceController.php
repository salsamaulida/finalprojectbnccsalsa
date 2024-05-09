<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skincare;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function pageinvoice(){
        $skincares = Skincare::all();
        return view('pageinvoice', compact('skincares'));
    }

    public function create(){
        $request->validate([
            'shippingAddress' => 'required|string|min:10|max:100',
            'postalCode' => 'required|digits:5',
            'skincares.*.id' => 'required|exists:skincares,id',
            'skincares.*.stock' => 'required|integer|min:1',
        ]);

        $invoice = new Invoice();
        $invoice->invoiceNumber = $this->generateInvoiceNumber();
        $invoice->shippingAddress = $request->shippingAddress;
        $invoice->postalCode = $request->postalCode;
        $invoice->save();

        foreach ($request->skincares as $skincare) {
            $skincare = Skincare::find($skincare['id']);
            $invoice->skincares()->attach($skincare->id, ['stock' => $skincare['stock']]);
        }

        return redirect()->route('invoice.print', $invoice->id);
    }

    private function generateInvoiceNumber(){

    }

    public function print(Invoice $invoice){
        return view('invoices.print', compact('invoice'));
    }
}
