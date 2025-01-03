<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\LogoDesigner;
use App\Models\WebDesigner;
use App\Models\UrunDesigner;
use App\Models\KatalogDesigner;
use App\Models\KartvizitDesigner;
use App\Models\EtiketDesigner;
use App\Models\DukkanDesigner;
use App\Models\AfisDesigner;
use App\Models\Designer;
use Illuminate\Support\Facades\Auth; 
class ServiceController extends Controller
{
   
    public function index()
    {
        
       

       
        $services = Services::all();
        return view('services', compact('services'));
    }
    public function show($id)
    {
        if (!Auth::check()) {
            return redirect()
                ->route('login')
                ->withInput()
                ->withErrors(['error' => 'Hizmetlere erişmek için önce giriş yapmalısınız.']);
        }
        
        $services = Services::findOrFail($id);
      
      
        $designers = collect();


        
        switch ($services->service) {
            case 'Logo Tasarımı':
                $designers = LogoDesigner::with('designer')->get();
                break;
            case 'Katalog Tasarım':
                $designers = KatalogDesigner::with('designer')->get();
                break;
                
            case 'Web Tasarım ':
                $designers = WebDesigner::with('designer')->get();
                break;
            case 'Afiş Tasarım':
                $designers = AfisDesigner::with('designer')->get();
                break;

            case 'Ürün Tasarım':
                $designers = UrunDesigner::with('designer')->get();
                break;

            case 'Kartvizit Tasarım':
                $designers = KartvizitDesigner::with('designer')->get();
                break;
            case 'Etiket Tasarım':
                $designers = EtiketDesigner::with('designer')->get();
                break;
            case 'Dükkan Tasarım ':
                $designers = DukkanDesigner::with('designer')->get();
                break;
            default:
                $designers = collect();
        }

        return view('service_detail', compact('services','designers'));
        
    }






}
