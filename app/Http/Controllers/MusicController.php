<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Music;

class MusicController extends Controller
{
    function Music()
    {
        $music = Music::orderBy('id', 'desc')->get();
        return view('music.insert', [
            'music' => $music
        
        ]);
    }



    function MusicInsert(Request $req)
    {
       
        $music = new Music;
        $music->title = $req->title;
        $music->singer = $req->singer;
        $music->release_date = $req->release_date;
        $music->songs = $req->songs;
        $music->save();

       
    }


    function MusicDelete($id)
    {
        $music = Music::find($id);
        $music->delete();
        return back()->with('delete', 'Music Deleted Successfully');
    }


    function MusicViewEdit($id){
        $music = Music::find($id);


        
        return view('music.edit', [
            'music' => $music
        ]);
    }


    function MusicEdit(Request $req)
    {
        $music = Music::find($req->id);
        $music->title = $req->title;
        $music->singer = $req->singer;
        $music->release_date = $req->release_date;
        $music->songs = $req->songs;
        $music->save();

        return back()->with('success', 'Music Updated Successfully');
    }


    function AlbumSearch($singer)
    {
        $albums = Music::where('singer', 'like', '%' . $singer . '%')->get();
        return view('music.albums', [
            'albums' => $albums,
            'singer' => $singer
        ]);
    }


    function MusicLike($id)
    {
        $music = Music::find($id);
        $music->like = $music->like + 1;
        $music->save();
        return back()->with('like', 'Music Liked Successfully');
    }
}
