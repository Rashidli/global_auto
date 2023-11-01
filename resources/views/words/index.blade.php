@include('includes.header')



<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <h4 class="card-title">Sözlər</h4>

                            <a href="{{route('words.create')}}" class="btn btn-primary">+</a>
                            <br>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>Başlıq</th>

                                        <th>Əməliyyat</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($words as $word)
                                            <tr>
                                                <td title="{{$word->key}}">{{$word->word}}</td>
                                                <th><a href="{{route('words.edit', $word)}}" class="btn btn-primary">Edit</a></th>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <br>
                                {{ $words->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@include('includes.footer')
