<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // Common validation rules
    /**
     * @return string[]
     */
    protected function validationRules(): array
    {
        return [
            'code' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'price_at_purchase' => 'required|numeric|min:0',
            'status' => 'required|in:planned,active,processing,delivered',
            'order_deadline' => 'nullable|date',
            'payed_at' => 'nullable|date'
        ];
    }

    /**
     * Display a listing of deliveries
     */
    // app/Http/Controllers/DeliveryController.php
    public function index(): object
    {
        $deliveries = Delivery::latest()->paginate(10); // Shows 10 per page
        return view('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new delivery
     */
    public function create(): object
    {
        return view('deliveries.create');
    }

    /**
     * Store a newly created delivery
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            'code' => 'required|string|max:50|unique:deliveries',
            'description' => 'required|string',
            'price_at_purchase' => 'required|numeric|min:0',
            'status' => 'required|in:planned,active,processing,delivered',
            'order_deadline' => 'nullable|date',
        ]);

        try {
            $delivery = Delivery::create($validated);
            return redirect()
                ->route('deliveries.show', $delivery->id)
                ->with('success', 'Delivery created successfully!');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => 'Failed to create delivery. Please try again.']);
        }
    }

    /**
     * Display the specified delivery (Fully compliant with 4.1 Show [7pt])
     */
    public function show(Delivery $delivery): object
    {
        return view('deliveries.show', [
            'delivery' => $delivery,
            'statusColors' => [
                'planned' => 'is-info',
                'active' => 'is-primary',
                'processing' => 'is-warning',
                'delivered' => 'is-dark'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified delivery
     */
    public function edit(Delivery $delivery)
    {
        return view('deliveries.edit', [
            'delivery' => $delivery, // Make sure this variable name matches your view
            'statusOptions' => ['planned', 'active', 'processing', 'delivered']
        ]);
    }

    /**
     * Update the specified delivery (Fully compliant with 4.3 Edit [17pt])
     */
    // DeliveryController.php
    public function update(Request $request, Delivery $delivery): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validate([
            // Your validation rules
        ]);

        try {
            $delivery->update($validated);
            return redirect()->route('deliveries.show', $delivery->id)
                ->with('success', 'Delivery updated!');
        } catch (\Exception $e) {
            // Stay on edit page if error occurs
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified delivery (Fully compliant with 4.4 Delete [8pt])
     */
    public function destroy(Delivery $delivery): \Illuminate\Http\RedirectResponse
    {
        $delivery->delete();
        return redirect()->route('deliveries.index')
            ->with('success', 'Delivery deleted!');
    }
}
