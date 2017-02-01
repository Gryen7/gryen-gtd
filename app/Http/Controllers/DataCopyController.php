<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;

class DataCopyController extends Controller
{
    /**
     * 数据恢复
     */
    public function index()
    {
        $host = 'localhost';
        $oldDataBase = 'oldtargaryen';

        $user = 'root';
        $password = '123456';

        $oldConn = mysqli_connect($host, $user, $password, $oldDataBase);

        /** @noinspection SqlDialectInspection */
        $oldSql = ' SELECT title,description,create_time,update_time,content
                    FROM murderer_document 
                    LEFT JOIN murderer_document_article 
                    ON murderer_document.id=murderer_document_article.id';

        $result = $oldConn->query($oldSql);
        foreach ($result as $key => $value){
            $value['status'] = 1;
            $value['created_at'] = Carbon::createFromTimestamp($value['create_time']);
            $value['updated_at'] = Carbon::createFromTimestamp($value['update_time']);
            Article::create($value);
        }
        $oldConn->close();
        echo '<pre>';
        print_r('Done');
        echo '</pre>';
    }
}
