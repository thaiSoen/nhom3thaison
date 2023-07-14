<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Music;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    public function home()
    {
        $musics = Music::latest()->paginate(5);

        return view('music.home', compact('musics'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function index()
    {
        dd("check");
        $musics = Music::latest()->paginate(5);

        return view('music.index', compact('musics'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $categories = Category::all();

        return view('music.create', ['categories' => $categories]);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [

                'name' => 'required',
               
                
                'price' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:100000',
                
            ]);

            if ($validator->fails()) {

                return redirect()->back()

                    ->withErrors($validator)

                    ->withInput();

            }

            if ($request->hasFile('image')) {

                $file = $request->file('image');

                $path = public_path('image/music');

                $fileName = time() . '_' . $file->getClientOriginalName();

                $file->move($path, $fileName);

            } else {

                $fileName = 'noname.jpg';

            }
            //audio
           

            $newMusic = new Music();
            $newMusic->name = $request->name;
           
            $newMusic->image = $fileName;
           
            $newMusic->price = $request->price;
            $newMusic->description = $request->description;
    
            $newMusic->category_id = $request->category;

            $newMusic->save();

            return redirect()->route('music.index')

                ->with('success', 'Food Add successfully.');
        }
        
    }
    public function show($id)
    {
        $music = Music::find($id);

        return view('music.show', ['music' => $music]);
    }
    public function edit($id)
    {
        $categories = Category::all();

        $music = Music::with('category')->find($id);

        return view('music.edit', ['music' => $music, 'categories' => $categories]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                
                'price' => 'required',
                'description' => 'required',
               
            ]);

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();

            }

            $fileName = "";

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $path = public_path('image/music');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move($path, $fileName);
            }
          

            $music = Music::find($id);
            if ($music != null) {
                $music->name = $request->name;
               
                $music->image = $fileName;
               
                $music->price = $request->price;
                $music->description = $request->description;
          
                $music->category_id = $request->category;
                if ($fileName) {
                    $music->image = $fileName;
                  

                }
                $music->save();
                return redirect()->route('music.index')
                    ->with('success', 'Food updated successfully');
            } else {
                return redirect()->route('music.index')
                    ->with('Error', 'Food not update');

            }

        }
    }
    public function destroy($id)
    {
        $music = Music::find($id);

        $image_path = "/image/music/.$music->image"; 
      
        if (File::exists($image_path)) {

            File::delete($image_path);

        }
       

        $music->delete();

        return redirect()->route('music.index')

            ->with('success', 'Food deleted successfully');
    }

}
