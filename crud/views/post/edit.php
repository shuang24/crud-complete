 <?php include_once BASE_VIEW_PATH.'/elements/header.php';?>
            
                <!-- h2 stays for breadcrumbs --> 
                 <h2><a href="index.php">Home</a> »<a href="#"><?php echo $this->post->name?></a>»<a href="#" class="active">Edit</a></h2> 
                <form method="post" action="<?php echo BASE_URL?>post_data_post.php">
                <input type="hidden" name='postid' value="<?php echo $this->post->id?>">
                
                
                <div id="main"> 
					<h3>Edit post</h3> 
                    <table cellpadding="0" cellspacing="0"> 
                        <tbody><tr>
                        	<td width="114">Title</td>
                        	<td width="584"><input type="text" name="title" value="<?php echo $this->post->title?>" /></td>
                         </tr> 
                          <tr>
                        	<td width="114">Author</td>
                        	<td width="584"><input type="text" name= "author" value="<?php echo $this->post->author?>" /</td>
                         </tr> 
                         <tr>
                        	<td width="114">Status</td>
                        	<td width="584"><select name="status">
                            <option <?php if($this->post->status==Model\Post::POST_STATUS_PUBLISHED):?> selected="select" <?php endif?> value="<?php echo Model\Post::POST_STATUS_PUBLISHED?>">Publish</option>
                            <option <?php if($this->post->status==Model\Post::POST_STATUS_PENDING):?> selected="select" <?php endif?>value="<?php echo Model\Post::POST_STATUS_PENDING?>">Pending</option></select></td>
                         </tr> 
                          <tr>
                        	<td width="114">Content</td>
                        	<td width="584"><textarea cols="60" rows="10" name="content"><?php echo $this->cat->content?></textarea</td>
                         </tr>  
                         <tr>
                        	<td width="114">&nbsp;</td>
                        	<td width="584"><input type="submit"></td>
                         </tr>                   
                    </tbody></table> 
                    <br><br> 
                </div> 
                <!-- // #main --> 
                </form>
                <div class="clear"></div> 