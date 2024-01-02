<?php

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index(){

       MessageCreated::dispatch("dari pertama kali reload page");
       return view('chart');

    }
    public function setArray()
    {
        $data = [70, 80, 90, 92, 99];
        return $data;
    }

    public function getArray()
    {
        // $data = $this->setArray();
        // $add = ['kiki','hanna'];
        // $results = array_merge($data,$add);
        // dd($results);
        $labels = ['Wanasalam', 'Muara', 'Bejod', 'Sukatani', 'Cipedang'];
        $datas  = [90, 29, 40, 41, 26];

        $data   = [
            'labels' => $labels,
            'data'   => $datas
        ];

        MessageCreated::dispatch($data);
        // return redirect()->route('data.index');

    }

    public function getData()
    {
        $labels = ['Wanasalam', 'Muara', 'Bejod', 'Sukatani', 'Cipedang'];
        $data   = [20, 29, 40, 41, 26];

        $data   = [
            'labels' => $labels,
            'data'   => $data
        ];

        return response()->json($data);
    }
}
