<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Revisor;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\RevisorRequestMail;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RevisorRequest;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;
use App\Jobs\GoogleVisionRemoveFaces;
use App\Jobs\WatermarkImage;

class AnnouncementController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');
        
        
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret = $request->old(
            'uniqueSecret', 
            base_convert(sha1(uniqid(mt_rand())), 16, 36)
        );
        return view('announcement.createAnnouncement', compact('uniqueSecret'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        
        
        $announcement = Announcement::create([
            
            'title' => $request->title,
            'body' => $request->body,
            'price' => $request->price,
            'category_id' => $request->category,
            'user_id' => Auth::id()
        ]);
        
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);
        foreach ($images as $image) {
            $a = $announcement->id;
            $i = new AnnouncementImage();
            $fileName = basename($image);
            $newFileName = "public/announcements/{$a}/{$fileName}";
            
            Storage::move($image, $newFileName);

            

            $i->file =$newFileName;
            $i->announcement_id = $a;

            $i->save();


            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new WatermarkImage($i->id),
                new ResizeImage( $i->file, 300,300),
                new ResizeImage($i->file,120,120)
                
                
            ])->dispatch($i->id);

        
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        return redirect(route('home'))->with('message', ''.Auth::user()->name.', il tuo annuncio è stato caricato. Attendi che uno dei nostri revisori lo approvi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $annoucement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $annoucement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $annoucement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annoucement  $annoucement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $annoucement)
    {
        //
    }

    public function revisorRequest() 
    {
        return view('announcement.revisorRequest');
    }

    public function revisorRequestSubmit(RevisorRequest $request)
    {
        $email = Auth::user()->email;
        $message = $request->input('message');
        $revisor = compact('email', 'message');
        Mail::to('amministrazione@presto.it')->send(new RevisorRequestMail($revisor));
        return redirect(route('home'))->with('message', 'La tua richiesta è stata inviata.');
    }

    public function uploadImage(Request $request) {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));

        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(
            [
                'id' => $fileName,
            ]
        );
    }

    public function removeImage(Request $request) {
        
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request) {
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedImages);
        $data = [];
        foreach ($images as $image) {
            $data[] = [
                'id' => $image,
                'src' => AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        return response()->json($data);
    }

    //     public function esci(Request $request) {
    //         Auth::logout();
    //         return redirect(route('home'))->with('messaage', 'Hai effettuato il Logout');
    // }
}
