<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
    

</head>
<body>
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-12">
            <div class="col-md-12">
                <h5>User list
                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>
                </h5>
            </div>
             
            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">
                     
                </tbody>
            </table>
        </div>
    </div>
         
</div>
 
        <!-- MODAL ADD -->
            <form class="add_modal">
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="my-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary addMore">Add another</button>
                        </div>
                        <div class="border p-3 fieldGroup">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Id</label>                             
                                <input type="text" readonly name="id" id="id" class="form-control" placeholder="User Id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">First Name</label>
                                <input type="text" name="first_name[]" id="first_name" class="form-control" placeholder="User Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Last Name</label>
                                <input type="text" name="last_name[]" id="last_name" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone Number</label>
                                <input type="text" name="phone_number[]" id="phone_number" class="form-control" placeholder="phone_number">
                            </div>
                        </div>



                        <div class="fieldGroupCopy" style="display: none;">
                            <div class="border p-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Id</label>                             
                                    <input type="text" readonly name="id" id="id" class="form-control" placeholder="User Id">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" name="first_name[]" id="first_name" class="form-control" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Last Name</label>
                                    <input type="text" name="last_name[]" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone Number</label>
                                    <input type="text" name="phone_number[]" id="phone_number" class="form-control" placeholder="phone_number">
                                </div>

                                <div class="input-group-addon"> 
                                    <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                                </div>
                            </div>
                        
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL ADD-->
 
        <!-- MODAL EDIT -->
        <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Id</label>                             
                            <input type="text" name="id_edit" id="id_edit" class="form-control" placeholder="User Code" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" name="first_name_edit" id="first_name_edit" class="form-control" placeholder="first Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Last Name</label>
                            <input type="text" name="last_name_edit" id="last_name_edit" class="form-control" placeholder="last Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Phone Number</label>
                            <input type="text" name="phone_edit" id="phone_edit" class="form-control" placeholder="phone">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->
 
        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete User  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->
 
<!-- <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
 
<script type="text/javascript">
    $(document).ready(function(){
        
        

        show_product(); //call function show all product
         
        $('#mydata').dataTable();
    
        //group add limit
        var maxGroup = 3;
        
        //add more fields group
        $(".addMore").click(function(){
            if($('body').find('.fieldGroup').length < maxGroup){
                var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
                $('body').find('.fieldGroup:last').after(fieldHTML);
            }else{
                alert('Maximum '+maxGroup+' groups are allowed.');
            }
        });
        
        //remove fields group
        $("body").on("click",".remove",function(){ 
            $(this).parents(".fieldGroup").remove();
        });
  
        //function show all product
        function show_product(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('user/user_data')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    console.log(data);
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].id+'</td>'+
                                '<td>'+data[i].first_name+'</td>'+
                                '<td>'+data[i].last_name+'</td>'+
                                '<td>'+data[i].phone_number+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-id="'+data[i].id+'" data-first_name="'+data[i].first_name+'" data-last_name="'+data[i].last_name+'" data-phone_number="'+data[i].phone_number+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
 
            });
        }
 
        //Save product
        $('#btn_save').on('click',function(){
            var id_array = [];
            var first_name_array = [];
            var last_name_array = [];
            var phone_number_array = [];


//             var id = $('#id').val();
            $('#id').each(function() {
                id_array.push($(this).val());
            });

//             var first_name = $('#first_name').val();
            $('#first_name').each(function() {
                first_name_array.push($(this).val());
            });

//             var last_name = $('#last_name').val();

            $('#last_name').each(function() {
                last_name_array.push($(this).val());
            });

            
            // var phone_number = $('#phone_number').val();
            $('#phone_number').each(function() {
                phone_number_array.push($(this).val());
            });
            var formdata = $('.add_modal').serialize();
            console.log(formdata);
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/save')?>",
                dataType : "JSON",
                data : formdata,
                success: function(data){
                    $('[name="first_name"]').val("");
                    $('[name="last_name"]').val("");
                    $('[name="phone_number"]').val("");
                    $('#Modal_Add').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var id = $(this).data('id');
            var first_name = $(this).data('first_name');
            var last_name = $(this).data('last_name');
            var phone_number = $(this).data('phone_number');
//             var price        = $(this).data('price');
             
            $('#Modal_Edit').modal('show');
            $('[name="id_edit"]').val(id);
            $('[name="first_name_edit"]').val(first_name);
            $('[name="last_name_edit"]').val(last_name);
            $('[name="phone_edit"]').val(phone_number);
//             $('[name="price_edit"]').val(price);
        });
 
        //update record to database
         $('#btn_update').on('click',function(){
            var id = $('#id_edit').val();
            var first_name = $('#first_name_edit').val();
            var last_name = $('#last_name_edit').val();
            var phone_number        = $('#phone_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/update')?>",
                dataType : "JSON",
                data : {id:id , first_name:first_name, last_name:last_name, phone_number:phone_number},
                success: function(data){
                    $('[name="id_edit"]').val("");
                    $('[name="first_name_edit"]').val("");
                    $('[name="last_name_edit"]').val("");
                    $('[name="phone_edit"]').val("");
                    $('#Modal_Edit').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('id');
             
            $('#Modal_Delete').modal('show');
            $('[name="product_code_delete"]').val(id);
        });
 
        //delete record to database
         $('#btn_delete').on('click',function(){
            var id = $('#product_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('user/delete')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('[name="product_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_product();
                }
            });
            return false;
        });
 
    });
 
</script>
</body>
</html>