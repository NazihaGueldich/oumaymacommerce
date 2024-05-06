<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Categories;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles=Articles::where('arch',0)->get()->toArray();
        return array_reverse($articles);
    }

    public function indexarchiv()
    {
        $articles=Articles::where('arch',1)->get()->toArray();
        return array_reverse($articles);
    }

    public function store(Request $request)
    {
        $imageName=null;
        if($file = $request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
        }
        $request = array_merge($request->except('image'),['image'=>$imageName]);
        Articles::create($request);
        return response()->json('Article créé !');
    }

    
    public function show($id)
    {
        $article = Articles::find($id);
        return response()->json($article);
    }

    public function update(Request $request,$id)
    {
        $article = Articles::find($id);
        $imageName=null;
        if($file = $request->hasFile('image')){
          $imageName= time().'.'.$request->image->extension();
          $request->image->move(public_path('images'),$imageName);
          $request = array_merge($request->except('image'),['image'=>$imageName]);
          $article->update($request);
        }else{
            $article->update($request->except('image'));
        }
        return response()->json('Article modifier !');
    }


    public function destroy(Categories $categories)
    {
        //
    }

    public function archive(Request $request)
    {
        $article = Articles::find($request->id);
        $article->arch=$request->val;
        $article->update();
        return response()->json("Etat d'article modifier !");
    }

    public function listcatgorie()
    {
        $categories=Categories::whereNull('id_categorie')->get();
        return array_reverse($categories)->toArray();
    }
}
