<?php
class NotFoundController{
    public function __construct(){
        http_response_code(404);
        include 'webapp/view/not-found.html';
    }

}
?>