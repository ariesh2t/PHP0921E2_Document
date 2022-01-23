<h2 class="header">Create Record</h2>
<hr>
<?php if(!empty($this->error)): ?>
    <div class="noti-error">
        <?php
        foreach($this->error as $e){
            echo $e ."<br>" ;
        }
        ?>
    </div>
<?php endif; ?>
<form action="" method="post">
    <div class="form-group">
        <label for="name">Name<span class="text-red">*</span></label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $_POST['name']: ''; ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description"><?php echo isset($_POST['description']) ? $_POST['description']: ''; ?></textarea>
    </div>
    <div class="form-group">
        <label for="salary">Salary</label>
        <input type="text" id="salary" name="salary" class="form-control" value="<?php echo isset($_POST['salary']) ? $_POST['salary']: ''; ?>">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <br>
        <?php
        $checked_male = '';
        $checked_female = '';
        if(isset($_POST['gender'])){
            $gender = $_POST['gender'];
            switch ($gender) {
                case 0: $checked_male = "checked"; break;
                case 1: $checked_female = "checked"; break;
            }
        }
        ?>
        <input type="radio" name="gender" id="male" value="0" <?php echo $checked_male; ?>> Male
        <input type="radio" name="gender" id="female" value="1" <?php echo $checked_female; ?>> Female
    </div>
    <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo isset($_POST['birthday']) ? date_format($_POST['birthday'],"m/d/Y") : ''; ?>">
    </div>
    <div class="butt">
        <input type="submit" name="submit" value="Save" class="btn btn-info">
        <input type="reset" value="Cancel" class="btn btn-default">
    </div>
</form>
<script>
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0,10);
    });
    document.getElementById('birthday').value = new Date().toDateInputValue();
</script>