<?php

namespace App\Http\Controllers;

use App\Models\Creditos;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;

class CreditoController extends Controller
{
    public function index() {
        $creditos = QueryBuilder::for(Creditos::class)
            ->allowedFilters(['nombre','documento','ruta', 'viaje','condicion','ambiente','vendedor_id'])
            ->paginate(15)
            ->appends(request()->query());
        return Inertia::render('Credito/Index', [
            'creditos' => $creditos
        ]);
    }
}
