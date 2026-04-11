<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $deliveries = Delivery::query()
            ->latest()
            ->get();

        return view('deliveries.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('deliveries.create', [
            'statusOptions' => $this->getStatusOptions(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $delivery = Delivery::create($this->validateDelivery($request));

        return redirect()
            ->route('deliveries.show', $delivery)
            ->with('success', 'Delivery created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery): View
    {
        $delivery->load('productOrders');

        return view('deliveries.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery): View
    {
        return view('deliveries.edit', [
            'delivery' => $delivery,
            'statusOptions' => $this->getStatusOptions(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Delivery $delivery): RedirectResponse
    {
        $delivery->update($this->validateDelivery($request));

        return redirect()
            ->route('deliveries.show', $delivery)
            ->with('success', 'Delivery updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery): RedirectResponse
    {
        $delivery->delete();

        return redirect()
            ->route('deliveries.index')
            ->with('success', 'Delivery deleted successfully.');
    }

    /**
     * @return array<string, mixed>
     */
    protected function validateDelivery(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'in:planned,active,processing,delivered'],
            'order_deadline' => ['nullable', 'date'],
        ]);
    }

    /**
     * @return array<int, string>
     */
    protected function getStatusOptions(): array
    {
        return ['planned', 'active', 'processing', 'delivered'];
    }
}
