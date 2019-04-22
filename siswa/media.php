<?php
session_start();
//error_reporting(1);

include "../system/timeout.php";

if($_SESSION[login]==1){
  if(!cek_login()){
    $_SESSION[login] = 0;
  }
}
if($_SESSION[login]==0){
  header('location:../logout.php');
}
else{
if (empty($_SESSION['nis']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
  echo "<script>alert('Kembalilah Kejalan yg benar!!!'); window.location = 'index.php';</script>";
}
else{
    if ($_SESSION['level']=='guru'){
     echo "<link href=css/style.css rel=stylesheet type=text/css>";
     echo "<div class='error msg'>Anda tidak diperkenankan mengakses halaman ini.</div>";
    }
    else{
include '../system/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>E-Learning | MTs Nurul Ali</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="../assets/css/font-awesome.min.css"> 
  <link rel="stylesheet" href="../assets/css/font-awesome.css">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/jquery-ui.css">
  <link rel="stylesheet" href="../assets/css/fullcalendar.css">
  <link rel="stylesheet" href="../assets/css/prettyPhoto.css">  
  <link rel="stylesheet" href="../assets/css/rateit.css">
  <link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="../assets/css/jquery.cleditor.css"> 
  <link rel="stylesheet" href="../assets/css/jquery.dataTables.css"> 
  <link rel="stylesheet" href="../assets/css/jquery.onoff.css">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/widgets.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/modif.css">
  <script src="../assets/js/respond.min.js"></script>
  
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <div class="navbar-header">
		  <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span>Menu</span>
		  </button>
		  <a href="media.php?module=home" class="navbar-brand hidden-lg">E-Learning</a>
		</div>
      
      

      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         

        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-user"></i> <?php echo $_SESSION[level]; ?> <b class="caret"></b>              
            </a>
            <ul class="dropdown-menu">
              <li><a href="media.php?module=profil"><i class="fa fa-user"></i> Profil</a></li>
              <li><a href="../logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>



  <header>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="logo">
            <h1><a href="media.php?module=home"> <span class="bold">E-Learning</span></a></h1>
            <p class="meta" style="margin-left: 4%;">MTs Nurul Ali</p>
          </div>
        </div>

       

        <div class="col-md-4">
 

        </div>
        <div class="col-md-4">
          
        </div>

      </div>
    </div>
  </header>


<div class="content">

    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>





        <ul id="nav">

          <li class="<?php if ($_GET[module] == 'home') {echo "open";} ?>"><a href="media.php?module=home"><i class="fa fa-home"></i> Beranda</a></li>
          
          <li class="<?php if ($_GET[module] == 'profil') {echo "open";} ?>"><a href="media.php?module=profil"><i class="fa fa-user"></i> <?php echo $_SESSION[nama]; ?></a></li>
          
          <li class="<?php if ($_GET[module] == 'matei') {echo "open";} ?>"><a href="media.php?module=materi"><i class="fa fa-file-text"></i> Materi</a></li>

          <!-- <li class="<?php if ($_GET[module] == 'ujian') {echo "open";} ?>"><a href="media.php?module=ujian"><i class="fa fa-pencil"></i> Tugas</a></li> -->
          
          <!-- <li class="<?php if ($_GET[module] == 'hasil') {echo "open";} ?>"><a href="media.php?module=hasil&act=daftar_nilai"><i class="fa fa-file-text"></i>Nilai Hasil Ujian</a></li> -->

          <li class="has_sub <?php if ($_GET[module] == 'tugas' || $_GET[module] == 'jawaban') { echo "open";} ?>">
               <a href="#"><i class="fa fa-pencil"></i> Tugas <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            
            <ul>
            <li class="<?php if ($_GET[module] == 'tugas' ){ echo "current"; }?>"><a href="media.php?module=tugas"> Data Tugas</a>
            </li>
            <li class="<?php if ($_GET[module] == 'jawaban' ){ echo "current"; }?>"><a href="media.php?module=jawaban"> Data Jawaban Tugas</a>
            </li>
            </ul>

          </li>

          

          

          
        </ul>


    </div>


  	<div class="mainbar">

<?php include 'content.php'; ?>
		  </div>


    </div>

   <div class="clearfix"></div>

</div>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <p class="copy">Copyright &copy; 2018 | <a href="media.php?module=home">MTs Nurul Ali</a> | Developer By <a href="" target="_blank">Akbar Rizqy Taufiqy</a></p>
      </div>
    </div>
  </div>
</footer> 	

<span class="totop"><a href=""><i class="fa fa-chevron-up"></i></a></span> 

<script src="../assets/js/jquery.js"></script> <!-- jQuery -->
<script src="../assets/js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="../assets/js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="../assets/js/moment.min.js"></script> <!-- Moment js for full calendar -->
<script src="../assets/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="../assets/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="../assets/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="../assets/js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="../assets/js/jquery.dataTables.min.js"></script> <!-- Data tables -->

<script src="../assets/js/excanvas.min.js"></script>
<script src="../assets/js/jquery.flot.js"></script>
<script src="../assets/js/jquery.flot.resize.js"></script>
<script src="../assets/js/jquery.flot.pie.js"></script>
<script src="../assets/js/jquery.flot.stack.js"></script>

<script src="../assets/js/jquery.noty.js"></script> <!-- jQuery Notify -->
<script src="../assets/js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="../assets/js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<!-- <script src="../assets/js/layouts/topRight.js"></script>  --><!-- jQuery Notify -->
<script src="../assets/js/layouts/top.js"></script> <!-- jQuery Notify -->

<script src="../assets/js/sparklines.js"></script> <!-- Sparklines -->
<script src="../assets/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="../assets/js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="../assets/js/filter.js"></script> <!-- Filter for support page -->
<script src="../assets/js/custom.js"></script> <!-- Custom codes -->
<script src="../assets/js/charts.js"></script> <!-- Charts & Graphs -->

<script type="text/javascript">
$(function () {


    var d1 = [];
    for (var i = 0; i <= 20; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 20; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#ff6c24", "#ff2424"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });


});



$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, fill: true},
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#1eafed", "#1eafed"]
             });

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

        if ($("#enableTooltip:checked").length > 0) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, 
                                item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
        }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});

</script>
</body>
</html>

<?php }}} ?>