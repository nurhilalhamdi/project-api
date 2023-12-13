<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    function dashboard(Request $request)
    {

        $title = "Dashboard";
        $id = Auth::user()->id;
        $nama = Auth::user()->nama;

        return view('dashboard.home', compact('title', 'id', 'nama'));
    }

    private function transformData($data)
    {
        $lines = explode("\n", $data);

        $columnNames = explode('|', $lines[0]);

        $transformedData = [];

        for ($i = 1; $i < count($lines); $i++) {
            $values = explode('|', $lines[$i]);

            if (count($columnNames) === count($values)) {
                $studentData = array_combine($columnNames, $values);

                $transformedData[] = $studentData;
            } else {
                continue;
            }
        }

        return $transformedData;
    }


    public function liveSearch(Request $request)
    {
        $response = Http::get('https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131');

        if ($response->successful()) {
            $students = $response->json();
            $transformedData = $this->transformData($students['DATA']);

            $query = $request->get('query');
            $filteredData = $this->filterData($transformedData, $query);

            return response()->json([
                'RC' => 200,
                'RCM' => 'OK',
                'DATA' => $filteredData,
            ]);
        } else {
            return response()->json([
                'RC' => $response->status(),
                'RCM' => 'Error',
                'DATA' => null,
            ]);
        }
    }

    private function filterData($data, $query)
    {
        return array_filter($data, function ($item) use ($query) {
            return stripos($item['NAMA'], $query) !== false || stripos($item['NIM'], $query) !== false || stripos($item['YMD'], $query) !== false;
        });
    }
}
