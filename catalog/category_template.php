<li class="category_item">
    <a class="category_link" href="<?=PATH?>category/<?=$category['id'];?>"><?=$category['title'];?></a>
    <?php if($category['childs']):?>
        <ul>
            <?php echo categories_to_string($category['childs'])?>
        </ul>
    <?php endif;?>
</li>