<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImages;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;
use App\Jobs\GoogleVisionRemoveFaces;
use App\Jobs\WatermarkImages;

class AnnouncementController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index', 'show', 'researchCategory', 'search');
    }

    public function search(Request $request){
        $search = $request->input('search');
        $announcements = Announcement::search($search)
        ->where('accepted', true)
        ->orderBy('created_at', 'DESC')
        ->paginate(8);
        

        return view('announcement.search', compact('search', 'announcements'));
    }

    
    public function researchCategory( Category $category){
    
        $announcements = Announcement::where('category_id', $category->id)
        ->where('accepted', true)
        ->orderBy('created_at', 'DESC')
        ->paginate(8);
        
        
        return view('announcement.researchCategory', compact('category', 'announcements'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::where('accepted', true)
        ->orderBy('updated_at', 'DESC')
        ->paginate(8);

        
        return view('announcement.index' , compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        // segreto bello
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())), 16, 36),
        );

        return view('announcement.create', compact('uniqueSecret') );
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $announcements = Announcement::create([

            'title' =>$request->input('title'),
            'price' =>$request->input('price'),
            'description' =>$request->input('description'),
            'category_id'=>$request->input('category'),
            'user_id'=>Auth::id(),

        ]);

        // dropzone
            $uniqueSecret = $request->input('uniqueSecret');

            $images = session()->get("images.{$uniqueSecret}",[]);
            
            $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);


            $images = array_diff($images, $removedImages);

            foreach($images as $image){
                $i = new AnnouncementImages();
                $fileName = basename($image);
                $newFileName = "public/announcements/{$announcements->id}/{$fileName}";
                Storage::move($image, $newFileName);

                $i->file = $newFileName;
                $i->announcement_id = $announcements->id;
                $i->save();

                GoogleVisionSafeSearchImage::withChain([
                    new GoogleVisionLabelImage($i->id),
                    new GoogleVisionRemoveFaces($i->id),
                    new ResizeImage($i->file ,180, 180),
                    new ResizeImage($i->file ,229, 229),
                    new ResizeImage($i->file ,306, 306),
                    new ResizeImage($i->file ,276, 276),
                    new ResizeImage($i->file ,120, 120),
                    new WatermarkImages($i->id),
                ])->dispatch($i->id);
            }

            File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route('home'))->with('message', __('ui.messageAcc'));
    }

    // dropzone
    public function uploadImage(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));


        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json([
                'id' => $fileName,

            ]);
    }
    
    public function removeImage(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');

        session()->push("removedimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);

        return response()->json('ok');
    }

    public function getImages(Request $request){
    
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}",[]);
        
        $removedImages = session()->get("removedimages.{$uniqueSecret}",[]);
        
        $images = array_diff($images,$removedImages);
        
        $data = [];
        foreach ($images as $image) {
            $data[]=[
                'id'=>$image,
                'src'=>AnnouncementImages::getUrlByFilePath($image,120,120)
            ];
        }

        return response()->json($data);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('announcement.show', compact('announcement'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, Request $request)
    {
        //    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect(route('home'))->with('message', __('ui.eliminatounosolo'));
    }

    public function destroyAll()
    {
        $announcements =Announcement::where('accepted', false);
        $announcements->delete();
        return redirect(route('home'))->with('message', __('ui.eliminatiTutti'));
    }
}
