<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    private array $items = [
        [   'id' => 0,
            'name' => 'Item 1',
            'price' => '10.00'
        ],
        [   'id' => 1,
            'name' => 'Item 2',
            'price' => '20.00'
        ],
        [   'id' => 2,
            'name' => 'Item 3',
            'price' => '30.00'
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('item.items', ['items' => $this->items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->items[$id] ?? null;

        if ($item) {
            return view('item.item', ['id' => $id]);
        }

        return redirect()->route('items');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
