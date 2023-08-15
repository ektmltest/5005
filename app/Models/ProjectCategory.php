<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $translatedAttributes = ['name'];

    public function projects() {
        return $this->belongsToMany(Project::class, 'projects');
    }

    public function department() {
        return $this->belongsTo(ProjectDepartment::class, 'project_department_id');
    }

    //////* attributes *//////
    public $locale = null;

    public function name(string $locale = null): Attribute {
        return Attribute::make(
            get: function ($value) {
                if ($this->locale) {
                    $loc = $this->locale;
                    $this->locale = null;
                    return json_decode($value, true)[$loc];
                }
                return json_decode($value, true)[app()->getLocale()];
            },
            set: fn ($value) => json_encode($value)
        );
    }

    public function nameLocale(string $locale) {
        $this->locale = $locale;
        return $this->name;
    }

    public function getStartPriceAttribute() {
        return round($this->attributes['start_price'], 2);
    }
}
