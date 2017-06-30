<?php defined("CATALOG") or die("Access denied");?>
<li class="category_item">
    <a class="category_link" href="<?=PATH?>category/<?=$category['alias'];?>"><?=$category['title'];?></a>
    <?php if(isset($category['childs']) && $category['childs']):?>
        <ul>
            <?php echo categories_to_string($category['childs'])?>
        </ul>
    <?php endif;?>
</li>