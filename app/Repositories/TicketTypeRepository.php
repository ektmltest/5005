<?php
namespace App\Repositories;
use App\Interfaces\TicketTypeRepositoryInterface;
use App\Models\TicketType;

class TicketTypeRepository implements TicketTypeRepositoryInterface {
    public function getAllTicketTypes($paginate = false, $num = 10) {
        return $paginate ? TicketType::paginate($num) : TicketType::all();
    }

    public function findById($id) {
        return TicketType::find($id);
    }

    public function delete($id) {
        return TicketType::destroy($id);
    }

    public function store($data) {
        return TicketType::create([
            'name' => [
                'en' => $data['name_en'],
                'ar' => $data['name_ar']
            ],
            'user_id' => auth()->user()->id
        ]);
    }
}


?>
