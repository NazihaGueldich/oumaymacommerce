<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Articles;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories=Categories::where('arch',0)->whereNull('id_categorie')->get()->toArray();
        return array_reverse($categories);
    }

    public function indexarchiv()
    {
        $categories=Categories::where('arch',1)->whereNull('id_categorie')->get()->toArray();
        return array_reverse($categories);
    }

    public function Scatg()
    {
        $categories=Categories::where('arch',0)->whereNotNull('id_categorie')->get()->toArray();
        return array_reverse($categories);
    }

    public function Scatgarchiv()
    {
        $categories=Categories::where('arch',1)->whereNotNull('id_categorie')->get()->toArray();
        return array_reverse($categories);
    }

    public function store(Request $request)
    {
        $imageName=null;
        if($file = $request->hasFile('image')){
            $imageName= time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
        }
        $request = array_merge($request->except('image'),['image'=>$imageName]);
        Categories::create($request);
        return response()->json('Catégorie créé !');
    }

    
    public function show($id)
    {
        $categorie = Categories::find($id);
        return response()->json($categorie);
    }

    public function update(Request $request,$id)
    {
        $categorie = Categories::find($id);
        $imageName=null;
        if($file = $request->hasFile('image')){
          $imageName= time().'.'.$request->image->extension();
          $request->image->move(public_path('images'),$imageName);
          $request = array_merge($request->except('image'),['image'=>$imageName]);
          $categorie->update($request);
        }else{
            $categorie->update($request->except('image'));
        }
        return response()->json('Catégorie modifier !');
    }


    public function destroy(Categories $categories)
    {
        //
    }

    public function archive(Request $request)
    {
        $id=$request->id;
        $val=$request->val;
        $categorie = Categories::find($id);
        $categorie->arch=$val;
        $categorie->update();
        //ken bch n'archivi sc warticle
        if($categorie->id_categorie==null){
            //bch n'archivi les sous categorie
            Categories::where('id_categorie', $id)->update(['arch' => $val]);
            //bch n'archivi les articles
            $Scategories=Categories::where('id_categorie', $id)->get();
            $id_Scatgs=$Scategories->pluck('id')->toArray(); 
            Articles::whereIN('id_categorie', $id_Scatgs)->update(['arch' => $val]);
        }//ken bch n'archivi ken les article
        else{
            Articles::where('id_categorie', $id)->update(['arch' => $val]);
        }
        
        return response()->json('Etat du catégorie modifier !');
    }
}
