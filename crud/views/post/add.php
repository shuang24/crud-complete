<?php include_once BASE_VIEW_PATH.'/elements/header.php';?>
                <h2><a href="index.php">Home</a> »<a href="#"><?php echo $this->cat->name?></a>»<a href="#" class="active">Add</a></h2> 
                <form method="post" action="<?php echo BASE_URL?>post_data_post.php">
                <div id="main"> 
                <input type="hidden" name="catid" value="<?php echo $this->post->id?>">
                    <h3>Add news</h3> 
                    <table cellpadding="0" cellspacing="0"> 
                        <tbody><tr>
                            <td width="114">Title</td>
                            <td width="584"><input type="text" name="title"></td>
                         </tr> 
                          <tr>
                            <td width="114">Author</td>
                            <td width="584"><input type="text" name="author"></td>
                         </tr>
                         <tr>
                            <td width="114">Status</td>
                            <td width="584"><select name="status"><option value="<?php echo Model\Post::POST_STATUS_PUBLISHED?>">Publish</option><option value="<?php echo Model\Post::POST_STATUS_PENDING?>">Pending</option></select></td>
                         </tr> 
                          <tr>
                            <td width="114">Content</td>
                            <td width="584"><textarea cols="60" rows="10" name="content"></textarea></td>
                         </tr>  
                         <tr>
                            <td width="114">&nbsp;</td>
                            <td width="584"><input type="submit"></td>
                         </tr>                   
                    </tbody></table> 
                    <br><br> 
                </div> 
                </form>
                <!-- // #main --> 
                
                <div class="clear"></div> 
<?php include_once BASE_VIEW_PATH.'/elements/footer.php';?>                