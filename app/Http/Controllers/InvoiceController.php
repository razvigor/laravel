<?php



namespace App\Http\Controllers;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;



class InvoiceController extends Controller
{


    public function show()
    {

        
        return redirect()->away('http://localhost/fpdf183/tutorial/analiza_pdf.php?id=6');
        /*
                $customer = new Buyer([
                    'name'          => 'Bajaga MALI KNINDŽA',
                    'custom_fields' => [
                        'email' => 'baja@knindza.com',
                        'address'       => '89982 Pfeffer Falls Damianstad, CO 66972-8160',
                        'code'          => '41-1985581',
                        'vat'           => '123456789',
                        'phone'         => '760-355-3930',
                    ],
                ]);
        
                $item = (new InvoiceItem())->title('Stavka br.1')->pricePerUnit(2);
        
                $invoice = Invoice::make()
                    ->buyer($customer)
                    ->discountByPercent(10)
                    ->taxRate(15)
                    ->shipping(1.99)
                    ->addItem($item);
        */
               

    }


}
