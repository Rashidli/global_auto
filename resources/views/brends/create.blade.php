@include('includes.header')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <form action="{{route('brends.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <h4 class="card-title">Brend əlavə et</h4>
                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" name="main_id" value="{{$id}}">
                                    <div class="mb-3">
                                        <label class="col-form-label">Başlıq az</label>
                                        <input class="form-control" type="text" name="az_title">
                                        @if($errors->first('az_title')) <small class="form-text text-danger">{{$errors->first('az_title')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Başlıq en</label>
                                        <input class="form-control" type="text" name="en_title">
                                        @if($errors->first('en_title')) <small class="form-text text-danger">{{$errors->first('en_title')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">Başlıq ru</label>
                                        <input class="form-control" type="text" name="ru_title">
                                        @if($errors->first('ru_title')) <small class="form-text text-danger">{{$errors->first('ru_title')}}</small> @endif
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label">File</label>
                                        <input class="form-control" type="file" name="image">
                                        @if($errors->first('image')) <small class="form-text text-danger">{{$errors->first('image')}}</small> @endif
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

