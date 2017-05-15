<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Tag;
use App\Poll;
use App\Option;
use App\User;

class PollController extends Controller
{

    /**
	* GET
    * /
	*/
    public function __invoke(Request $request) {
		
	//Redirect user to login page if trying to create new poll and not logged in
		
		$user = $request->user();
		
		if(!$user) {
			
		  Session::flash('message','You have to be logged in to create a new poll');
		  return redirect('/login');
    	}
		$tagsForCheckboxes = Tag::getTagsForCheckboxes();
  		 return view('create')->with([
			 
            'tagsForCheckboxes' => $tagsForCheckboxes
		]);
	}
    
	
	public function saveNewPoll(Request $request) {
		
		$errors = [];
		
		  $this->validate($request, [
            'title' => 'required|min:3',
            'option1' => 'required|min:2',
            'option2' => 'required|min:2',
			'tags' => 'required',
        	],$errors);
		
        # Add new poll to database
		
        $poll = new Poll();
        $poll->title = $request->title;
    	$poll->summary = $request->summary;
        $poll->user_id = $request->user()->id;
        $poll->save();
		
		
		
      	
		$options = [$request->option1,$request->option2,$request->option3,$request->option4,$request->option5];
		
		foreach($options as $option){
			
			if($option){
				
				
				$optionObj = new Option();
				$optionObj->name = $option;
				$optionObj->poll_id = $poll->id;
				$optionObj->save();
				
				
		
			}
		}
		
		
		$tags = ($request->tags) ?: [];
        $poll->tags()->sync($tags);
        $poll->save();
		
		
		 
       
		
        Session::flash('message', 'Your poll asking '.$request->title.' has been saved.');
        # Redirect the user to book index
        return redirect('/');
    }
	
	
	
	public function managePolls(Request $request) {
		
		$user = $request->user();
		$uid = $user->id;
		
		if(!$user) {
			
		  Session::flash('message','You have to be logged in to manage your polls');
		  return redirect('/login');
    	} else {
			
			$poll = new Poll();
			$polls = User::find($uid)->polls;
			
		return view('manage')->with([
			 
            'polls' => $polls
			
		]);
			
		}
		
	}
		
		public function view($id) {
			
			$poll = Poll::find($id);
			$options = $poll::find($id)->options;
			$category = $poll::find($id)->tags;
			return view('show')->with([
            'poll' => $poll,
			'options' => $options,
			'category'=>$category,
			]);
			
		}
   
}
		
	
