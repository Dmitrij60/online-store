<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/blog">Управление Новостями</a></li>
                    <li class="active">Редактировать новость</li>
                </ol>
            </div>


            <h4>Редактировать Новость #<?php echo $id; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Заголовок новости</p>
                        <input type="text" name="title" placeholder="" value="<?php echo $blog['title']; ?>">

                         <p>Дата публикации</p>
                        <input type="text" name="date" placeholder="" value="<?php echo $blog['date']; ?>">

                       <p>Краткое описание</p>
                        <input type="text" name="short_content" placeholder="" value="<?php echo $blog['short_content']; ?>">


                        
                       <div class="inputarea">
                        <textarea name="content" placeholder="" value=""  rows="10"><?php echo $blog['content']; ?></textarea>
                        </div>


                       
                        <p>Изображение товара</p>
                        <img src="<?php echo Blog::getImage($blog['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $blog['image']; ?>">

                        

                      
                        
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        
                        <br/><br/>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

