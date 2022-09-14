
<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
</head>
<body>
<div class="container-scroller">
    <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="ps-lg-1">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                        <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                    <button id="bannerClose" class="btn border-0 p-0">
                        <i class="mdi mdi-close text-white me-0"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
    <!-- partial -->

    @include('admin.navbar')



        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div center="center" style="padding:100px;">
                <table style="background-color: black" style="padding:100px;">
                    <tr>
                        <th style="padding: 10px;">BloodBank Name</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Image</th>
                        <th style="padding: 10px;">Address</th>
                        <th style="padding: 10px;">Type</th>
                        <th style="padding: 10px;">Upload</th>
                        <th style="padding: 10px;">Delete</th>

                    </tr>

                        @foreach ($data as $blood)

                    <tr center="center" style="background-color:skyblue">
                        <td>{{$blood->name }}</td>
                        <td>{{$blood->phoneNo }}</td>
                        <td>{{$blood->address }}</td>
                        <td>{{$blood->type }}</td>
                        <td><img src="BankImage/{{$blood->image}}" height="100" width="100"></td>
                        <td>
                            <a class= "btn btn-success" href="{{url('updatebloodbank',$blood->id)}}" >Update</a>
                        </td>
                        <td>
                            <a class= "btn btn-danger" href="{{url('deletebloodbank',$blood->id)}}" onclick="return confirm('are you sure to delete this bloodbank?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page -->
</body>
</html>
