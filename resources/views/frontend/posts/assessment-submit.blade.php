@extends('frontend.layouts.app')

@section('content')
<section class="space-ptb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10 col-md-12">
                <form action="{{route('accessments.answere.store')}}" method="post">
                    @foreach ($assessment as $key=>$item)
                        @csrf

                    <input  type="text" class=""  value="{{ $item->question }}" name="question[]" />
                        <input type="hidden" name="id[]" value="{{ $item->id }}" />
                        <input type="hidden" name="assessment_id" value="{{ $item->assessment_id }}" />

                        <div class="form-check">
                            <input class="form-check-input" value="{{ $item->option_1 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_1 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="{{ $item->option_2 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_2 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="{{ $item->option_3 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_3 }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="{{ $item->option_4 }}" type="radio" name="answere{{ $key }}" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $item->option_4 }}
                            </label>
                        </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
            </div>
        </div>
    </div>
</section>            


@endsection