<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model
{

    /**
	*
	*/
    public function polls() {
        return $this->belongsTo('App\Poll');
    }
	
	public function users(){
		return $this->belongsTo('App\User');
	}
}