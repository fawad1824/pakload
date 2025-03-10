@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="row" style="margin: 20px">
            <div class="col-lg-6 col-md-4 mb-5 text-center">
                <div class=" text-center" style="margin-top: 100px;">
                    <h2>Book a truck</h2>
                    <p>Book your required Truck Online for your commercial cargo movement, hassle Free
                        and
                        get the best rates within Minutes, directly from the market.
                        .</p>
                    <img width="400px" src="https://www.truckload.pk/site/imgs/Wavy_Tsp-04_Single-11.jpg" alt="">

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card shadow-sm" style="padding: 40px;">
                    <div class="text-center mb-3">
                        <h4>Get a price estimate in your inbox</h4>
                        <p>For your commercial Cargo Movement</p>
                    </div>
                    <form action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Truck Type</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect2">Load Type</label>
                            <select class="form-control" id="exampleSelect2">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect3">From City</label>
                            <select class="form-control" id="exampleSelect3">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect4">To City</label>
                            <select class="form-control" id="exampleSelect4">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Description</label>
                            <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
