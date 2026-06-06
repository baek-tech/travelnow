<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        $hoteles = collect($response->json())->take(10)->map(function ($hotel) {

            return [
                'id' => $hotel['id'],
                'nombre' => $hotel['title'],
                'descripcion' => $hotel['body'],
                'ciudad' => 'Cartagena',
                'precio' => rand(150000, 500000),
                'habitaciones' => rand(5, 50),
                'calificacion' => rand(3, 5),
                'imagen' => 'https://picsum.photos/300/200?random=' . $hotel['id']
            ];

        });

        return view('hoteles', compact('hoteles'));
    }

    public function crearReserva(Request $request)
    {
        $response = Http::post(
            'https://jsonplaceholder.typicode.com/posts',
            [
                'title' => $request->hotel,
                'body' => $request->descripcion
            ]
        );

        return redirect()
            ->back()
            ->with('success', 'Reserva registrada correctamente');
    }
}