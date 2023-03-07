<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Like;
use App\Models\Imagen;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function upload(Request $request){
            return view('create',['user'=>$request->user(),
        ]);
        }

         public function crear(Request $request)
    {
        //
        if ($request->hasFile('rutafoto')){
            xdebug_break();
            $filename=$request->file('rutafoto')->getClientOriginalName();
            $ruta = $request->file('rutafoto')->storeAs('imagenes',$filename,'public');
            $usId=Auth::user()->id;
            $img = Imagen::create([
                'imagen_path'=>$filename,
                'description'=>$request->input('description'),
                'user_id'=>$usId
            ]);
        }

        return Redirect::route('imagenUser');
    }

    public function store(Request $request, User $user)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function shows()
    {
        return view("imagen", ["imagens" => Imagen::All()]);
    }

    public function showOne($id){

        $image = Imagen::find($id);

        if(!$image){
            abort(404);
        }
        return view('image', [
            'image' => $image,
            'comments' => Comentario::all(),
            'users' => User::all(),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */







     public function edit(Imagen $imagen)
    {
        //
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {
        //
    }


    public function showUser(){
        return view("imagenUser",
        ["images" => Imagen::All(),
         "id"=> Auth::user()->id,
         "name" => Auth::user()->name]);
    }
}
