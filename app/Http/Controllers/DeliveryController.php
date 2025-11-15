<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::all();
        return view('deliveries.index', compact('deliveries'));
    }

    public function show(Delivery $delivery)
    {
        return view('deliveries.show', compact('delivery'));
    }

    public function create()
    {
        return view('deliveries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'status' => 'required|string|in:planned,active,processing,delivered',
            'order_deadline' => 'nullable|date',
        ]);

        $delivery = Delivery::create($validated);
        return redirect()->route('deliveries.show', $delivery);
    }
}
