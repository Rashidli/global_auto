@include('includes.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{route('words.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Söz əlavə et</h4>
                        <br>
                        <div class="row">

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Key</label>
                                        <input type="text" name="key" class="form-control" id="exampleInputEmail1">
                                    </div>
                                <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Söz az</label>
                                        <input type="text" name="az_word" class="form-control" id="exampleInputEmail1">
                                    </div>
                                <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Söz en</label>
                                        <input type="text" name="en_word" class="form-control" id="exampleInputEmail1">
                                    </div>
                                <br>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Söz ru</label>
                                        <input type="text" name="ru_word" class="form-control" id="exampleInputEmail1">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@include('includes.footer')

