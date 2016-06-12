<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box">
            <?php #echo form_open('booking/delete', array('id' => 'form-delete')); ?>                
            <div class="box-header">
               <!--<a href="<?php echo site_url('booking/add_form?year='.$selected_year); ?>"><i class="fa fa-plus-circle"></i> Add</a>-->                  
               &nbsp;&nbsp;
               <!--<a href="" id="a-delete"><i class="fa fa-trash"></i> Delete</a>-->
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
               <script>
                  $(function () {
                  function fillOptions(grid) {
                  var column = grid.getColumn({ dataIndx: 'company' });
                  column.filter.options = grid.getData({ dataIndx: ['company'] });
                  column.filter.cache = null;
                  grid.refreshHeader();
                  }
                  var colM = [
                  { title: "Customers", width: 400, dataIndx: "company",
                  filter: {
                    type: 'select',
                    prepend: { '': 'All Customers' },                  
                    valueIndx: 'company',
                    labelIndx: 'company',
                    condition: 'equal',
                    listeners: ['change']
                  }
                  },
                  { title: "Booking No.", width: 250, editable: false, dataIndx: "booking_name", editable: false }, 
                  { title: "Project Name", width: 350, editable: false, dataIndx: "project_name" },                         
                  { title: "PO Date", width: 160, editable: false, dataIndx: "po_date" },
                  { 
                    title: "Total Value", width: 225, align: "right", editable: false, dataType: "float", format: '$##,###',
                        summary: {
                            type: "sum"                           
                        },
                        dataType: "float", dataIndx: "total_value"
                  }
                  ];
                  var dataModel = {
                  location: "remote",
                  dataType: "JSON",
                  method: "GET",
                  url: "<?php echo site_url('main_booking/getBookingList/'.$_GET['year']); ?>"
                  //url: "/pro/orders/get",//for ASP.NET
                  //url: "orders.php",//for PHP
                  };
                  var groupModel = {
                  on: true,
                  dataIndx: ['company'],
                  //collapsed: [false, true],
                  collapsed: [false, true],
                  merge: true,
                  showSummary: [true, true],
                  grandSummary: true,
                  title: [
                  "{0} ({1})",
                  "{0} - {1}"
                  ]
                  };
                  var obj = {
                  height: 'flex',
                  width: '99%',
                  //width: 'flex',
                  toolbar: {
                  items: [{
                    type: 'button',
                    label: "Toggle grouping",
                    listener: function (evt) {
                        this.groupOption({
                            on: !grid.option('groupModel.on')
                        });
                    }
                  }]
                  },
                  dataModel: dataModel,
                  scrollModel: { autoFit: true },
                  colModel: colM,
                  numberCell: { show: true },
                  filterModel: { on: true, header: true, type: "local" },
                  selectionModel: { type: 'cell' },
                  groupModel: groupModel,
                  load: function (evt, ui) {
                  //options for ShipCountry filter.    
                  fillOptions(grid);
                  },
                  showTitle: true,
                  resizable: true,
                  virtualX: true,
                  virtualY: true,
                  hwrap: false,
                  wrap: false
                  };
                  var grid = pq.grid("#grid_group_rows", obj);
                  
                  });//end function
                  
                  function open_popup(id) {      
                      $("#popup")            
                      .dialog({
                          height: 'auto',
                          width: '60%',
                          title: id,
                          //width: 'auto',
                          modal: true,
                          open: function (evt, ui) {  
                              //$("#grid_popup").pqGrid(obj);
                          },
                          close: function () {
                              $("#grid_popup").pqGrid('destroy');
                          },
                          show: {
                              effect: "blind",
                              duration: 500
                          }
                      });
                  }
               </script>
               <style>
                  .pq-grid .darkblue td{
                  color:darkblue;
                  }
                  .pq-grid .blue td{
                  color:blue;
                  }    
                  .pq-grid .lightblue td{
                  background: lightblue;
                  }        
                  .pq-grid .ShipCountry .freight{
                  color:darkblue;        
                  }    
                  .pq-grid .ContactName .freight{
                  color:blue;        
                  }    
               </style>
               &nbsp;
               <button onclick="addForm();" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Booking</button>
               &nbsp;               
               <div id="grid_group_rows" style="margin:5px auto;"></div>
               <div id="popup" style="overflow:hidden;">
                  <div id="grid_popup"></div>
               </div>
            </div>
            <!-- /.box-body -->
         </div>
      </div>
   </div>
</section>
<!-- /.content -->
<script>
   function addForm() {
     $.get( "<?php echo site_url('main_booking/add_form/'.$_GET['year']); ?>", function( data ) {
       open_popup('Add New Booking');
       $( "#grid_popup" ).html( data );
     });
   }
   
   $('#a-delete').click(function(e) {
     e.preventDefault();
     var ctr = $('.checkbox:checked').length;
   
     if(ctr > 0) {
       if(confirm('Are you sure you want to delete selected rows?')) {
         //$('#form-delete').submit();
       }
     } else {
       alert('Please select rows to delete.');
     }
   });
   
   $('.checkbox').click(function() {
     if (! $(this).is(':checked')) {
       $('#main_checkbox').attr('checked', false);
     }
   });
</script>
<?php
   $uri_crud = $this->uri->segment(3);
   
   if(! empty($uri_crud)) {
     ?>
<script>
   setTimeout(function(){ window.location.href = '<?php echo site_url('booking?year='.$_GET['year']); ?>'; }, 1000);
</script>
<?php
   }
   ?>