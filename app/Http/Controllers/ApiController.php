<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    // Definir funcionalidades relacionadas a la API
    use ApiResponser;

    public function __construct(){

    }
}
