<?php include_once BASE_VIEW_PATH.'/elements/header.php';?>
              <!-- h2 stays for breadcrumbs --> 
                <h2><a href="index.php">Home</a> &raquo; <a href="#"><?php echo $this->cat->name?></a></h2> 
                
                <div id="main"> 
					<h3><?php echo $this->cat->name?> news List</h3> 
                    <table cellpadding="0" cellspacing="0"> 
                        <tr><th width="70">ID</th>
                        <th width="109">Title</th>
                        <th width="99" >Author</th>
                        <th width="86">Status</th>
                        <th width="135">Date</th>
                        <th width="199" style="text-align:center;">Action</th>
                        </tr> 
                        <?php foreach($this->posts as $post):?>
                        <tr> 
                            <td><?php echo $post->id?></td> 
                            <td><?php echo $post->title?></td> 
                            <td><?php echo $post->author?></td> 
                            <td><?php echo $post->getReadableStatus()?></td> 
                            <td><?php echo date("M d, Y",$post->time_created)?></td>
                            <td class="action"> 
                            <a href="<?php echo BASE_URL?>post_edit.php?id=<?php echo $post->id?>" class="view">Edit</a> 
                            <a href="" class="edit">View</a> 
                            <a onclick="return confirm(Are you sure want to delete this item?" href="<?php echo BASE_URL?>post_delete.php?id=<?php echo $post->id?>" class="delete">Delete</a>
                            
                            </td> 
                           
                        </tr> 
                     	<?php endforeach;?>                
                        <tr><td colspan="6">
                        <div id="page" class="pages"> 
                          <ul> 
                            <li>Tortal:<span>27</span></li> 
                            <li><span>1</span>/<span>2</span></li> 
                            <li>First</li> 
                            <li>Previous</li> 
                            <li class="on">1</li> 
                            <li class="page_a"><a href="?page=2" title="No.2">2</a></li> 
                            <li class="page_a"><a href="?page=2"  title="Next" >Next</a></li> 
                            <li class="page_a"><a href="?page=2"  title="Last" >Last</a></li> 
                          </ul> 
                          <div class="page_clear"></div> 
</div></td></tr>                        
                    </table> 
                    <a href="<?php echo BASE_URL."post_add.php?catid=".$this->cat->id?>">Add New Post</a>
                    <br /><br /> 
                </div> 
                <!-- // #main --> 
<?php include_once BASE_VIEW_PATH.'/elements/footer.php';?>              