<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Like;
use App\Models\Imagen;
use App\Models\Comentario;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
public function store(Request $request){
        if($request->hasFile('image_path')){
            $filename = $request->image_path->getClientOriginalName();
            $request->image_path->storeAs('images',$filename,'public');
            $userId=$request->user()->id;
            $image = Imagen::create([
                'image_path' => $filename,
                'description' => $request->description,
                'user_id'=> $userId

            ]);
        }

        $request->user()->save();

        return redirect('ver.publi',["image"=>$image->id]);
    }
}