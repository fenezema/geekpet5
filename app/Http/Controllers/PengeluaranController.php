<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;
use Response;
use DB;
use Illuminate\Support\Facades\Auth;
class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date=date("Y-m-d");
        $date=explode("-", $date);
        $tanggal=$date[2];
        $month=(int)$date[1];
        $year=$date[0];
        $data_pengeluaran=Pengeluaran::where(DB::raw('MONTH(created_at)'),$month)->where(DB::raw("YEAR(created_at)"),$year)->where('user_id',Auth::user()->id)->get();
        //$data_stat=Pengeluaran::select(DB::raw('MONTH(created_at)'),DB::raw('SUM(harga)'))->where(DB::raw('MONTH(created_at)'),'<=',$month)->where(DB::raw('MONTH(created_at)'),'>',$month-4)->groupBy('created_at')->get();
        return view('services.expenses',compact('data_pengeluaran'));
        // echo $data_pengeluaran;
        // echo $data_stat;
    }

    public function filter_bulan($n_month)
    {
        $date=date("Y-m-d");
        $date1=explode("-", $date);
        $tanggal=$date1[2];
        $month=(int)$date1[1];
        $year=(int)$date1[0];
        $bulan_target=$month-$n_month;
        if($bulan_target<0){
            $bulan_target+=12;
            $year-=1;
            $result_tanggal=(string)$year.'-'.(string)$bulan_target.'-'.'1';
        }
        else{
            $result_tanggal=(string)$year.'-'.(string)$bulan_target.'-'.'1';    
        }
        $data_stat=Pengeluaran::select(DB::raw('MONTH(created_at) as month'),DB::raw('SUM(harga) as total'))->where('created_at','<=',$date)->where('created_at','>',$result_tanggal)->where('user_id',Auth::user()->id)->groupBy('created_at')->get();
        return Response::json($data_stat);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        //
    }
}
