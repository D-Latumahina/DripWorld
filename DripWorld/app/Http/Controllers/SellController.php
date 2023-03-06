<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellController extends Controller
{
    public function showSellForm() {
        return view('sell-form');
    }

    public function showForSellPage(Sell $sells) {

        $sells = DB::select('select * from sells');

        return view('for-sale', ['sells' => $sells]);
    }

    public function actuallySell(Request $request) {
        // $incomingFields = $request->validate([
        //     'item_category' => 'required',
        //     'item_subcategory' => 'required',
        //     'item_brand' => 'required',
        //     'item_size' => 'required',
        //     'item_name' => 'required',
        //     'item_description' => 'required',
        //     'item_color' => 'required',
        //     'item_condition' => ['required', 'min:1', 'max:10'],
        //     'item_price' => 'required',
        //     'item_photos' => 'required',
        // ]);

            $sell = new Sell;
            $sell->item_category = $request['item_category'];
            $sell->item_subcategory = $request['item_subcategory'];
            $sell->item_brand = $request['item_brand'];
            $sell->item_size = $request['item_size'];
            $sell->item_name = $request['item_name'];
            $sell->item_description = $request['item_description'];
            $sell->item_color = $request['item_color'];
            $sell->item_condition = $request['item_condition'];
            $sell->item_price = $request['item_price'];
            $sell->item_photos = $request['item_photos'];
            $sell->save();
            return redirect("/sell/for-sale")->with('success', 'Item succesfully published!');
    }
}
