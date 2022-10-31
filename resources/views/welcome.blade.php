@extends('layouts.master')
@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
        </ol>
    </nav>
@endsection

@section('content')
    <form class="mb-3" method="post">
        <div class="row">
            <div class="col-sm-3 text-center">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                           aria-describedby="search-box">
                    <div class="input-group-append">
                        <span class="input-group-text" id="search-box"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 text-center">
                <div class="form-group">
                    <select class="form-control">
                        <option value="" selected disabled>Order</option>
                        <option>A to Z</option>
                        <option>Z to A</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 text-center">
                <div class="form-group">
                    <select class="form-control">
                        <option value="" selected disabled>Per Page</option>
                        <option value="12">12</option>
                        <option value="24">24</option>
                        <option value="36">36</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3 text-center">
                <button class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div><div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card mb-3">
                <img class="card-img-top" src="https://picsum.photos/200/150" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

    </div>


    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endsection
