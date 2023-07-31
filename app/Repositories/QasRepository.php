<?php

namespace App\Repositories;
use App\Interfaces\QasRepositoryInterface;
use App\Models\Qas;

class QasRepository implements QasRepositoryInterface {

    public function getAll($paginate = false, $num = 10) {
        if ($paginate)
            return Qas::paginate($num);
        else
            return Qas::get();
    }

    public function delete($id) {
        return Qas::destroy($id);
    }

    public function store($data) {
        return Qas::create([
            'question' => [
                'en' => $data['question_en'],
                'ar' => $data['question_ar']
            ],
            'answer' => [
                'en' => $data['answer_en'],
                'ar' => $data['answer_ar']
            ],
            'type_id' => $data['type_id'],
            'user_id' => auth()->user()->id
        ]);
    }

}
