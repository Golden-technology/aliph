<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\ItemStore;
use App\Models\Store;
use App\Models\Tax;
use App\Models\Unit;
use App\Models\Vendor;
use Facades\App\Repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate();
        return view('dashboard.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryRepository::all();
        $units = Unit::all();
        $vendors = Vendor::all();
        $taxes = Tax::all();
        $stores = Store::all();
        return view('dashboard.items.create', compact('categories', 'units', 'vendors', 'taxes', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        return DB::transaction(function () use($request) {
            $item = Item::create($request->validated());

            for ($i=0; $i < count($request->quantity); $i++) {
                $item->stores()->create([
                    'unit_id' => $request->units[$i],
                    'store_id' => $request->stores[$i],
                    'quantity' => $request->quantity[$i],
                ]);
            }

            return redirect()->route('items.show', $item->id)->with('success', translate('تمت العملية بنجاح'));
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('dashboard.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $categories = CategoryRepository::all();
        $units = Unit::all();
        $vendors = Vendor::all();
        $taxes = Tax::all();
        $stores = Store::all();
        return view('dashboard.items.edit', compact('item','categories', 'units', 'vendors', 'taxes', 'stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        // dd($request->all());
        $item->update($request->validated());

        return DB::transaction(function () use($request, $item) {
            $item->update($request->validated());

            for ($i=0; $i < count($request->quantity); $i++) {

                if(isset($request->item_store[$i])) {

                    $item_store = ItemStore::findOrFail($request->item_store[$i]);

                    $item_store->update([
                        'unit_id' => $request->units[$i],
                        'store_id' => $request->stores[$i],
                        'quantity' => $request->quantity[$i],
                    ]);
                }else {
                    $item->stores()->create([
                        'unit_id' => $request->units[$i],
                        'store_id' => $request->stores[$i],
                        'quantity' => $request->quantity[$i],
                    ]);
                }
            }

            return redirect()->route('items.show', $item->id)->with('success', translate('تمت العملية بنجاح'));
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
