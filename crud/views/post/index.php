<?php include_once BASE_VIEW_PATH.'/elements/header.php';?>
              <!-- h2 stays for breadcrumbs --> 
                <h2><a href="index.php">Home</a> &raquo; <a href="#" ><?php echo $this->cat->name?></a></h2> 
                
                <div id="main"> 
                    <h3>post List</h3> 
                    <h3><?php echo $this->cat->name?> news List</h3> 
                    <table cellpadding="0" cellspacing="0"> 
                        <tr><th width="70">ID</th>
                        <th width="109">Title</th>
                        <th width="135">Category</th>
                        <th width="109">Content</th>
                        <th width="135">Create time</th>
                        <th width="135">Author</th>
                        <th width="135">status</th>
                        <th width="199" style="text-align:center;">Action</th>
                        </tr> 
                        <?php foreach($this->posts as $post): ?>
                         <tr> 
                            <td><?php echo $post->id?></td> 
                            <td><?php echo $post->title?></td> 
                            <td><?php echo $post->category_id?></td> 
                            <td><?php echo $post->content?></td> 
                            <td><?php echo $post->time_created?></td> 
                            <td><?php echo $post->author?></td> 
                            <td><?php echo $post->getReadableStatus()?></td> 
                            <td class="action"  style="text-align:center;"> 
                            <a href="<?php echo BASE_URL?>post_edit.php?id=<?php echo $post->id?>" class="view">Edit</a> 
                           
                            <a onclick="return confirm('Are you sure to delete this item?')" href="<?php echo BASE_URL?>post_delete.php?id=<?php echo $post->id?>" class="delete">Delete</a>
                            
                            </td> 
                           
                        </tr> 
                        <?php endforeach;?>      
                    </table> 
                    <br /><br /> 
                </div> 
                
                <a href="<?php echo BASE_URL."post_add.php?cat=".$this->cat->id ?>" class="view">Add post</a> 
                
                <!-- // #main --> 
<?php include_once 'elements/footer.php';?>         
<?php include_once BASE_VIEW_PATH.'elements/footer.php';?>        