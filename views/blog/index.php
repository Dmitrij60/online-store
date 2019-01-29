<?php include ROOT . '/views/layouts/header.php'; ?>
  
                    <div id="content">
                        
                        <?php foreach ($blogList as $blogItem):?>
                            <div class="wrap-blog">

                            <div class="post">
                                <h2 class="title"><a href="/blog/<?php echo $blogItem['id'];?>"><?php echo $blogItem['title'];?></a></h2>
                                <div >
                                     <img class="wrap-image" src="<?php echo Blog::getImage($blogItem['id']); ?>" alt="" />
                                </div>
                               
                                <div class="entry">
                                    <p><?php echo $blogItem['short_content'];?></p>
                                </div>
                                 <p class="byline"><?php echo $blogItem['date'];?></p>
                                <div class="meta">
                                    <p class="links"><a href="/blog/<?php echo $blogItem['id'];?>" class="comments">Читать далее...</a></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>

                        
                    </div>
                    <!-- end div#content -->
                   
                    <div style="clear: both; height: 1px"></div>
                </div>
            </div>
            <!-- end div#page -->
         <?php include ROOT . '/views/layouts/footer.php'; ?>
