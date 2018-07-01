<?php

namespace App\Http\Controllers;

use App\Http\Controllers\SocialClasses\AuthenticationClass;
use App\Topics;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsertController extends Controller
{
   public function index()
   {
       $user   = $this->getCurrentUser() ;
       $topics = $user->topics()->latest()->paginate(5) ;
       return view('insert.index',compact('topics')) ;
   }

   public function create()
   {
      return view('insert.create') ;
   }

   public function edit($id)
   {
       $topic = Topics::findOrFail($id) ;
       return view('insert.edit',compact('topic')) ;
   }

   public function store(Request $request)
   {
        // VALIDATION REQUEST
        $this->validate($request,[
            'title' => 'required' ,
            'img'   => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // CHECK IF REQUEST HAS FILE TO UPLOAD
        if ($request->hasFile('img')){
            $request->merge(['image' => $request->file('img')->store('topics')]) ;
        }

        // SET CURRENT USER
        $request->merge(['user_id' => $this->getCurrentUser()['id']]) ;

        // CREATE A NEW TOPIC
        Topics::create($request->all()) ;
        return redirect()->to(Url('/insert'))->with(['success' => 'Data has been Saved Successfully !']) ;
   }

   public function update(Request $request,$id)
    {
        // CHECK IF EXIT IF YES GET IT
        $topic = Topics::findOrFail($id) ;

        // VALIDATION REQUEST
        $this->validate($request,[
            'title' => 'required' ,
            'img'   => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // CHECK IF REQUEST HAS FILE TO UPLOAD
        if ($request->hasFile('img')){
            $request->merge(['image' => $request->file('img')->store('topics')]) ;

            // DELETE CURRENT IMAGE FROM SERVER
            $this->_unlinkFiles($topic->getOriginal('image')) ;
        }else{
            $request->merge(['image' => $topic->getOriginal('image')]) ;
        }

        // SET CURRENT USER
        $request->merge(['user_id' => $this->getCurrentUser()['id']]) ;

        // CREATE A NEW TOPIC
        $topic->update($request->all()) ;
        return redirect()->to(Url('/insert'))->with(['success' => 'Data has been Saved Successfully !']) ;
    }

    public function destroy($id)
    {
        // GET TOPIC ROW
        $topic = Topics::findOrFail($id) ;

        // DELETE CURRENT IMAGE FROM SERVER
        $this->_unlinkFiles($topic->getOriginal('image')) ;

        // FIRE DELETE
        $topic->delete() ;

        // RETURN REDIRECT MSG
        return redirect()->back()->with(['success' => 'Data has been Deleted Successfully !']) ;
    }


}
