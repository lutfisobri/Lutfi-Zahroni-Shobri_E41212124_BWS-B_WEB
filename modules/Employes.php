<?php
namespace Modules;

use App\Models\Employes as ModelsEmployes;
use Illuminate\Http\Request;

class Employes implements Module {
    public function get()
    {
        return 'Employes';
    }

    public static function getEmployes(Request $request)
    {
        return false;
        // ModelsEmployes::all();
    }
}