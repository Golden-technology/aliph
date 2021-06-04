<?php

namespace App\Http\Controllers;

use App\Models\ItemStore;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function itemPrice(Request $request)
    {
        foreach ($request->itemstore as $index=>$itemstore) {
            $itemstore = ItemStore::find($itemstore)->update([
                'price_purchase' => $request->price_purchase[$index]
            ]);
        }

        return back()->with('success', translate('تمت العملية بنجاح'));
    }
}
