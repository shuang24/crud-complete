<?php include_once BASE_VIEW_PATH.'/elements/header.php';?>
<h2><a href="index.php">Home</a> &raquo;<a href="#">Category</a>&raquo;<a href="#"><?php echo $this->cat->name?></a>&raquo;<a href="#" class="active">Edit</a></h2> 
                <form method="post" action="<?php echo BASE_URL?>post_save.php">
                <input type="hidden" name='id' value="<?php echo $this->cat->id?>">
                <div id="main"> 
                    <h3>Edit Post</h3> 
                    <table cellpadding="0" cellspacing="0"> 
                        <tr>
                            <td width="114">Title</td>
                            <td width="584"><input type="text" id="title" name="title"  /></td>
                         </tr> 
                         <tr>
                            <td width="114">Category</td>
                            <td width="584"><select id="category_id" name="category_id">
                                <?php foreach ($this->cats as $cat) :?>
                                    <option value=<?php echo $cat->id;?> <?php if($this->cat_id==$cat->id) echo "SELECTED"?>><?php echo $cat->name ?></option>
                                <?php endforeach;?>
                            </select></td>
                         </tr> 
                          <tr>
                            <td width="114">Content</td>
                            <td width="584"><input type="text" id="content"  name="content" /></td>
                         </tr> 
                          <tr>
                            <td width="114">Author</td>
                            <td width="584"><input type="text" id="author"  name="author"  /></td>
                         </tr> 
                          <tr>
                            <td width="114">Status</td>
                            <td width="584"><select id="status" name="status">
                                <option value="0"  "SELECTED">Pending</option>
                                <option value="1" >Published</option>
                            </select></td>
                         </tr> 
                         <tr>
                            <td width="114">&nbsp;</td>
                            <td width="584"><input type="submit" /></td>
                         </tr>                   
                    </table> 
                    
                    <br /><br /> 
                </div> </form>

<?php include_once BASE_VIEW_PATH.'/elements/footer.php';?>