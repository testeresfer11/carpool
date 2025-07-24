@extends('admin.layouts.app')

@section('title', 'Reward setting')

@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title"> Reward setting</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.settings.reward.list') }}">Reward setting</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Reward setting</li>
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
                    <h4 class="card-title"><u>Edit Reward setting</u></h4>
                    <x-alert />

                    <form class="forms-sample" id="edit-user" action="{{ route('admin.settings.reward.edit',['id' =>$reward->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_type" id="user_type" value="{{ $reward->user_type }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="exampleInputName">Reward Name</label>
                                    <input type="text" class="form-control @error('reward_name') is-invalid @enderror" id="exampleInputName" placeholder="Enter Reward Name" name="reward_name" @if(!empty($reward)) value="{{ old('reward_name', $reward->reward_name) }}" @endif>
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
                                        <input type="number" min="0" class="form-control @error('driver_completed_rides') is-invalid @enderror"
                                            id="exampleInputRides" name="driver_completed_rides"
                                            value="{{ old('driver_completed_rides', $reward->driver_completed_rides) }}">
                                        @error('driver_completed_rides')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputDriverReward">Driver Reward Points</label>
                                        <input type="number" min="0" class="form-control @error('driver_reward_points') is-invalid @enderror"
                                            id="exampleInputDriverReward" name="driver_reward_points"
                                            value="{{ old('driver_reward_points', $reward->driver_reward_points) }}">
                                        @error('driver_reward_points')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="user-fields" style="display: none;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputUserRides">User Completed Rides</label>
                                        <input type="number" min="0" class="form-control @error('user_completed_rides') is-invalid @enderror"
                                            id="exampleInputUserRides" name="user_completed_rides"
                                            value="{{ old('user_completed_rides', $reward->user_completed_rides) }}">
                                        @error('user_completed_rides')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputUserReward">User Reward Points</label>
                                        <input type="number" min="0" class="form-control @error('user_reward_points') is-invalid @enderror"
                                            id="exampleInputUserReward" name="user_reward_points"
                                            value="{{ old('user_reward_points', $reward->user_reward_points) }}">
                                        @error('user_reward_points')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mr-2">Update</button>
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
                },
                driver_completed_rides: {
                    required: true,
                    number: true,
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

    document.addEventListener("DOMContentLoaded", function () {
        const userType = document.getElementById("user_type").value;
        const driverFields = document.getElementById("driver-fields");
        const userFields = document.getElementById("user-fields");

        if (userType == "2") {
            driverFields.style.display = "block";
            userFields.style.display = "none";
        } else if (userType == "1") {
            driverFields.style.display = "none";
            userFields.style.display = "block";
        } else {
            driverFields.style.display = "none";
            userFields.style.display = "none";
        }
    });

    function toggleFields(userType) {
        const driverFields = document.getElementById("driver-fields");
        const userFields = document.getElementById("user-fields");

        // Disable all inputs first
        driverFields.querySelectorAll("input").forEach(i => i.disabled = true);
        userFields.querySelectorAll("input").forEach(i => i.disabled = true);

        if (userType == "2") {
            driverFields.style.display = "block";
            userFields.style.display = "none";
            driverFields.querySelectorAll("input").forEach(i => i.disabled = false);
        } else if (userType == "1") {
            userFields.style.display = "block";
            driverFields.style.display = "none";
            userFields.querySelectorAll("input").forEach(i => i.disabled = false);
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        toggleFields(document.getElementById("user_type").value);
    });
</script>
@endsection
