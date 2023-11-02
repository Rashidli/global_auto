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
                                <h4 class="card-title">Brendlər</h4>

                                        <a href="{{route('newbrands.create')}}" class="btn btn-primary">+</a>
                                <br>
                                <br>

                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">

                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Brand</th>
                                            <th>Məhsulları</th>
                                            <th>Status</th>
                                            <th>Əməliyyat</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($newbrands as $newbrand)

                                                <tr>
                                                    <th scope="row">{{$newbrand->id}}</th>
                                                    <td><img src="{{asset('storage/'.$newbrand->image)}}" style="width: 100px; height: 50px" alt=""></td>
                                                    <td><a href="{{route('oilproducts.index', $newbrand->id)}}" class="btn btn-primary">Məhsullar</a></td>
                                                    <td>{{$newbrand->is_active == true ? 'Active' : 'Deactive'}}</td>
                                                    <td>
                                                        <a href="{{route('newbrands.edit',$newbrand->id)}}" class="btn btn-primary" style="margin-right: 15px" >Edit</a>
                                                        <form action="{{route('newbrands.destroy', $newbrand->id)}}" method="post" style="display: inline-block">
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
                                    {{ $newbrands->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@include('includes.footer')
