<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Tag extends Model
{
    public function polls() {
        return $this->belongsToMany('App\Poll')->withTimestamps();
    }
    
    public static function getTagsForCheckboxes() {
        $tags = Tag::orderBy('name','ASC')->get();
        $tagsForCheckboxes = [];
        foreach($tags as $tag) {
            $tagsForCheckboxes[$tag['id']] = $tag->name;
        }
        return $tagsForCheckboxes;
    }
}