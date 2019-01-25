<?php //var_dump($gFakultas) ?>
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2019 <a >Sistem Informasi Jurnal Undip</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

              <p>Will be 23 on April 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user bg-yellow"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

              <p>New phone +1(800)555-1234</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

              <p>nora@example.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

              <p>Execution time 5 seconds</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Custom Template Design
              <span class="label label-danger pull-right">70%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Update Resume
              <span class="label label-success pull-right">95%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 95%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Laravel Integration
              <span class="label label-warning pull-right">50%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Back End Framework
              <span class="label label-primary pull-right">68%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->

    <!-- Settings tab content -->
    <div class="tab-pane" id="control-sidebar-settings-tab">
      <form method="post">
        <h3 class="control-sidebar-heading">General Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Report panel usage
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Some information about this general settings option
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Allow mail redirect
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Other sets of options are available
          </p>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Expose author name in posts
            <input type="checkbox" class="pull-right" checked>
          </label>

          <p>
            Allow the user to show his name in blog posts
          </p>
        </div>
        <!-- /.form-group -->

        <h3 class="control-sidebar-heading">Chat Settings</h3>

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Show me as online
            <input type="checkbox" class="pull-right" checked>
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Turn off notifications
            <input type="checkbox" class="pull-right">
          </label>
        </div>
        <!-- /.form-group -->

        <div class="form-group">
          <label class="control-sidebar-subheading">
            Delete chat history
            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
          </label>
        </div>
        <!-- /.form-group -->
      </form>
    </div>
    <!-- /.tab-pane -->
  </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/select2/dist/js/select2.full.min.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/back/dist') ?>/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url('assets/template/back/plugins') ?>/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/template/back/plugins') ?>/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/template/back/bower_components') ?>/Chart.js/Chart.js"></script>
<script src="<?php echo base_url('assets/charts/') ?>/highcharts.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url('assets/template/back/dist') ?>/js/pages/dashboard2.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/template/back/dist') ?>/js/demo.js"></script>
<script>
$(document).ready(function() {
    // var graphData = '<?=isset($graphData) ? $graphData : null?>';
    // var graphDataJurnalAkreditasiByPenerbit = '<?=isset($graphDataJurnalAkreditasiByPenerbit) ? $graphDataJurnalAkreditasiByPenerbit : null?>';
    // console.log(jajajaja);
    $('#myModal').modal('show');
    getPenerbit();
    $('.select2').select2();
    showFormAkreditasi();
    appendFieldPengindex();
    removeFieldPengindeks();
    $(document).on('change', '#penerbit', function() {
        getPenerbit();
    });
    $(document).on('change', '#select-portal', function(e) {
        showPortalHelpBlock();
    });
    $('#tes1').dataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      // dom: 'Bfrtip',
      // buttons: [
      //     'copy', 'csv', 'excel', 'pdf', 'print'
      // ]
    });
    $('#download').wrap('<div id="hide" style="display:none;"/>')
    var downloadTable = $('#download').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    });
    $('#export-csv').on('click', function(e) {
        downloadTable.button(".buttons-csv").trigger();
    });
    $('#export-excel').on('click', function(e) {
        downloadTable.button(".buttons-excel").trigger();
    });
    $('#export-pdf').on('click', function(e) {
        downloadTable.button(".buttons-pdf").trigger();
    });
    $('#export-print').on('click', function(e) {
        downloadTable.button(".buttons-print").trigger();
    });
    $('#toggle-filter').click(function() {
        var widget = $('#filter-box-widget'),
            action = $(this).attr('data-action');
        if(action === 'show') {
          widget.slideDown(300);
          $(this).attr('data-action', 'hide');
        } else {
          widget.slideUp(300);
          $(this).attr('data-action', 'show');
        }
    });


    // var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    // var pieChart       = new Chart(pieChartCanvas)
    // var PieData        = JSON.parse(graphData)
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    // pieChart.Doughnut(PieData, pieOptions);

    // var pieChartCanvas2 = $('#pieChart2').get(0).getContext('2d')
    // var pieChart2       = new Chart(pieChartCanvas2)
    // var PieData2        = JSON.parse(graphDataJurnalAkreditasiByPenerbit)
    // // console.log(PieData2);
    // pieChart2.Doughnut(PieData2, pieOptions);

});

