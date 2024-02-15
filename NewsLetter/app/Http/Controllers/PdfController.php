<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function generatepdf()
    {
        $users = User::get();
        $roles = Role::get();

        $data = [
            'title' => 'Welcome to diabi newsletter',
            'date' => date('m/d/Y'),
            'users' => $users,
            'roles' => $roles
        ];

        $pdf = PDF::loadView('pdf', $data);
        return $pdf->download('users_roles-list.pdf');
   
    }
}
