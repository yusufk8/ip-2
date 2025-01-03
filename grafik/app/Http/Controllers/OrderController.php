<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Designer;
use App\Models\LogoDesigner; 
use App\Models\AfisDesigner; 
use App\Models\EtiketDesigner; 
use App\Models\DukkanDesigner;
use App\Models\KartvizitDesigner;
use App\Models\KatalogDesigner;
use App\Models\UrunDesigner;
use App\Models\WebDesigner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($designer_id)
{
    
    $designer = Designer::with([
        'logoDesigners',
        'webDesigners',
        'afisDesigners',
        'kartvizitDesigners',
        'katalogDesigners',
        'urunDesigners',
        'etiketDesigners',
        'dukkanDesigners', 


    ])->findOrFail($designer_id);

  
    return view('orders.create', compact('designer'));

}
public function show(Order $order)
{
    $order->load('designer'); 
    return view('orders.show', compact('order'));
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'project_title' => 'required|string|max:255',
        'project_description' => 'required|string',
        'deadline' => 'required|date|after:today',
        'budget' => 'required|numeric|min:0',
        'special_requirements' => 'nullable|string'
    ]);

    $order = Order::create([
        'user_id' => auth()->id(),
        'project_title' => $validatedData['project_title'],
        'project_description' => $validatedData['project_description'],
        'deadline' => $validatedData['deadline'],
        'budget' => $validatedData['budget'],
        'special_requirements' => $validatedData['special_requirements'],
        'status' => 'pending'
    ]);

    return redirect()->route('orders.show', $order->id)
        ->with('success', 'Siparişiniz başarıyla oluşturuldu! Tasarımcı onayı bekleniyor.');
}
public function index()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }
}