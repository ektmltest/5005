<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['attachments', 'state'];

    // * user defined attributes * //
    protected $appends = ['price', 'department'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // public function category() {
    //     return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    // }

    public function categories() {
        return $this->belongsToMany(ProjectCategory::class, 'project_pivot_categories');
    }

    public function department() {
        $category = $this->categories->first();
        if ($category)
            return $category->department;
        else
            return null;
    }

    public function state() {
        return $this->belongsTo(ProjectState::class, 'project_state_id');
    }

    public function attachments() {
        return $this->hasMany(ProjectAttachment::class);
    }

    public function replies() {
        return $this->hasMany(ProjectReply::class);
    }

    // ** attributes ** //
    public function getPriceAttribute() {
        $price = 0;
        foreach ($this->categories as $category) {
            $price += $category->start_price;
        }

        return $price;
    }

    public function getDepartmentAttribute() {
        return $this->department();
    }
}
