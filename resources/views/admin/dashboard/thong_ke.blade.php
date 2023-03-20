@extends('admin-layout')
@section('admin-content')
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

<style>
.bieudo{
    background: #fff;
}
</style>

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Bảng thống kê
                        </header>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">'.$message.'</span></br>';
                            Session::put('message',null);
                        }
                        ?>
                            <?php
                            
                                
                            ?>
                        <div class="panel-body">
                            
                            <div class="bieudo">
                                <div id="chart" style="height: 60%;"></div>
                            </div>

                            <form role="form" action="{{URL::to('/thong-ke-thoi-gian')}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thống kê doanh số theo thời gian:</label>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Từ: &nbsp;&nbsp; <input type="date" name="TGBDau"  placeholder="Thời gian bắt đầu">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Đến: &nbsp;&nbsp; <input type="date" name="TGKThuc"  placeholder="Thời gian kết thúc">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <button type="submit" class="btn btn-success">Thông kê</button>
                                </div>
                            </form>  
                        </div>
                    </section>
            </div>  
</div>                  



<?php 
$connect = mysqli_connect("localhost", "root", "", "qlchsach");
$query = "SELECT * FROM DON_DAT_HANG ORDER BY DDH_NGAYDAT";

    
    if (Session::get('TGBDau') && Session::get('TGKThuc')) {
        $TGBDau = Session::get('TGBDau');
        $TGKThuc= Session::get('TGKThuc');
        $query = "SELECT * FROM DON_DAT_HANG  WHERE DDH_NGAYDAT BETWEEN '". $TGBDau ."' AND '".  $TGKThuc."' ORDER BY DDH_NGAYDAT";     
    }

$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{ year:'".$row["DDH_NGAYDAT"]."', profit:".$row["DDH_TONGTIEN"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);
?>
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['profit'],
 labels:['Doanh thu'],
 hideHover:'auto',
 stacked:true
});
</script>
@endsection
            