<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/news">Управление Новостями</a></li>
                    <li class="active">Редактировать Новость</li>
                </ol>
            </div>


            <h4>Добавить новую Новость</h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Заголовок новости</p>
                        <input type="text" name="title" placeholder="" value="">

                        <p>Дата публикации</p>
                        <input type="text" name="date" placeholder="" value="XXXX-XX-XX">

                        <p>Краткое описание</p>
                        <input type="text" name="short_content" placeholder="" value="">
                       
                       
                        <p>Текст новости</p>
                        <!--<div class="inputarea">
                        <input type="text" class="inputarea" name="content" placeholder="" value="" >
                        </div>-->
                       <div class="inputarea">
                        <textarea name="content" placeholder="" value=""  rows="10">  </textarea>
                        </div>

                        <p>Загрузить миниатюру</p>
                        <input type="file" name="image" placeholder="" value="">                        


                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

