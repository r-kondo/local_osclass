<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        set_disp_num();
    }
    
    $disp_num = get_disp_num();
?>



<div class="fv-body">
    <h2>お気に入り登録者の表示件数</h2>
      <form name="favorite_form" id="favorite_form" action="" method="POST">
          <select name="display_num">
              <option value="5" <?php if($disp_num == 5) echo 'selected'; ?>>5</option>
              <option value="10" <?php if($disp_num == 10) echo 'selected'; ?>>10</option>
              <option value="15" <?php if($disp_num == 15) echo 'selected'; ?>>15</option>
              <option value="20" <?php if($disp_num == 20) echo 'selected'; ?>>20</option>
              <option value="30" <?php if($disp_num == 30) echo 'selected'; ?>>30</option>
              <option value="50" <?php if($disp_num == 50) echo 'selected'; ?>>50</option>
          </select>
          <br />
          <button type="submit" class="btn">更新</button>
    </form>
</div>