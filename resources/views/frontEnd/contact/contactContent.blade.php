@extends('frontEnd.master')

@section('title')
Contact
@endsection

@section('mainContent')

<div class="page-head">
    <div class="container">
        <h3>Men's Wear</h3>
    </div>
</div>
<!-- //banner -->
<!-- mens -->
<div class="contact">
    <div class="container">
        <div class="contact-grids">
            <div class="col-md-4 contact-grid text-center animated wow slideInLeft" data-wow-delay=".5s">
                <div class="contact-grid1">
                    <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                    <h4>Address</h4>
                    <p>12K Street, 45 Building Road <span>New York City.</span></p>
                </div>
            </div>
            <div class="col-md-4 contact-grid text-center animated wow slideInUp" data-wow-delay=".5s">
                <div class="contact-grid2">
                    <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                    <h4>Call Us</h4>
                    <p>+1234 758 839<span>+1273 748 730</span></p>
                </div>
            </div>
            <div class="col-md-4 contact-grid text-center animated wow slideInRight" data-wow-delay=".5s">
                <div class="contact-grid3">
                    <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                    <h4>Email</h4>
                    <p><a href="mailto:info@example.com">info@example1.com</a><span><a href="mailto:info@example.com">info@example2.com</a></span></p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="map wow fadeInDown animated" data-wow-delay=".5s">
            <h3 class="tittle">View On Map</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d2482.432383990807!2d0.028213999961443994!3d51.52362882484525!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1423469959819" frameborder="0" style="border:0"></iframe>
        </div>
        <h3 class="tittle">Contact Form</h3>
        <form>
            <div class="contact-form2">
                <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Name';
                        }" required="">
                <input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Email';}" required="">
                <textarea type="text" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Message...';}" required="">Message...</textarea>
                <input type="submit" value="Submit" >
            </div>
        </form>
    </div>
</div>

@endsection