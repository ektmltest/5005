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

    public function department($query = false) {
        $category = $this->categories->first();
        if ($category)
            if ($query)
                return $category->department();
            else
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

    public function replies($limit = null, $ordered = null) {
        $query = $this->hasMany(ProjectReply::class);

        if ($ordered)
            $query = $query->orderBy('created_at', $ordered);

        if ($limit)
            $query = $query->limit($limit);

        return $query;
    }

    // ** attributes ** //
    public function getPriceAttribute() {
        if ($this->attributes['price'])
            return round($this->attributes['price'], 2);
        else
            return $this->calculateStartPrice();
    }

    public function getCalculatedPriceAttribute() {
        return $this->calculateStartPrice();
    }

    public function getDepartmentAttribute() {
        return $this->department();
    }

    private function calculateStartPrice() {
        $price = 0;
        foreach ($this->categories as $category) {
            $price += $category->start_price;
        }

        return round($price, 2);
    }
}
