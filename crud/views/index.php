<?php include_once 'elements/header.php';?>
              <!-- h2 stays for breadcrumbs --> 
                <h2><a href="index.php">Home</a> &raquo; <a href="#" class="active">Categories</a></h2> 
                
                <div id="main"> 
					<h3>Category List</h3> 
                    <table cellpadding="0" cellspacing="0"> 
                        <tr><th width="70">ID</th>
                        <th width="109">Title</th>
                        <th width="135">Position</th>
                        <th width="199" style="text-align:center;">Action</th>
                        </tr> 
                        <?php foreach($this->cats as $cat): ?>
                         <tr> 
                            <td><?php echo $cat->id?></td> 
                            <td><?php echo $cat->name?></td> 
                            <td><?php echo $cat->position?></td> 
                           
                            <td class="action"  style="text-align:center;"> 
                            <a href="<?php echo BASE_URL?>category_edit.php?id=<?php echo $cat->id?>" class="view">Edit</a> 
                           
                            <a onclick="return confirm('Are you sure to delete this item?')" href="<?php echo BASE_URL?>category_delete.php?id=<?php echo $cat->id?>" class="delete">Delete</a>
                            
                            </td> 
                           
                        </tr> 
                     	<?php endforeach;?>      
                    </table> 
                    <br /><br /> 
                </div> 
                
                <a href="<?php echo BASE_URL?>category_add.php" class="view">Add Category</a> 
                
                <!-- // #main --> 
<?php include_once 'elements/footer.php';?>              