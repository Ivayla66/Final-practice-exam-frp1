<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of Deliveries.
     */
    public function index()
    {
        return view('deliveries.index', [
            'deliveries' => Delivery::all()
        ]);
    }

    /**
     * Show the form for creating a new Delivery.
     */
    public function create()
    {
        return view('deliveries.create', [
            'statusOptions' => ['planned', 'active', 'processing', 'delivered']
        ]);
    }

    /**
     * Store a newly created Delivery in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:deliveries',
            'description' => 'required|string|max:255',
            'price_at_purchase' => 'required|numeric|min:0',
            'status' => 'required|in:planned,active,processing,delivered'
        ]);

        $delivery = Delivery::create($validated);

        return redirect()
            ->route('deliveries.show', $delivery)
            ->with('success', 'Delivery created successfully!');
    }

    /**
     * Display the specified Delivery.
     */
    public function show(Delivery $delivery)
    {
        return view('deliveries.show', [
            'delivery' => $delivery
        ]);
    }

    /**
     * Show the form for editing the specified Delivery.
     */
    public function edit(Delivery $delivery)
    {
        return view('deliveries.edit', [
            'delivery' => $delivery,
            'statusOptions' => ['planned', 'active', 'processing', 'delivered']
        ]);
    }

    /**
     * Update the specified Delivery in storage.
     */
    public function update(Request $request, Delivery $delivery)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:deliveries,code,'.$delivery->id,
            'description' => 'required|string',
            'price_at_purchase' => 'required|numeric|min:0',
            'status' => 'required|in:planned,active,processing,delivered',
        ]);

        $delivery->update($validated);

        return redirect()
            ->route('deliveries.show', $delivery)
            ->with('success', 'Delivery updated successfully!'); // Add this line
    }

    /**
     * Remove the specified Delivery from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('deliveries.index');
    }
}
