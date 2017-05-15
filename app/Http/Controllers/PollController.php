<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Tag;
use App\Poll;
use App\Option;
use App\User;
use App\Comment;

class PollController extends Controller
{

    
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
		
		//validate request and if passed save poll to db else send back and show errors
		
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
		
		//ensure user is logged in and send to a list of user polls
		
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
		
			//view poll information based on poll id
			
			$poll = Poll::find($id);
			$comments =$poll::find($id)->comments->take(10);
			$options = $poll::find($id)->options;
			$category = $poll::find($id)->tags;
			$uid = $poll->user_id;
			$createdBy = User::find($uid);
			
			foreach($comments as $comment){
		
				$user = User::find($comment->user_id);
				$userName = $user->name;
				$comment->push('userName');
				$comment->userName = $userName;
			}
			
			return view('show')->with([
            'poll' => $poll,
			'options' => $options,
			'category'=>$category,
			'createdBy'=>$createdBy->name,
			'comments'=>$comments,
			]);
			
		}
	
	public function vote(Request $request){
		
		//grab the option voted for and add one to votes in table
		
		$id = $request->vote;
		$option = Option::find($id);
		$option->increment('votes',1);

		return redirect()->back();
	}
	
	
	public function deletePoll($id, Request $request){
		
		$poll = Poll::find($id);
		$uid = $poll->user_id;
		$requestUid = $request->user()->id;
		
		//Ensure this is the correct user to delete the poll if so send to delete confirmation
		
		if($uid !== $requestUid) {
			
			Session::flash('message','Either we made a mistake, or you do not own this poll to delete it...');	
			return redirect('/');
		}
		
	}
	
	
	public function editPoll($id, Request $request){
		
		$poll = Poll::find($id);
		$uid = $poll->user_id;
		$requestUid = $request->user()->id;
	
		//Ensure this is correct user to edit the poll if so send to edit form
		
		if($uid !== $requestUid) {
			
			Session::flash('message','Either we made a mistake, or you do not own this poll to edit it...');	
			return redirect('/');
		} else {
		
		
		$comments =$poll::find($id)->comments->take(10);
		$options = $poll::find($id)->options;
		$category = $poll::find($id)->tags;
		$tagsForCheckboxes = Tag::getTagsForCheckboxes();
  		
		
			return view('editpoll')->with([
            'polls' => $poll,
			'options' => $options,
			'tagsForCheckboxes' => $tagsForCheckboxes
				
			]);
			
			
		}
		
	}
	
	
	public function saveChanges(Request $request){
		
		//validate request if errors send back if not update db
		
		$errors = [];
		
		  $this->validate($request, [
            'title' => 'required|min:3',
            'option1' => 'required|min:2',
            'option2' => 'required|min:2',
			'tags' => 'required',
        	],$errors);
		
		if($errors){
			
			return redirect()->back()->with([$errors]);
			
		} else {
			
			$id = $request->id;
			$poll = Poll::find($id);
			
			$poll->title = $request->title;
			$poll->summary = $request->summary;
			$poll->user_id = $request->user()->id;
			$poll->save();
			$oldOptions = $poll::find($id)->options;
			
				
			$newOptions = [$request->option1,$request->option2,$request->option3,$request->option4,$request->option5];
		
		//delete options that are not a part of poll anymore deleting because results could be manipulated by changing no to yes etc.
			
			foreach($oldOptions as $oldOption){
				
				$match = false;
				
					foreach($newOptions as $newOption){
						
						if($oldOption->name == $newOption){
							
							$match = true;
							unset($newOptions[array_search($newOption,$newOptions)]);
					}
				
				
					if($match==false){
						
						$oldOption->delete();
						
					}
					
				}
				
			}
			
			

			foreach($newOptions as $option){

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

			
			
		}
		
		Session::flash('message','Your changes were saved...');
		return redirect("polls/$id");
	}
	
	
	
	
	public function confirmDelete(){
		
		
	}
	
	public function saveComment(Request $request){
	
	//validate there was a comment submitted if so it
		
		
		
		$errors = [];
		
		  $this->validate($request, [
            'comment' => 'required|min:5',
        	],$errors);
		
		
		$pollId = $request->id;
		$uid = $request->user()->id;
		$comment = $request->comment;
		
		$commentObj = new Comment();
		$commentObj->user_id = $uid;
		$commentObj->comment = $comment;
		$commentObj->poll_id = $pollId;
		$commentObj->save();
		return redirect()->back();
	}
   
	public function showRandom(){
		
		
		/*construct an array with all the poll information 
			to send back to the page
			If the number of polls total is less than 10, only send back
			3 random polls, otherwise send back 10
			
			*/
		
			$polls = [];
			$count = Poll::count('id');
			$max = Poll::max('id');
			$min = Poll::min('id');
		
			if($count < 10) {
				
				for($i = 0; $i<3; $i++){
					
					 $id = rand($min,$max);
					 $poll = Poll::find($id);
					 $comments =$poll::find($id)->comments->take(10);
					 $options = $poll::find($id)->options;
					 $category = $poll::find($id)->tags;
					 $uid = $poll->user_id;
					 $createdBy = User::find($uid);
			
						foreach($comments as $comment){

							$user = User::find($comment->user_id);
							$userName = $user->name;
							$comment->push('userName');
							$comment->userName = $userName;
						}
					
					$polls[$i] = [ 'poll' => $poll,
								   'options' => $options,
								   'category'=>$category,
								   'createdBy'=>$createdBy->name,
								   'comments'=>$comments,];
								
				}
				
			}else {
				
				for($i = 0; $i<10; $i++){
					
					 $id = rand($min,$max);
					 $poll = Poll::find($id);
					 $comments =$poll::find($id)->comments->take(10);
					 $options = $poll::find($id)->options;
					 $category = $poll::find($id)->tags;
					 $uid = $poll->user_id;
					 $createdBy = User::find($uid);
			
						foreach($comments as $comment){

							$user = User::find($comment->user_id);
							$userName = $user->name;
							$comment->push('userName');
							$comment->userName = $userName;
						}
					
					$polls[$i] = [ 'poll' => $poll,
								   'options' => $options,
								   'category'=>$category,
								   'createdBy'=>$createdBy->name,
								   'comments'=>$comments,];
								
				}
				
				
				
				
				
				
			}
		
			return view('browse')->with([
            'polls' => $polls,
			
			]);
		
	}
}
		
	
