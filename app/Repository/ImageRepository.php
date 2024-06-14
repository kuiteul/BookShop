<?php

 namespace App\Repository;

use App\Models\ImageModel; 

class ImageRepository
{

    protected $_image;

    public function __construct(ImageModel $image)
    {
        $this->_image = $image;
    }

    public function save(ImageModel $image, Array $input)
    {
        $image->image_name = $input['image-name'];
        $image->book_id_fk = $input['book-id'];

        $image->save();
    }

    public function store(Array $array)
    {
        $image = new $this->_image;

        try{
            $this->save($image, $array);
            return true;
        }
        catch(Exception $e)
        {
            return false;
        }
    }

    public function getImage(string $book_id): string
    {
        return $this->_image->select('image_name')->where('book_id_fk', $book_id)->get();
    }

    public function delete(string $book_id)
    {
        return $this->_image->where('book_id_fk', $book_id)->delete();
    }

}