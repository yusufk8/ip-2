<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; 
use Illuminate\Support\Facades\Log;
use App\Models\Services;


class ContactController extends Controller
{
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50|regex:/^[a-zA-ZğüşıöçĞÜŞİÖÇ\s]+$/',
            'email' => 'required|email',
            'phone' => ['required', 'string', 'regex:/^(05)[0-9][0-9][1-9]([0-9]){6}$/'],
            'subject' => 'required|exists:services,id',
            'message' => 'required|string|min:10'
        ], [
            'name.required' => 'Ad Soyad alanı zorunludur.',
            'name.min' => 'Ad Soyad en az 3 karakter olmalıdır.',
            'name.regex' => 'Ad Soyad sadece harflerden oluşmalıdır.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'phone.required' => 'Telefon numarası zorunludur.',
            'phone.regex' => 'Geçerli bir telefon numarası giriniz (05XXXXXXXXX).',
            'subject.required' => 'Konu seçimi zorunludur.',
            'subject.in' => 'Geçersiz konu seçimi.',
            'message.required' => 'Mesaj alanı zorunludur.',
            'message.min' => 'Mesajınız en az 10 karakter olmalıdır.'
        ]);

        
    $service = Services::find($request->subject);
    
    
    $validated['subject'] = $service->service;
        Contact::create($validated);

        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi.');
    }
    public function contact()
{
    $services = Services::all();
    return view('contact', compact('services'));
}
}

