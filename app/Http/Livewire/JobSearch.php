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
        // dd($param);
        // $this->resetPage();
        $this->$param = $value;
        // dd($this->salery);
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
        $permissions = $user->getAllPermissions();
        $p_id = $permissions[0]->id;
        // dd($p_id);
        $query = Post::whereHas('postDetail', function($q) use($p_id){
                $q->where('job_timeline_id',  $p_id);
        });

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