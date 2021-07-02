<?php
/**
 * Conversione di $_POST in oggetto
 * @param array $post
 */
function setPostObject($post)
{
    $object = new stdClass();
    foreach ($post as $key => $value) {
        $object->$key = $value;
    }
    
    return( json_decode(json_encode($object), FALSE) );
}
