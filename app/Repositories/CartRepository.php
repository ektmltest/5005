<?php

namespace App\Repositories;
use App\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
use App\Models\ReadyProject;

class CartRepository implements CartRepositoryInterface {

    public function get(): Cart|null {
        return Cart::where('user_id', auth()->user()->id)->first();
    }

    public function create(): Cart {
        $cart = $this->get();
        if (!$cart)
            return Cart::create([
                'user_id' => auth()->user()->id,
            ]);
        else
            return $cart;
    }

    public function add(ReadyProject $project): Cart|null|int {
        $cart = $this->get();
        if (!$cart)
            return null;
        $exists = $cart->projects()->where('ready_project_id', $project->id)->exists();
        if (!$exists)
            $cart->projects()->attach($project->id);
        else
            return -1;
        return $this->get();
    }

    public function remove(ReadyProject $project): Cart|null|int {
        $cart = $this->get();
        if (!$cart)
            return null;
        $exists = $cart->projects()->where('ready_project_id', $project->id)->exists();
        if ($exists)
            $cart->projects()->detach($project->id);
        else
            return -1;
        return $this->get();
    }

    public function delete(): Cart|null {
        $cart = $this->get();
        if (!$cart)
            return null;
        $cart->delete();
        return $cart;
    }

    public function reset(): Cart {
        $this->delete();
        return $this->create();
    }

}
