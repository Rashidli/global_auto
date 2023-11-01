@include('includes.header')


<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <form action="{{route('words.update', $word->id)}}" method="post" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="key" value="{{$word->key}}">
                            <div class="col-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Söz Az</label>
                                        <input value="{{$word->translate('az')->word}}" type="text" name="az_word" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    @if($errors->first('az_content')) <small class="form-text text-danger">{{$errors->first('az_content')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Söz En</label>
                                        <input value="{{$word->translate('en')->word}}" type="text" name="en_word" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    @if($errors->first('az_content')) <small class="form-text text-danger">{{$errors->first('az_content')}}</small> @endif
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Söz Ru</label>
                                        <input value="{{$word->translate('ru')->word}}" type="text" name="ru_word" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    @if($errors->first('az_content')) <small class="form-text text-danger">{{$errors->first('az_content')}}</small> @endif
                                </div>


                                <div class="mb-3">
                                    <button class="btn btn-primary">Yadda saxla</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@include('includes.footer')
