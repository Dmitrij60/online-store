<?php include ROOT . '/views/layouts/header.php'; ?>
            <div id="page">
                <div id="page-bgtop">
                    <div id="content">
                        <div class="wrap-blog-item">
                            <div class="post">
                                <h2 class="title"><a href="/blog/<?php echo $blogItem['id'];?>"><?php echo $blogItem['title'];?></a></h2>
                                <br/>
                               <img class="wrap-image" src="<?php echo Blog::getImage($blogItem['id']); ?>" alt="" />
                                <div class="entry">
                                    <p><?php echo $blogItem['content'];?></p>
                                </div>
                                 <p>  Дата публикации: <?php echo $blogItem['date'];?></p>
                                <div class="meta">
                                    <p class="links"><a href="/blog/" class="comments">Назад, к списку статей...</a></p>
                                </div>
                            </div>
                        </div>


                        
                    </div>
                    <!-- end div#content -->
                    <?php include ROOT . '/views/layouts/footer.php'; ?>
