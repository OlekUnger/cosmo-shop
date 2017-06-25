<?php defined("CATALOG") or die("Access denied");?>

<li class="<?php if((int)$category['parent'] > 0) echo 'child-comment';?> comments_item">
    <div class="comment_content">
        <div class="comment_header">
            <span class="<?php if($category['is_admin']) {echo 'admin';} else {echo 'user';}?>"><?php echo htmlspecialchars($category['comment_author']);?></span>
            <span><?php echo $category['created'];?></span>
        </div>
        <div class="comment_text">
            <?php echo htmlspecialchars(nl2br($category['comment_text']));?>
        </div>
        <a class="replay_btn open-form_btn" data="<?php echo $category['comment_id'];?>">Ответить</a>
    </div>

    <?php if(isset($category['childs']) && $category['childs']):?>
        <ul >
            <?php echo categories_to_string($category['childs'],'comments_template.php')?>
        </ul>
    <?php endif;?>

</li>


