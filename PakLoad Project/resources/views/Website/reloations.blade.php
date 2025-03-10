@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="row" style="margin: 20px">
            <div class="col-lg-6 col-md-4 mb-5 text-center">
                <div class=" text-center" style="margin-top: 100px;">
                    <h2>Packers and Movers </h2>
                    <p>Now with the help of Truckload.pk, relocate your household & personal effects or Office moving with
                        complete peace of mind, now you can pre-schedule your shipments with us and get the best services on
                        time without any slippage
                    </p>
                    <img width="400px" src="https://www.truckload.pk/site/imgs/Wavy_Tsp-04_Single-11.jpg" alt="">

                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="card shadow-sm" style="padding: 40px;">
                    <div class="text-center mb-3">
                        <h4>Get a price estimate in your inbox</h4>
                        <p>Relocation within 15 Minutes for your Home and Office Move</p>
                    </div>
                    <form action="">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Mode</label>
                                <div class="form-group">
                                    <input type="radio" name="shipping_type" id="FTL" value="FTL">
                                    <label for="FTL">Full Truckload (FTL)</label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="shipping_type" id="LTL" value="LTL">
                                    <label for="LTL">Shared Space (LTL)</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Type</label>
                                <div class="form-group">
                                    <input type="radio" name="shipping_type" id="FTL" value="FTL">
                                    <label for="FTL">Residential </label>
                                </div>
                                <div class="form-group">
                                    <input type="radio" name="shipping_type" id="LTL" value="LTL">
                                    <label for="LTL">Commercial</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Your Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Email (optional)</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="exampleSelect1">Phone Number</label>
                            <input type="text" class="form-control">
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




                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="exampleSelect1">Select Truck</label>
                                    <select class="form-control" id="exampleSelect1">
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
                                    <label for="exampleSelect1">Select qty of truck</label>
                                    <select class="form-control" id="exampleSelect1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
