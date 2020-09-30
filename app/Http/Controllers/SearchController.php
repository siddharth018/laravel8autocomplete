<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Student;
  
class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Student::select("name")
                ->where("name","LIKE", '%'.$request->get('query').'%')
                ->get();
        return response()->json($data);
    }
}