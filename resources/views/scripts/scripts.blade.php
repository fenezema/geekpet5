<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
        var total=0;
        var labels=[];
        var limit_belanja=[];
        var datas=[];
        $('.but-add').click(function(){
          $('.inputan').toggle();
        });
        $('.inputan-button').click(function(){
          var harga=parseInt($('.inputan-harga').val());
          var nama=$('.inputan-barang').val();
          total=total+harga;
          var string='<tr><td>'+nama+'</td><td>'+harga+'</td></tr>'
          $('.table-inputan').append(string);
          $('#inputan-total').html(total);
        });
        function draw_thechart(){
            $('#myChart').remove();
            $('#res_graph').append('<canvas id="myChart" width="200" height="200"></canvas>')
            var ctx = $('#myChart');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Limit',
                        data: limit_belanja,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: false,
                        borderColor: '#FF4500'
                    },{
                      label: 'Spending',
                        data: datas,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: false,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        }
        $('#tampilkan').click(function(){
            var bulan_choosen=$('#filter-bulan').val();
            console.log("test");
            $.get('fil/'+bulan_choosen,function(data){
                console.log("test1");
                var panjang=data.length;
                for(var i=0;i<panjang;i++){
                    datas.push(data[i].total);
                    if(data[i].month==1){
                        labels.push("Januari");
                    }
                    else if(data[i].month==2){
                        labels.push("Februari");
                    }
                    else if(data[i].month==3){
                        labels.push("Maret");
                    }
                    else if(data[i].month==4){
                        labels.push("April");
                    }
                    else if(data[i].month==5){
                        labels.push("Mei");
                    }
                    else if(data[i].month==6){
                        labels.push("Juni");
                    }
                    else if(data[i].month==7){
                        labels.push("Juli");
                    }
                    else if(data[i].month==8){
                        labels.push("Agustus");
                    }
                    else if(data[i].month==9){
                        labels.push("September");
                    }
                    else if(data[i].month==10){
                        labels.push("Oktober");
                    }
                    else if(data[i].month==11){
                        labels.push("November");
                    }
                    else if(data[i].month==12){
                        labels.push("Desember");
                    }
                }
                for(var i=0;i<panjang;i++){
                    limit_belanja.push($('#limit-pengeluaran').text());
                }
                console.log(limit_belanja);
                console.log(datas);
                console.log(labels);
                draw_thechart();
                limit_belanja=[];
                datas=[];
                labels=[];
            });
            
        });
      });
    </script>