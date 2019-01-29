<?php

class Blog
{

    /**
     * Returns single blog item with specified id
     * @param integer $id
     */
   /* public static function getNewsItemById($id)
    {
        $id = intval($id);

        if ($id) {
                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM blog WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            echo 'asdasdsdddd';
           /*$blogItem = $result->fetch();
           return $blogItem;
           return $result->fetch();                       
        }
        
    }*/

    /**
     * Returns an array of blog items
     */
   public static function getBlogList() {
 
        $db = Db::getConnection();
        
       
        
        $result = $db->query('SELECT id, title, date, short_content '
                . 'FROM blog '
                . 'ORDER BY date DESC '
                . 'LIMIT 20');        
        $blogList = array();
        $i = 0;
        while($row = $result->fetch()) {
            $blogList[$i]['id'] = $row['id'];
            $blogList[$i]['title'] = $row['title'];
            $blogList[$i]['date'] = $row['date'];
            $blogList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $blogList;
    }



     /**
     * Returns single news item with specified id
     * @param integer $id
     */
    public static function getBlogItemById($id)
    {
        // Запрос к БД    
         $id = intval($id);

        if ($id) {
                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM blog WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
           /*$blogItem = $result->fetch();
           return $blogItem;*/
           return $result->fetch();                       
        }    
    }



    public static function createBlog($options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO blog '
                . '(title, date, short_content, content)'
                . 'VALUES '
                . '(:title, :date, :short_content, :content)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
       
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }




     /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteBlogById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM blog WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateBlogById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE blog
            SET 
                title = :title, 
                date = :date, 
                short_content = :short_content, 
                content = :content                 
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);       
        

        return $result->execute();
    }








     public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/blog/';
        // Путь к изображению товара
        $pathToBlogImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToBlogImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToBlogImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }



}
