<form method="post" action="academic_forum.php?questions">
    <div class="container">

    <label>Title:</label>
    <input name="title" type="text" class="form-control input-sm"  value="<?php echo isset($edit_asked)? $edit_asked['title']:'';?>" placeholder="Whats's your question?Be specific">
    <br/><br>

    <label>Question Description: </label>
        <textarea name="description" class="ckeditor" ></textarea>    <br><br>
    Tags: <br>
    <input name="tags" type="text" class="form-control" value="<?php echo isset($edit_asked)? $edit_asked['tags']:'';?>" placeholder="Atleast one keyword">
    <br/><br/>
        <?php if (isset($edit_asked)){?>

            <input type="submit" class="btn" name="editasked" value="Edit Question">

        <?php }else{?>
            <input type="submit" name="askquestion" class="btn btn-default" value="Ask Question">

        <?php } ?>

    </div>

</form>