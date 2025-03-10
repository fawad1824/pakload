@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="row" style="margin: 20px">
            <div class="col-lg-6 col-md-4 mb-5 text-center">
                <div class=" text-center" style="margin-top: 100px;">
                    <h2>Car Carrier Services
                    </h2>
                    <p>Now with the help of Truckload.pk, the customers can ship their vehicles on shared car-carrier
                        trailers or Box Trucks at market competitive rates, for intercity transportation, with full
                        confidence through our network of trusted partners, at the right market rates without fear of
                        getting overcharged and greater quality of service.

                    </p>
                    <img width="400px" src="https://www.truckload.pk/site/imgs/Wavy_Tsp-04_Single-11.jpg" alt="">

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card shadow-sm" style="padding: 40px;">
                    <div class="text-center mb-3">
                        <h4>Get an Estimate of Car Moving</h4>
                        <p>Move your car through car-carrier to any of the major cities at standard market rates</p>
                    </div>
                    <form action="">
                        <div class="form-group">
                            <input type="radio" name="shipping_type" id="FTL" value="FTL">
                            <label for="FTL">Yard to Yard </label>
                        </div>
                        <div class="form-group">

                            <input type="radio" name="shipping_type" id="LTL" value="LTL">
                            <label for="LTL">Door to Door </label>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Vechicle type</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Vechicle Brand</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Vechicle Model</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Vechicle</label>
                            <select class="form-control" id="exampleSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
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
                            </div>
                            <div class="col-lg-6">
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
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Dispatch Date</label>
                            <input type="date" name="" id="" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
