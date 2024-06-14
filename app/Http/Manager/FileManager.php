<?php

    namespace App\Http\Manager;
    use App\Http\Requests;

class FileManager
{

    public function saveImage(Request $image)
    {
        $image = $request->file('image');

        if($image->isValid())
        {
            $path = config('images.path');
            $extension = $image->getClientOriginalExtension();
            $file_name = str::random(20).'.'.$extension;
            $image->move($path, $file_name);
        }
        else {
            return 'error';
        }

    }
}