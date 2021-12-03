
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Todo List</title> 
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets';?>/css/style.css">
    
    
</head>
<body>
    
    <nav class="navbar navbar-expand topbar  static-top navbar_custom">
        <div class="container-fluid">
            <div class="logo">
            <a href=""><img class="main-logo" src="https://image.flaticon.com/icons/png/512/906/906334.png" alt="" /></a>
            </div>
            <div class="input-group">
              <h2 class="header_name_shadow"> &nbsp;Todo List</h2>
            </div>
            <div class="d-flex username">
                <?php 
                  $this->db->select('*');
                  $this->db->where('id',$id);
                  $m_data = $this->db->get('users');
                  $m_query = $m_data->row();
              ?>
                <b><?php echo ($m_data->num_rows()>0)?$m_query->name:''; ?></b>
                <a href="<?php echo base_url().'Welcome/';?>logout"><img class="logout_btn" src="<?php echo base_url().'assets/';?>img/logout.png" title="Logout" ></a>
            </div>
        </div>
    </nav>
    
    <div class="container">
   <!-- for pre loader -->
    <div class="se-pre-con"></div>
    
    <div class="row d-flex justify-content-center container">
    <div class="col-md-12">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title">
                    <h4 align="center">My Tasks</h4> 
                    </div>
                <div class="add-items "> 
                <form class="d-flex" method="post" action="<?php echo base_url().'Welcome';?>/add_task">
                    <input type="hidden" class="form-control todo-list-input" name="user_id" value="<?php echo ($m_data->num_rows()>0)?$m_query->id:''; ?>"> 
                  <input type="text" class="form-control todo-list-input" name="task" placeholder="Add new task" required> 
                <button type="submit" class="add btn btn-primary font-weight-bold add-btn">Add</button>   
                </form>
                
            </div>
            </div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                                <?php 
                                              $this->db->select('*');
                                              $this->db->where('user_id',$m_query->id);
                                              $data = $this->db->get('todos');
                                              $query = $data->result();
                                              
                                              foreach($query as $todo)
                                              { ?>

                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <div class="custom-checkbox custom-control"> 
                                                <input class="custom-control-input" id="exampleCustomCheckbox<?php echo $todo->id ?>" type="checkbox">
                                                <label class="custom-control-label" for="exampleCustomCheckbox<?php echo $todo->id ?>">&nbsp;</label>
                                            </div>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php echo $todo->task ?>
                                                </div>
                                                <div class="widget-subheading"><i><?php echo $todo->created_at ?></i></div>
                                            </div>
                                            <div class="widget-content-right"> 
                                            <!--<button class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></button>-->
                                            <a href="<?php echo base_url().'Welcome/delete_task/'.$todo->id;?>">
                                                <button class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </button> </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
                                              }
                                ?>
                               
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer">
                <!-- File upload form -->
                <div class="col-md-12" id="importFrm">
                    <form class="d-flex csv_form" method="post" id="import_csv" action="<?php echo base_url().'Welcome/';?>import" enctype="multipart/form-data">
                       <div class="form-group">
                        <label>Select CSV File :</label>
                        <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                        <input type="hidden" name="user_id" id="csv_file" value="<?php echo ($m_data->num_rows()>0)?$m_query->id:''; ?>" />
                       </div>
                       <br />
                       <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
                    </form>
                </div>
                <!--<button class="mr-2 btn btn-link btn-sm">Cancel</button><button id="show" class="btn btn-primary">Add Task</button></div>-->
            </div>
    </div>
    </div>
    </div>
  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">

// $(document).ready(function(){

//  $(".se-pre-con").css("visibility", "visible")

// });


</script>
</body>
</html>