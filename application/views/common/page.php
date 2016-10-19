<?php
/**
 * Author:LNC
 * Description: 底部页数导航
 * Date: 2016/10/19
 * Time: 下午 3:16
 */
?>
<div class="pagin">
    <div class="message">共<i class="blue"><?php echo $all_teachers;?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo $current_page?>&nbsp;</i>页</div>
    <ul class="paginList">
        <?php
        for($i=1;$i<=$pages;$i++){ ?>
            <li class="paginItem <?php if($i == $current_page){ echo 'current'; } ?>"><a href="/index.php/schoolmaster/index?page=<?php echo $i?>"><?php echo $i;?></a></li>
        <?php }
        ?>
    </ul>
</div>