function getPenerbit() {
    $(document).on('change', '#penerbit', function() {
        var penerbit = $('#penerbit').val(),
            url = "<?= base_url('api')?>/"+penerbit;
        var id = "<?=set_value('id_penerbit') ? set_value('id_penerbit') : ''?>";
        if(penerbit !== '' || penerbit !== null) {
          $.get(url, function(data) {
              $('#auto-penerbit').empty();
              $.each($.parseJSON(data), function(index, val){
                  $('#auto-penerbit').append('<option value="'+val.id+'" '+(val.id == id ? "selected" : " ")+'>'+val.nama+'</option>');
              });
          });
        }
    });
}

function showFormAkreditasi() {
    var radioBtn = $('.radio-akreditasi'),
        elem = '<div class="form-group"><label for="#" class="col-sm-2 control-label">SK Akreditasi : </label><div class="col-md-9"><select class="form-control select2" name="sk" data-placeholder="SK" id="sk" required><option>-- Pilih SK --</option><?php if(isset($sk)) {foreach ($sk as $s){?><option value="<?=$s->id_sk?>"><?=$s->no_sk?></option><?php  }} ?></select></div></div><div class="form-group"><label for="#" class="col-sm-2 control-label">Peringkat SINTA </label><div class="col-md-9"><select class="form-control select2" name="peringkatsinta" data-placeholder="Peringkat SINTA" id="peringkatsinta" required><option>--Pilih Peringkat SINTA--</option><option value="S1">S1</option><option value="S2">S2</option><option value="S3">S3</option><option value="S4">S4</option><option value="S5">S5</option><option value="S6">S6</option></select></div></div><div class="form-group"><label for="#" class="col-sm-2 control-label">Tanggal Mulai SK</label><div class="col-md-9"><input class="form-control" name="mulaisk" value="<?=set_value('mulaisk')?>" placeholder="SK" type="date" required/><?php if(form_error("mulaisk")) : ?><div class="alert alert-danger alert-dismissible" style="margin-top:10px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo form_error("mulaisk"); ?></div><?php endif ?></div></div><div class="form-group"><label for="#" class="col-sm-2 control-label">Tanggal Berakhir SK</label><div class="col-md-9"><input class="form-control" name="akhirsk" value="<?=set_value('akhirsk')?>" placeholder="SK" type="date" required/><?php if(form_error('akhirsk')) : ?><div class="alert alert-danger alert-dismissible" style="margin-top:10px;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><?php echo form_error('akhirsk'); ?></div><?php endif ?></div></div></div></div>';
    radioBtn.on('change', function(){
        if ($('#aky').is(':checked')) {
            // $('#akreditasi').removeClass('hidden');
            // $('#akreditasi').show();
            $('#akreditasi').append(elem);
        } else {
            $('#akreditasi').empty();
        }
    });
}

function showPortalHelpBlock() {
    var portalOpt = $('#select-portal'),
        isOther = portalOpt.val() === '4' ? true : false,
        help = $('#portal-help');

      help.empty();
      if(isOther) {
         help.html("Mohon isikan full URL, contoh <b>https://ejournal.undip.ac.id/index.php/medianers</b>.");
      } else {
        help.html("Cukup diisi slash terakhir, contoh https://ejournal.undip.ac.id/index.php/medianers, cukup ditulis <b>'medianers'</b> saja ");
      }
}

// function appendFieldPengindex() {
//     var container = $('#field-pengindeks'),
//         selector = $('#pengindeks');
//
//     $('#pengindeks').on('change', function() {
//         var id = selector.val(),
//             name = selector.find('option:selected').text(),
//             name = name.split(' '),
//             url = "";
//
//         // container.empty();
//         $.each(id, function(index, val) {
//           url = name[index];
//         });
//
//         if($('#pengindex_'+url) <= 0) {
//           container.append('<input class="form-control" name="url_pengindeks[]" id="pengindex_'+url+'" placeholder="URL '+url+'" type="text" style="margin-top:5px; margin-bottom:5px;" />');
//         }
//
//     });
// }
function appendFieldPengindex() {
    $('#pengindeks').on('select2:select', function(e) {
        var name = e.params.data.text;
        var id = convertToSlug("url pengindeks "+name),
            index = convertToSlug(name);
        $('#field-pengindeks').append('<input class="form-control" name="url_pengindeks['+index+']" id="'+id+'" placeholder="URL '+name+'" type="text" style="margin-top:5px; margin-bottom:5px;" />');
    }).trigger('change');
}
function removeFieldPengindeks() {
    $('#pengindeks').on('select2:unselect', function(e) {
      var field = $('#field-pengindeks').find('input');
          // name = name.split(' ');
      var id = convertToSlug("url pengindeks "+e.params.data.text);
      field.each(function() {
          if($(this).attr('id') == id) {
              $(this).remove();
          }
      });
    }).trigger('change');
}

