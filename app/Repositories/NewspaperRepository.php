<?php

namespace App\Repositories;

use App\Helpers\File;
use App\Helpers\Mailer;
use App\Helpers\Template;
use App\Models\Newspaper;

class NewspaperRepository {
    use File, Mailer;

    public function getAll($paginate = false, $num = 10, $limit = null) {
        if ($paginate)
            return Newspaper::paginate($num);
        else
            if ($limit)
                return Newspaper::limit($limit)->get();
            else
                return Newspaper::get();
    }

    public function findById($id) {
        return Newspaper::find($id);
    }

    public function findBySlug($slug) {
        return Newspaper::where('slug', $slug)->first();
    }

    public function getNextId($id) {
        $founded = Newspaper::select('id')->where('id', '>', $id)->first();
        if ($founded)
            return $founded->id;
        else
            return null;
    }

    public function getPreviousId($id) {
        $founded = Newspaper::select('id')->orderBy('id', 'DESC')->where('id', '<', $id)->first();
        if ($founded)
            return $founded->id;
        else
            return null;
    }

    public function getNextSlug($id) {
        $founded = Newspaper::select('slug')->where('id', '>', $id)->first();
        if ($founded)
            return $founded->slug;
        else
            return null;
    }

    public function getPreviousSlug($id) {
        $founded = Newspaper::select('slug')->orderBy('id', 'DESC')->where('id', '<', $id)->first();
        if ($founded)
            return $founded->slug;
        else
            return null;
    }

    public function findNext($id) {
        $founded = Newspaper::where('id', '>', $id)->first();
        if ($founded)
            return $founded;
        else
            return null;
    }

    public function findPrevious($id) {
        $founded = Newspaper::orderBy('id', 'DESC')->where('id', '<', $id)->first();
        if ($founded)
            return $founded;
        else
            return null;
    }

    public function count() {
        return Newspaper::count();
    }

    public function delete($id) {
        return Newspaper::destroy($id);
    }

    public function store(Template $new, $complex_data, $image) {
        $newspaper = Newspaper::create([
            'title' => [
                'en' => $new->title_en,
                'ar' => $new->title_ar
            ],
            'body' => [
                'en' => $complex_data['desc_en'],
                'ar' => $complex_data['desc_ar']
            ],
            'slug' => $new->slug,
            'image' => $this->prepareFilePath($image, 'admin/posts', true),
            'user_id' => auth()->user()->id
        ]);

        return $newspaper;
    }

    public function update($dataToUpdate, $newspaper) {

        Newspaper::where('id', $newspaper->id)->update($dataToUpdate);

        return $this->findById($newspaper->id);

    }
}
