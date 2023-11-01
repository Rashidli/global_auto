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
                            <h4 class="card-title">Kredit müraciətləri</h4>

{{--                            <a href="{{route('apply_credits.create')}}" class="btn btn-primary">+</a>--}}
                            <br>
                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">

                                    <thead>
                                    <tr>

                                        <th>Adı</th>
                                        <th>Doğum tarixi</th>
                                        <th>Vəsiqə</th>
                                        <th>Fin kodu</th>
                                        <th>Ünvan</th>
                                        <th>Ev nömrəsi</th>
                                        <th>İş yeri</th>
                                        <th>Gəlir məbləği</th>
                                        <th>Telefon nömrəsi</th>
                                        <th>Mesaj</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($apply_credits as $apply_credit)

                                        <tr>

                                            <td >{{$apply_credit->name}}</td>
                                            <td >{{$apply_credit->birth_date}}</td>
                                            <td >{{$apply_credit->license}}</td>
                                            <td >{{$apply_credit->fin_code}}</td>
                                            <td >{{$apply_credit->address}}</td>
                                            <td >{{$apply_credit->home_number}}</td>
                                            <td >{{$apply_credit->company}}</td>
                                            <td >{{$apply_credit->salary}}</td>
                                            <td >{{$apply_credit->phone_number}}</td>
                                            <td >{{$apply_credit->message}}</td>

                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                                <br>
                                {{ $apply_credits->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@include('includes.footer')
