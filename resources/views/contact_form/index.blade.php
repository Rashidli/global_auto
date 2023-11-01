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
                            <h4 class="card-title">Əlaqə mesajları</h4>

{{--                            <a href="{{route('contact_forms.create')}}" class="btn btn-primary">+</a>--}}
                            <br>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Adı</th>
                                        <th>Emaili</th>
                                        <th>Telefonu</th>
                                        <th>Mesajı</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contact_forms as $contact_form)

                                        <tr>

                                            <td scope="row">{{$contact_form->id}}</td>
                                            <td >{{$contact_form->name}}</td>
                                            <td >{{$contact_form->email}}</td>
                                            <td >{{$contact_form->phone}}</td>
                                            <td >{{$contact_form->message}}</td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                <br>
                                {{ $contact_forms->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@include('includes.footer')
