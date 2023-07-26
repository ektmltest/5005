<?php

namespace App\Repositories;

use App\Models\Newspaper;

class NewspaperRepository {
    public function getAll($limit = null) {
        if ($limit)
            return Newspaper::limit($limit)->get();
        else
            return Newspaper::get();
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
}
