@extends('frontend.layouts.app')

@section('content')
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <div class="display-6">Assessment of {{ $assessment_detail->freelancerSkill[0]->service->name }}</div>
                <h6> {{ $assessment_detail->name }}</h6>
              
                <form action="{{route('accessments.answere.store')}}" method="post">
                    @foreach ($assessment as $key=>$item)
                        @csrf
                        <hr>
                        <p class="mt-2 "> Question No {{ $key+1 }}</p>
                       
                        <input type="text" class="form-control mt-2" disabled value="{{ $item->question }}" name="question[]" />
                        <input type="hidden" name="id[]" value="{{ $item->id }}" />
                        <input type="hidden" name="assessment_id" value="{{ $item->assessment_id }}" />

                        <div class="form-check mt-2">
                            <input class="form-check-input" value="{{ $item->option_1 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_1 }}
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" value="{{ $item->option_2 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_2 }}
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" value="{{ $item->option_3 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_3 }}
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" value="{{ $item->option_4 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_4 }}
                            </label>
                        </div>
                    @endforeach
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                    
            </form>
            </div>
        </div>
    </div>
</section>            


@endsection