@extends('master.loginmaster')
@section('content')
<!-- Contact -->
    <section id="contact">
      <div class="container text-white">
        <div class="row">
          <div class="col-md-5">
            <h2>Berapa banyak pengeluaranmu bulan ini?</h2>
            <button class="btn btn-primary but-add">Tambahkan</button>
            <div class="inputan" style="display: none">
              <label class="form-control">Nama Barang</label>
              <input type="text" class="form-control inputan-barang" placeholder="Nama Barang"></input>
              <input type="number" class="form-control inputan-harga" placeholder="Harga Barang"></input>
              <button class="btn btn-success inputan-button">Tambahkan!</button>
            </div>
            <div>
              <table class="table table-inputan">
                <tr>
                  <th>Tanggal</th>
                  <th>Nama Barang</th>
                  <th>Harga</th>
                </tr>
                @foreach($data_pengeluaran as $datas)
                <tr>
                  <td>
                    {{$datas->created_at->format('M d,Y h:i a')}}
                  </td>
                  <td>
                    {{$datas->nama_barang}}
                  </td>
                  <td>
                    {{$datas->harga}}
                  </td>
                </tr>
                @endforeach
              </table>
              <table class="table table-inputan1">
                <tr>
                  <th>Total</th>
                  <th id="inputan-total"></th>
                </tr>
              </table>
              <table class="table table-inputan1">
                <tr>
                  <th>Limit</th>
                  <th id="limit-pengeluaran">{{Auth::user()->limit}}</th>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-7">
            <h2>Statistik Pengeluaranmu</h2>
            <div class="row">
              <div class="col-md-6">
                <select id="filter-bulan" class="form-control" data-live-search="true" style="">
                  <option selected disabled>Pilih</option>
                  <option value="4">Empat bulan terakhir</option>
                  <option value="8">Delapan bulan terakhir</option>
                  <option value="12">Dua belas bulan terakhir</option>
                </select>
              </div>
              <div class="col-md-6">
                <button id="tampilkan" class="btn btn-primary">Tampilkan</button>
              </div>
            </div>
            <div id="res_graph">
            <canvas id="myChart" width="200" height="200" style="display: none"></canvas>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection