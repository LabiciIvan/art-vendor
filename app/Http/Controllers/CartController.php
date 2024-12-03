<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Send empty cart item
        if (!session()->has('cart')) {
            return view('cart.index', ['cart' => []]);
        }

        return view('cart.index', ['cart' => session()->get('cart')]);
    }

    /**
     * Store an item in cart.
     */
    public function store(CartRequest $request)
    {
        $validItem = $request->validated();

        if ((int)$validItem['quantity'] === 0) {
            return redirect()->back();
        }

        // Add first item in cart
        if (!$request->session()->has('cart')) {
            $request->session()->put('cart', []);
        }

        $cart = $request->session()->get('cart');

        $itemNotInCart = true;

        // Increment any quantity
        foreach ($cart as $key => $item) {
            if ($item['id'] === $validItem['id']) {
                // Get original item to check if we can increment cart
                $originalItem = Item::find($request->input('id'));

                // Increment only if original item has bigger quantity than cart item
                if ((int)$originalItem['quantity'] > (int)$cart[$key]['quantity']) {
                    $cart[$key]['quantity'] += $validItem['quantity'];
                }

                $itemNotInCart = false;
                break;
            }
        }

        // Add item to cart
        if ($itemNotInCart) {
            $cart[] = $validItem;
        }

        $request->session()->put('cart', $cart);

        $request->session()->regenerate();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!session()->has('cart')) {
            return redirect()->back();
        }

        $cart = session()->get('cart');

        $toRemove = false;

        foreach ($cart as $key => $item) {
            if ($item['id'] === $id) {
                if ($request->input('item-update') === 'decrement') {
                    if ((int)$item['quantity'] === 1) {
                        $toRemove = $key;
                        break;
                    }

                    $cart[$key]['quantity'] -= 1;
                } else if ($request->input('item-update') === 'increment') {
                    $originalItem = Item::find($id);

                    // Can't increment if the DB item has lower quantity
                    if ((int)$originalItem['quantity'] <= (int)$cart[$key]['quantity']) {
                        break;
                    }

                    $cart[$key]['quantity'] += 1;
                    break;
                }
            }
        }

        if ($toRemove || $toRemove === 0) {
            unset($cart[$toRemove]);

            $cart = array_values($cart);
        }

        $request->session()->put('cart', $cart);

        $request->session()->regenerate();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!session()->has('cart')) {
            return redirect()->back();
        }

        $cart = session()->get('cart');

        $updatedCart = array_filter($cart, function($item) use ($id) {
            return $item['id'] !== $id;
        });

        session()->put('cart', $updatedCart);

        session()->regenerate();

        return redirect()->back();
    }
}