function convertToSlug(Text){
  return Text.toLowerCase().replace(/ /g,'_').replace(/[^\w-]+/g,'');
}

$(document).ready(function(){
  function formatOption (option) {
    console.log(option.element);
    var imgsrc = $(option.element).data('img');
    // console.log(imgsrc);
    if (!option.id || option.id <= 0) { return option.text; }
    var ob = '<img width="50" src="'+imgsrc+'"/>&nbsp;&nbsp;' +option.text;	// replace image source with option.img (available in JSON)
    return ob;
  };

  $(".select2jurnal").select2({
    // height:'resolve',
    templateResult: formatOption,
    templateSelection: formatOption,
    escapeMarkup: function (m) {
      return m;
    }
  });
  $('#select2-hiya-container').parent().css("height", "70px");
  $('#select2-hiya-container').css("padding-top", "7px");

  // =========== HIGHCHARTS ====================
 // ------ graph akreditasi by penerbit ------
 var graphDataJurnalAkreditasiByPenerbit = '<?=isset($graphDataJurnalAkreditasiByPenerbit) ? $graphDataJurnalAkreditasiByPenerbit : null?>';
 var pj = JSON.parse(graphDataJurnalAkreditasiByPenerbit);
 // console.log(pj)
 Highcharts.chart('penerbitJurnal', {
     chart: {
         plotBackgroundColor: null,
         plotBorderWidth: null,
         plotShadow: false,
         type: 'pie'
     },
     title: {
         text: 'Distribusi Penerbit Jurnal Terakreditasi 2018'
     },
     tooltip: {
         pointFormat: '{series.name}: <b>{point.y}</b>'
     },
     plotOptions: {
         pie: {
             allowPointSelect: true,
             cursor: 'pointer',
             dataLabels: {
                 enabled: true,
                 format: '<b>{point.name}</b>: {point.y}',
                 style: {
                     color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                 },
                 connectorColor: 'silver'
             }
         }
     },
     series: [{
         name: 'Jumlah Jurnal',
         data: pj
     }]
 });
 // ------ graph akreditasi by tahun ---------
 var graphDataJurnalAkreditasiByYear = '<?=isset($graphDataJurnalAkreditasiByYear) ? $graphDataJurnalAkreditasiByYear : null?>';
 var machartData = JSON.parse(graphDataJurnalAkreditasiByYear);
 // console.log(machartData);
 Highcharts.chart('machart', {
     chart: {
         zoomType: 'xy'
     },
     title: {
         text: 'Jumlah Jurnal Terakreditasi Tahun '+machartData.year
     },
     subtitle: {
         text: 'Pertahun dan Kumulatif ('+machartData.month+' '+machartData.year+')'
     },
     xAxis: [{
         categories: machartData.years,
         crosshair: true,
         title: {
           text: 'Tahun',
           style: {
               color: Highcharts.getOptions().colors[1]
           },
         }
     }],
     yAxis: [{ // Primary yAxis
         labels: {
             format: '{value}',
             style: {
                 color: Highcharts.getOptions().colors[1]
             }
         },
         title: {
             text: 'Jumlah Jurnal',
             style: {
                 color: Highcharts.getOptions().colors[1]
             }
         }
     }, { // Secondary yAxis
         title: {
             text: '',
             style: {
                 color: 'transparent'
             }
         },
         labels: {
             format: '',
             style: {
                 color: 'transparent'
             }
         },
         opposite: true
     }],
     tooltip: {
         shared: true
     },
     legend: {
         layout: 'vertical',
         align: 'left',
         x: 120,
         verticalAlign: 'top',
         y: 100,
         floating: true,
         backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || 'rgba(255,255,255,0.25)'
     },
     series: [{
         name: 'Kumulatif',
         type: 'column',
         yAxis: 1,
         data: machartData.kumulatif,
         tooltip: {
             valueSuffix: ''
         }

     }, {
         name: 'Jurnal',
         type: 'spline',
         data: machartData.jurnal,
         tooltip: {
             valueSuffix: ''
         }
     }]
 });

 // ------------- graph akreditasi by sinta ------------
 var graphDataJurnalAkreditasiBySinta = '<?=isset($graphDataJurnalAkreditasiBySinta) ? $graphDataJurnalAkreditasiBySinta : null?>';
 var jurSinta = JSON.parse(graphDataJurnalAkreditasiBySinta);
 Highcharts.chart('jurnalSinta', {
     title: {
         text: 'Jurnal Undip Terindeks Sinta S1-S6'
     },

     subtitle: {
         text: ''
     },

     xAxis: {
         categories: jurSinta.kategori,
         title: {
           text: 'Peringkat Sinta',
           style: {
               color: Highcharts.getOptions().colors[1]
           },
         }
     },

     yAxis: {
         title: {
           text: 'Jumlah Jurnal',
           style: {
               color: Highcharts.getOptions().colors[1]
           },
         }
     },

     series: [{
         type: 'column',
         colorByPoint: true,
         data: jurSinta.jumlah,
         showInLegend: false
     }]
 });

 // ------------- graph akreditasi by pengindeks ------------
 var graphDataJurnalAkreditasiByPengindeks = '<?=isset($graphDataJurnalAkreditasiByPengindeks) ? $graphDataJurnalAkreditasiByPengindeks : null?>';
 var jurPengindeks = JSON.parse(graphDataJurnalAkreditasiByPengindeks);
 console.log(jurPengindeks);
 Highcharts.chart('jurnalSintaFakultas', {
     title: {
         text: 'Jurnal Undip Terindeks DOAJ, Scopus, ESCI, EBSCO'
     },

     subtitle: {
         text: ''
     },

     xAxis: {
         categories: jurPengindeks.categories,
         title: {
           text: 'Pengindeks',
           style: {
               color: Highcharts.getOptions().colors[1]
           },
         }
     },

     yAxis: {
         title: {
           text: 'Jumlah Jurnal',
           style: {
               color: Highcharts.getOptions().colors[1]
           },
         }
     },

     series: [{
         type: 'column',
         colorByPoint: true,
         data: jurPengindeks.jumlah,
         showInLegend: false
     }]
 });

 //--------------- graph akreditasi by penerbit sinta ------
 var graphDataJurnalAkreditasiByPenerbitSinta = '<?=isset($graphDataJurnalAkreditasiByPenerbitSinta) ? $graphDataJurnalAkreditasiByPenerbitSinta : null?>';
 var jurPenerbitSinta = JSON.parse(graphDataJurnalAkreditasiByPenerbitSinta);
 Highcharts.chart('jurnalPenerbitSinta', {
     chart: {
         type: 'column'
     },
     title: {
         text: 'Jurnal Undip Terakreditasi Berdasarkan Peringkat Sinta Per Penerbit'
     },
     xAxis: {
         categories: jurPenerbitSinta.categories,
         title: {
             text: 'Penerbit'
         },
     },
     yAxis: {
         min: 0,
         title: {
             text: 'Jumlah Jurnal'
         },
         stackLabels: {
             enabled: true,
             style: {
                 fontWeight: 'bold',
                 color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
             }
         }
     },
     legend: {
         align: 'right',
         x: -30,
         verticalAlign: 'top',
         y: 25,
         floating: true,
         backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
         borderColor: '#CCC',
         borderWidth: 1,
         shadow: false
     },
     tooltip: {
         headerFormat: '<b>{point.x}</b><br/>',
         pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
     },
     plotOptions: {
         column: {
             stacking: 'normal',
             dataLabels: {
                 enabled: true,
                 color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
             }
         }
     },
     series: jurPenerbitSinta.series,
 });
 // ======== end of highcharts ===========
});
</script>
