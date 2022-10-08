@extends('frontend.layouts.app')

@section('content')
@include('frontend.inc.footer-links.style')
<body>
    <div class="container">
        <h1 class="text-center">Contact us</h1>
        <form>
            <div class="row">
                <div class="col-sm-12">
                    <label for="name">Name<span class="required">*</span></label>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstName" aria-describedby="firstName" />
                        <small class="form-text">First</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastName" aria-describedby="lastName" />
                        <small class="form-text">Last</small>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Email Address<span class="required">*</span></label>
                        <input type="password" class="form-control" id="exampleInputPassword1" />
                    </div>
                    <div class="form-group">
                        <label for="name">Message<span class="required">*</span></label>
                        <textarea class="form-control" rows="5"> </textarea>
                    </div>
                    <button class="submit-btn">Submit Query</button>
                </div>
            </div>
        </form>
    </div>
@include('frontend.inc.footer-links.site-footer')
</body>

@endsection