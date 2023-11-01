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
                                <h4 class="card-title">Mağazalar</h4>

                                        <a href="{{route('images.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>

                                            <th>№</th>
                                            <th>Logo</th>
                                            <th>Mağazası</th>
                                            <th>Əməliyyat</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($images as $image)

                                            <tr>
                                                <td scope="row">{{$image->id}}</td>
                                                <td><img style="width: 50px; height: 50px" src="{{asset('storage/' . $image->image)}}" alt=""></td>
                                                <td>{{$image->shop->title}}</td>
                                                <td>
                                                    <a href="{{route('images.edit',$image->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                    <form action="{{route('images.destroy', $image->id)}}" method="post" style="display: inline-block">
                                                        {{ method_field('DELETE') }}
                                                        @csrf
                                                        <button onclick="confirm('Məlumatın silinməyin təsdiqləyin')" type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @endforeach

                                        </tbody>
                                    </table>
                                    <br>
                                    {{ $images->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@include('includes.footer')
