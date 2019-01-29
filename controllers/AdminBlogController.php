<?php

/**
 * Контроллер AdminNewsController
 * Управление новостями в админпанели
 */
class AdminBlogController extends AdminBase
{
    /**
     * Action для страницы "Управление новостями"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список новостей
        if (
        $blogList = Blog::getBlogList()) ;
        else(die('kaput'));
        // Подключаем вид
        require_once(ROOT . '/views/admin_blog/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['date'] = $_POST['date'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Blog::createBlog($options);
                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/blog/{$id}.jpg");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/blog");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_blog/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретном заказе
        $blog = Blog::getBlogItemById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['title'] = $_POST['title'];
            $options['date'] = $_POST['date'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            print_r($options);
            // Сохраняем изменения
            if (Blog::updateBlogById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/blog/{$id}.jpg");
                }
            }


            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/blog");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_blog/update.php');
        return true;
    }


    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Blog::deleteBlogById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/blog");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_blog/delete.php');
        return true;
    }
}