<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class JobSearch extends Component
{
    public $searchByLocation = '', $types = [],$salery='';

    protected $listeners = ['changeFilter','resetFilter'];

    public function changeFilter($param, $value)
    {
        $this->$param = $value;
    }

    public function resetFilter()
    {
        $this->reset();
    }
    public function render()
    {

       $jobs= $this->searchJob();    
      
        return view('livewire.job-search', compact('jobs'));
    }
    public function searchJob(){
        $user = auth()->user();
        $p_id = $user->getAllPermissions()->pluck('id');
        $query = Post::whereHas('postDetail', function($q) use($p_id){
                $q->whereIn('job_timeline_id',  $p_id);
        })->where('approve',1);

        $query->when(! empty($this->types), function (Builder $q) {
            $q->whereHas('postDetail', function (Builder $q) {
                $q->whereIn('service_id', $this->types);
            });
        });

        if($this->salery!=''){
           $string= explode(",",$this->salery[0]);
           $query->whereBetween('job_budget', [$string[0], $string[1]]);
        }
        return $query->get();
    }
}