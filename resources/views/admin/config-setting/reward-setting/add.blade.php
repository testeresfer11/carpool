@extends('admin.layouts.app')

@section('title', 'Reward setting')

@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title"> Reward setting</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.settings.reward.list') }}">Reward setting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Reward setting</li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><u>Add Reward setting</u></h4>
                    <x-alert />

                    <form class="forms-sample" id="edit-user" action="{{ route('admin.settings.reward.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputUserType">Select User Type</label>
                                    <select class="form-control @error('user_type') is-invalid @enderror" id="exampleInputUserType" name="user_type" onchange="toggleUserTypeFields(this.value)">
                                        <option value="">Select User Type</option>
                                        <option value="1">Customer</option>
                                        <option value="2">Driver</option>
                                    </select>
                                    @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputName">Reward Name</label>
                                    <input type="text" class="form-control @error('reward_name') is-invalid @enderror" id="exampleInputName" placeholder="Enter Reward Name" name="reward_name">
                                    @error('reward_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="driver-fields" style="display: none;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputRides">Driver Completed Rides</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputRides" placeholder="Enter Number of Completed Rides" name="driver_completed_rides">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputDriverReward">Driver Reward Points</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputDriverReward" placeholder="Enter Driver Reward Points" name="driver_reward_points">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="user-fields" style="display: none;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputUserRides">User Completed Rides</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputUserRides" placeholder="Enter Number of Completed Rides" name="user_completed_rides">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputUserReward">User Reward Points</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputUserReward" placeholder="Enter User Reward Points" name="user_reward_points">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.3.2/js/intlTelInput.min.js"></script>
<script>
    $(document).ready(function() {
        $("#edit-user").validate({
            rules: {
                user_type:{
                    required: true,
                },
                reward_name:{
                    required: true,
                    noSpace: true,
                }
            },
            messages: {
                user_type:{
                    required: "Please select user type",
                },
                reward_name: {
                    required: "Reward name is required",
                    noSpace: "Reward name should not contain spaces",
                }
             },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                if (element.attr("type") == "file") {
                    error.insertAfter(element.next());
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('is-valid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        // Custom method to check for spaces
        $.validator.addMethod("noSpace", function(value, element) {
            return value.trim().length !== 0;
        }, "Spaces are not allowed");

        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            initialCountry: 'au', // Default country
            separateDialCode: true,
            utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js', // Path to utils.js    
        });

        // Update flag icon based on selected country
        $('#phone').on('countrychange', function() {
            var countryCode = $('.iti__selected-dial-code').html();
            $('#country_code').val(countryCode);
        });

    });

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profilePreview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function toggleUserTypeFields(userType) {
        const driverFields = document.getElementById('driver-fields');
        const userFields = document.getElementById('user-fields');

        // Clear all required attributes first
        document.querySelectorAll('#driver-fields input, #user-fields input').forEach(input => {
            input.required = false;
        });

        if (userType == "1") { // Customer
            driverFields.style.display = "none";
            userFields.style.display = "block";

            document.querySelector('[name="user_completed_rides"]').required = true;
            document.querySelector('[name="user_reward_points"]').required = true;

        } else if (userType == "2") { // Driver
            driverFields.style.display = "block";
            userFields.style.display = "none";

            document.querySelector('[name="driver_completed_rides"]').required = true;
            document.querySelector('[name="driver_reward_points"]').required = true;

        } else {
            driverFields.style.display = "none";
            userFields.style.display = "none";
        }
    }

    // On page load, handle pre-filled values (useful when validation fails)
    document.addEventListener("DOMContentLoaded", function () {
        const selectedUserType = document.getElementById("exampleInputUserType").value;
        toggleUserTypeFields(selectedUserType);
    });
</script>
@endsection
