<?php include_once BASE_VIEW_PATH.'/elements/header.php';?>
<h2><a href="index.php">Home</a> &raquo;<a href="#">Category</a>&raquo;<a href="#" class="active">Add</a></h2> 
                <form method="post" action="<?php echo BASE_URL?>category_post.php">

                <div id="main"> 
					<h3>Add Category</h3> 
                    <table cellpadding="0" cellspacing="0"> 
                        <tr>
                        	<td width="114">Title</td>
                        	<td width="584"><input type="text" name="name" value="" /></td>
                         </tr> 
                          <tr>
                        	<td width="114">Position</td>
                        	<td width="584"><input type="text"  name="position" value="" /></td>
                         </tr> 
                         
                         <tr>
                        	<td width="114">&nbsp;</td>
                        	<td width="584"><input type="submit" /></td>
                         </tr>                   
                    </table> 
                    
                    <br /><br /> 
                </div> </form>

<?php include_once BASE_VIEW_PATH.'/elements/footer.php';?>