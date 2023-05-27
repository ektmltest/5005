<?php
namespace App\Http\Livewire\Website;
use App\Models\ReadyProject;
use Livewire\Component;

class Like extends Component
{
    public function addorremovelikes($id)
    {
        $type = request("type");
        $flag = false;
        $action="append";
        if($type=="product"){
            $product = ReadyProject::findOrFail($id);
        if($product->likes->where("user_id",auth()->user()->id)->count()==0){
            $product->likes()->create([
                "user_id" => auth()->user()->id,
                "type"=> $type,
            ]);
            $action="add";
        }else{
            $product->likes()->where("user_id",auth()->user()->id)->delete();
            $action="delete";
            }

        $flag=true;

        }elseif($type=="photo"){
            $photo = Photo::findOrFail($id);
            if($photo->likes->where("user_id",auth()->user()->id)->count()==0){
                $photo->likes()->create([
                    "user_id" => auth()->user()->id,
                    "type"=> $type,
                ]);
                $action="add";
            }else{
                $photo->likes()->where("user_id",auth()->user()->id)->delete();
                $action="delete";
                }
            $flag=true;
            }
        return json_encode(["status"=>$flag,"action"=>$action],true);
    }

    public function render()
    {
        return view('livewire.website.like');
    }
}
